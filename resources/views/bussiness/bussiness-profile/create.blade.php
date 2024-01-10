@extends('layouts/contentLayoutMaster')

@section('title', 'Create bussiness Profile')

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
                                <h5 class="card-title mb-sm-0 me-2">Bussiness Profile Create Form</h5>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <form method="POST" action="{{ route('store-bussiness-profile') }}"  enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-lg-8 mx-auto">
                                        <!-- 1. Blog Information -->
                                        <h5 class="mb-4">1. Bussiness Profile Information</h5>
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
                                                <label class="form-label" for="photo">photo</label>
                                                <input type="file" id="photo" name="photo" class="form-control"
                                                    placeholder="Enter photo" required>
                                                    @error('photo')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">Address</label>
                                                <input type="text" id="address" name="address" class="form-control"
                                                    placeholder="Enter address" required>
                                                    @error('address')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label" for="title">avg_monthly_sale</label>
                                                <input type="text" id="avg_monthly_sale" name="avg_monthly_sale" class="form-control"
                                                    placeholder="Enter avg_monthly_sale" required>
                                                    @error('avg_monthly_sale')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">latest_yearly_sale</label>
                                                <input type="text" id="latest_yearly_sale" name="latest_yearly_sale" class="form-control"
                                                    placeholder="Enter latest_yearly_sale" required>
                                                    @error('latest_yearly_sale')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">profit_margin_percentage</label>
                                                <input type="text" id="profit_margin_percentage" name="profit_margin_percentage" class="form-control"
                                                    placeholder="Enter profit_margin_percentage" required>
                                                    @error('profit_margin_percentage')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">expected_valuation</label>
                                                <input type="text" id="expected_valuation" name="expected_valuation" class="form-control"
                                                    placeholder="Enter expected_valuation" required>
                                                    @error('expected_valuation')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">real_valuation</label>
                                                <input type="text" id="real_valuation" name="real_valuation" class="form-control"
                                                    placeholder="Enter real_valuation" required>
                                                    @error('real_valuation')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">description</label>
                                                <input type="text" id="description" name="description" class="form-control"
                                                    placeholder="Enter description" required>
                                                    @error('description')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">bussiness_categories_id</label>
                                                <input type="text" id="bussiness_categories_id" name="bussiness_categories_id" class="form-control"
                                                    placeholder="Enter bussiness_categories_id" required>
                                                    @error('bussiness_categories_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">total_permanent_employee</label>
                                                <input type="text" id="total_permanent_employee" name="total_permanent_employee" class="form-control"
                                                    placeholder="Enter total_permanent_employee" required>
                                                    @error('total_permanent_employee')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="title">established_date</label>
                                                <input type="text" id="established_date" name="established_date" class="form-control"
                                                    placeholder="Enter established_date" required>
                                                    @error('established_date')
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
