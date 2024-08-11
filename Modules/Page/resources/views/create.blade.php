@extends('user::layouts.backend-master')
@section('breadcrumb_title', 'Create Page')
@section('content')
    <div class="col-lg-12">
        <!-- default -->
        <div class="demo-card bg-white rounded-xl mb-5">
            <div class="demo-card-header d-flex align-items-center justify-content-between px-6 py-5 ">
                <h3 class="demo-card-title m-0">Default</h3>
            </div>
            <form action="{{ route('admin.page.store') }}" method="POST">
                @csrf
                <input type="hidden" name="page_id" id="page_id">
                <div class="demo-card-body">
                    <div class="demo-card-body-content">
                        <div class="mb-5">
                            <label for="Title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="name" id="Title" required
                                placeholder="Enter Title" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <form action="">
                                <button type="button" class="btn btn-primary" id="use-page-builder">Use Page
                                    Builder</button>
                            </form>
                        </div>

                        {{-- status --}}
                        <div class="mb-5">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create Page
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#use-page-builder').on('click', function() {
                // make a page 
                let page_id = $('#page_id').val();
                let title = $('#Title').val();
                if (title == '') {
                    alert('Please enter a title');
                    return;
                }
                if (page_id == '') {
                    $.ajax({
                        url: "{{ route('admin.ajax.page.store') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            title: title
                        },
                        success: function(response) {
                            let id = response.page.id;
                            $('#page_id').val(id);
                            window.location.href = "{{ route('admin.page.content', '') }}" +
                                '/' + id;
                        }
                    });
                } else {
                    window.location.href = "{{ route('admin.page.content', '') }}" + '/' + page_id;
                }

            });
        });
    </script>
@endpush
