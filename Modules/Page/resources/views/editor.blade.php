@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Editor')
@section('content')
    <div id="page-builder">
        <div id="toaster-container"></div>
        <input type="hidden" id="page-id" name="pageid">
        <div id="widgets-sidebar">
            @foreach (Modules\Page\Pagebuilder\Widgets\WidgetRegistry::getWidgets() as $widget)
                <div class="widget-item" draggable="true" data-widget="{{ get_class($widget) }}">
                    <h3>{{ $widget->getTitle() }}</h3>
                    <i class="{{ $widget::getIcon() }}"></i>
                </div>
            @endforeach
        </div>
        <div id="main-canvas">
            {!! $pageContent ?? '' !!}
        </div>
        <div id="canvas-pagecontent-edit-controlls-list" class="d-flex">
            <h2>Please select a section first</h2>
        </div>
    </div>
    <div id="edit-widget-form">
        <button id="save-page">Save</button>
        <button id="delete-page">Delete</button>
        <button id="undo">Undo</button>
        <button id="redo">Redo</button>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;
            // Use a regular expression to extract the ID
            var idMatch = currentUrl.match(/\/page\/content\/create\/(\d+)/);
            if (idMatch) {
                var id = idMatch[1];
                $('#page-id').val(id);
            } else {
                $('#page-id').val('');
            }
        });
    </script>
@endpush
