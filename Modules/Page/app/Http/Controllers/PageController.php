<?php

namespace Modules\Page\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Page\Pagebuilder\Widgets\WidgetRegistry;
use illuminate\Support\Facades\Storage;
use Modules\Page\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::with('content')->get();
        return view('page::index', compact('pages'));
    }

    public function content($id)
    {
        return view('page::editor');
    }

    public function create()
    {
        return view('page::create');
    }

    // public function store(Request $request)
    // {
    //     $page = Page::create($request->all());
    //     return redirect()->route('admin.page.content', $page->id);
    // }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->with('content')->first();
        return view('page::show', compact('page'));
    }


    public function ajaxPageStore(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);
            $slug = Str::slug($request->title, '-');
            $page = Page::create([
                'title' => $request->title,
                'slug' => $slug,
                'status' => 'draft',
            ]);
            return response()->json(['page' => $page]);
        }
    }

    public function render(Request $request)
    {

        $widgetClass = $request->input('widget_class');
        $widget = new $widgetClass();
        $widgetName = $widget::getName();
        $data = [
            'request' => $request,
            'settings' => $widget::getControls()
        ];

        return response()->json(['html' => $widget->render($data), 'widgetName' => $widgetName]);
    }

    public function renderControls(Request $request)
    {
        $widgetName = $request->query("widget-type");

        $widgetClass = WidgetRegistry::getWidget($widgetName);

        if (!$widgetClass) {
            return response()->json(['error' => 'Widget not found!'], 404);
        }

        $widgetHtml = $request->input('widget', '');
        $dom = new \DOMDocument();
        @$dom->loadHTML($widgetHtml);
        $xpath = new \DOMXPath($dom);

        $returndControls = "";
        foreach ($widgetClass::getControls() as $key => $control) {
            $value = $control['default'];
            $inputElement = $xpath->query("//*[@id='$key']")->item(0);

            if ($inputElement) {
                $value = $inputElement->getAttribute('value') ?: $inputElement->nodeValue;
            }

            $returndControls .= view('page::widgets.controls.' . $control['type'], compact("key", "control", "value"))->render();
        }

        return response()->json(['html' => $returndControls]);
    }



    public function savePage(Request $request)
    {
        $request->validate([
            'page_content' => 'nullable|string',
            'page_id' => 'required|integer'
        ]);

        $page = Page::find($request->input('page_id'));
        $page->status = 'published';
        $page->save();
        $content = $page->content()->first();
        $page->content()->updateOrCreate([], ['content' => $request->input('page_content')]);

        return response()->json(['message' => 'Page saved successfully']);
    }

    public function deletePage()
    {
        Storage::delete('page-builder-content.html');
        return response()->json(['message' => 'Page deleted successfully']);
    }

    public function loadPage()
    {
        $pageContent = Storage::exists('page-builder-content.html') ? Storage::get('page-builder-content.html') : '';
        return view('pagebuilder.editor', ['pageContent' => $pageContent]);
    }

    public function uploadImage(Request $request)
    {
        try {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            return response()->json(['imageUrl' => '/images/' . $imageName]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while uploading the image.'], 500);
        }
    }
}
