@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Post')

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
                                <h5 class="card-title mb-sm-0 me-2">Post Edit Form</h5>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <form method="POST" action="{{ route('update-post', ['id' => $data->id]) }}"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-lg-8 mx-auto">
                                        <!-- 1. Blog Information -->
                                        <h5 class="mb-4">1. Post Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Post Title</label>
                                                <input type="text" id="post_title" name="post_title" value="{{ $data->post_title }}" class="form-control"
                                                    placeholder="Enter post_title" required>
                                                    @error('post_title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title"> Company Name</label>
                                                <input type="text" id="company_name" name="company_name" value="{{ $data->company_name }}" class="form-control"
                                                    placeholder="Enter company name" required>
                                                    @error('company_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Contact</label>
                                                <input type="text" id="contact" name="contact" value="{{ $data->contact }}" class="form-control"
                                                    placeholder="Enter contact" required>
                                                    @error('contact')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">email</label>
                                                <input type="text" id="email" name="email" value="{{ $data->email }}" class="form-control"
                                                    placeholder="Enteremail" required>
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>




                                            <div class="col-md-12">
                                                <label class="form-label" for="title">investment amount</label>
                                                <input type="text" id="investment_amount" name="investment_amount" value="{{ $data->investment_amount }}" class="form-control"
                                                    placeholder="Enter investment amount" required>
                                                    @error('investment_amount')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Royality</label>
                                                <input type="text" id="royality" name="royality"  value="{{ $data->royality }}" class="form-control"
                                                    placeholder="Enter royality" required>
                                                    @error('royality')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">industry</label>
                                                <input type="text" id="industry" name="industry" value="{{ $data->industry }}" class="form-control"
                                                    placeholder="Enter industry" required>
                                                    @error('industry')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">description</label>
                                                <input type="text" id="description" name="description" value="{{ $data->description }}" class="form-control"
                                                    placeholder="Enter description" required>
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">linkedin profile</label>
                                                <input type="text" id="linkedin" name="linkedin" value="{{ $data->linkedin }}" class="form-control"
                                                    placeholder="Enter linkedin" required>
                                                    @error('linkedin')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Post Type</label>
                                                <input type="text" id="post_type" name="post_type" value="{{ $data->post_type }}" class="form-control"
                                                    placeholder="Enter post_type" required>
                                                    @error('post_type')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                @if (!empty($data->photos) && count($data->photos) > 0 && isset($data->photos[0]))
                                                    <img src="{{ asset($data->photos[0]->photo_url) }}" alt="Featured Picture" class="img-thumbnail" style="max-width: 200px;">
                                                @endif
                                            </div>


                                            <div class="col-md-8">
                                                <label class="form-label" for="photo">Change Picture</label>
                                                <input type="file" id="photo" name="photo" class="form-control">
                                                @error('photo')
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
