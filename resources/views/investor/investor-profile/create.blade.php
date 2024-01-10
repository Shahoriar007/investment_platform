@extends('layouts/contentLayoutMaster')

@section('title', 'Create investor Profile')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">

@endsection

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="card">
                        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 86.0625px;">
                            <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                                style="width: 1390px;">
                                <h5 class="card-title mb-sm-0 me-2">investor Profile Create Form</h5>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <form method="POST" action="{{ route('store-investor-profile') }}"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-lg-8 mx-auto">
                                        <!-- 1. Blog Information -->
                                        <h5 class="mb-4">1. investor Profile Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Name</label>
                                                <input type="text" id="name" name="name"  class="form-control"
                                                    placeholder="Enter Name" required>
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title"> Company Name</label>
                                                <input type="text" id="company_name" name="company_name" class="form-control"
                                                    placeholder="Enter company name" required>
                                                    @error('company_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Contact</label>
                                                <input type="text" id="contact" name="contact"  class="form-control"
                                                    placeholder="Enter contact" required>
                                                    @error('contact')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">email</label>
                                                <input type="text" id="email" name="email" class="form-control"
                                                    placeholder="Enteremail" required>
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">location</label>
                                                <input type="text" id="location" name="location" class="form-control"
                                                    placeholder="Enter location" required>
                                                    @error('location')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="photo">photo</label>
                                                <input type="file" id="photo" name="photo" class="form-control"
                                                    placeholder="Enter photo" required>
                                                    @error('photo')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">investment range</label>
                                                <input type="text" id="investment_range" name="investment_range" class="form-control"
                                                    placeholder="Enter investment range" required>
                                                    @error('investment_range')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">proffession</label>
                                                <input type="text" id="proffession" name="proffession" class="form-control"
                                                    placeholder="Enter proffession" required>
                                                    @error('proffession')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">designation</label>
                                                <input type="text" id="designation" name="designation" class="form-control"
                                                    placeholder="Enter designation" required>
                                                    @error('designation')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">linkedin profile</label>
                                                <input type="text" id="linkedin_profile" name="linkedin_profile" class="form-control"
                                                    placeholder="Enter linkedin_profile" required>
                                                    @error('linkedin profile')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                          


                                            <div class="col-md-12">
                                                <label class="form-label" for="title">created_by</label>
                                                <input type="text" id="created_by" name="created_by" class="form-control"
                                                    placeholder="Enter created_by" required>
                                                    @error('created_by')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">updated_by</label>
                                                <input type="text" id="updated_by" name="updated_by" class="form-control"
                                                    placeholder="Enter updated_by" required>
                                                    @error('updated_by')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">deleted_by</label>
                                                <input type="text" id="deleted_by" name="deleted_by" class="form-control"
                                                    placeholder="Enter deleted_by" required>
                                                    @error('deleted_by')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>



                                        </div>
                                        <hr>

                                        <div style = "margin-top: 20px;">
                                            <div class="action-btns">
                                                {{-- <button class="btn btn-label-primary me-3 waves-effect">
                                            <span class="align-middle"> Back</span>
                                        </button> --}}
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Save
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>





                    <!-- Hoverable rows end -->

                @endsection

                @section('vendor-script')
                    <!-- vendor js files -->
                    <script src="{{ asset(mix('vendors/js/pagination/jquery.bootpag.min.js')) }}"></script>
                    <script src="{{ asset(mix('vendors/js/pagination/jquery.twbsPagination.min.js')) }}"></script>
                    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
                    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
                    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
                    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
                    <script src="{{ asset(mix('vendors/js/file-uploaders/dropzone.min.js')) }}"></script>

                @endsection
                @section('page-script')
                    {{-- Page js files --}}
                    <script src="{{ asset(mix('js/scripts/pagination/components-pagination.js')) }}"></script>
                    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
                    <script src="{{ asset(mix('js/scripts/forms/form-quill-editor.js')) }}"></script>
                    <script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>

                    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('description');
                    </script>


                @endsection
