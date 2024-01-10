@extends('layouts/contentLayoutMaster')

@section('title', 'Create post')

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
                                <h5 class="card-title mb-sm-0 me-2">post Create Form</h5>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <form method="POST" action="{{ route('store-post') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-lg-8 mx-auto">
                                        <!-- 1. Blog Information -->
                                        <h5 class="mb-4">1. post Information</h5>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Post Title</label>
                                                <input type="text" id="post_title" name="post_title" class="form-control"
                                                    placeholder="Enter post_title" required>
                                                @error('post_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title"> Company Name</label>
                                                <input type="text" id="company_name" name="company_name"
                                                    class="form-control" placeholder="Enter company name" required>
                                                @error('company_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Contact</label>
                                                <input type="text" id="contact" name="contact" class="form-control"
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
                                                <label class="form-label" for="title">investment amount</label>
                                                <input type="text" id="investment_amount" name="investment_amount"
                                                    class="form-control" placeholder="Enter investment amount" required>
                                                @error('investment_amount')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Royality</label>
                                                <input type="text" id="royality" name="royality" class="form-control"
                                                    placeholder="Enter royality" required>
                                                @error('royality')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">industry</label>
                                                <input type="text" id="industry" name="industry"
                                                    class="form-control" placeholder="Enter industry" required>
                                                @error('industry')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">description</label>
                                                <input type="text" id="description" name="description"
                                                    class="form-control" placeholder="Enter description" required>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">linkedin </label>
                                                <input type="text" id="linkedin" name="linkedin"
                                                    class="form-control" placeholder="Enter linkedin" required>
                                                @error('linkedin')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">photo</label>
                                                <input type="text" id="photo" name="photo" class="form-control"
                                                    placeholder="Enter photo" required>
                                                @error('photo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Post Type</label>
                                                <input type="text" id="post_type" name="post_type"
                                                    class="form-control" placeholder="Enter post_type" required>
                                                @error('post_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <div class="col-md-12">
                                                <label class="form-label" for="select_profile_type">Select Profile
                                                    Type</label>
                                                <select id="select_profile_type" name="profileable_type"
                                                    class="form-control" required>
                                                    <option value="" >Select profile type</option>
                                                    <option value="App\Models\BussinessProfile">Bussiness</option>
                                                    <option value="App\Models\InvestorProfile">Investor</option>
                                                </select>
                                                @error('select_profile_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <!-- Investor Profile Dropdown -->
                                            <div class="col-md-12">
                                                <label class="form-label" for="select_profile">Select Profile</label>
                                                <select id="select_profile" name="profileable_id" class="form-control"
                                                    required>

                                                </select>
                                                @error('select_profile')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>






                                            <div class="col-md-12">
                                                <label class="form-label" for="title">created_by</label>
                                                <input type="text" id="created_by" name="created_by"
                                                    class="form-control" placeholder="Enter created_by" required>
                                                @error('created_by')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">updated_by</label>
                                                <input type="text" id="updated_by" name="updated_by"
                                                    class="form-control" placeholder="Enter updated_by" required>
                                                @error('updated_by')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">deleted_by</label>
                                                <input type="text" id="deleted_by" name="deleted_by"
                                                    class="form-control" placeholder="Enter deleted_by" required>
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

                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#select_profile_type').change(function() {
                            var selectedProfileType = $(this).val();
                            $.ajax({
                                url: '/fetch-profiles',
                                type: 'GET',
                                data: {
                                    profile_type: selectedProfileType
                                },
                                success: function(data) {
                                    $('#select_profile').empty();
                                    $.each(data.data, function(index, profile) {
                                        $('#select_profile').append('<option value="' + profile.id +
                                            '">' + profile.name + '</option>');
                                    });
                                },
                                error: function(error) {
                                    console.error('Error fetching profiles:', error);
                                }
                            });
                        });
                    });
                </script>
