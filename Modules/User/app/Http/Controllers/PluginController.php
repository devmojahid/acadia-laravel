<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nwidart\Modules\Facades\Module;

class PluginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plugins = Module::all();
        return view('user::pages.plugins.index', compact('plugins'));
    }

    /**
     * Activate the specified resource in storage.
     */
    public function activate($name)
    {

        return redirect()->back()->with('error', 'Plugin activation is disabled now.');
        Module::find($name)->enable();
        return redirect()->back()->with('success', 'Plugin activated successfully.');
    }

    public function deactivate($name)
    {
        return redirect()->back()->with('error', 'Plugin deactivation is disabled now.');
        Module::find($name)->disable();
        return redirect()->back()->with('success', 'Plugin deactivated successfully.');
    }

    public function delete($name)
    {
        return redirect()->back()->with('error', 'Plugin deletion is disabled now.');
        Module::find($name)->delete();
        return redirect()->back()->with('success', 'Plugin deleted successfully.');
    }
}
