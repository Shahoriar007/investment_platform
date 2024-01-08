@extends('layouts/contentLayoutMaster')

@section('title', 'investor Profile')

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

    @if (Session::has('success'))
        <div id="success-alert" class="alert alert-success" style="padding: 15px;">
            {{ Session::get('success') }}
        </div>
    @endif


    @if (session('error'))
        <div id="error-alert" class="alert alert-danger" style="padding: 15px;">
            {{ session('error') }}
        </div>
    @endif

    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('create-investor-profile') }}" class="btn btn-outline-primary">Add investor Profile</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Company Name</th>
                                <th>location</th>
                                <th>investment range</th>
                                <th>proffession</th>
                                <th>designation</th>
                                <th>linkedin</th>
                                <th>photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $investorProfile)
                                <tr>

                                    <td>
                                        {{ $investorProfile->name }}
                                    </td>

                                    <td>
                                        {{ $investorProfile->contact }}
                                    </td>

                                    <td>
                                        {{ $investorProfile->company_name }}
                                    </td>
                                    <td>
                                        {{ $investorProfile->location }}
                                    </td>
                                    <td>
                                        {{ $investorProfile->investment_range }}
                                    </td>

                                    <td>
                                        {{ $investorProfile->proffession }}
                                    </td>
                                    <td>
                                        {{ $investorProfile->designation }}
                                    </td>

                                    <td>
                                        {{ $investorProfile->linkedin_profile }}
                                    </td>
                                    <td>
                                        {{ $investorProfile->photo }}
                                    </td>





                                    <td>
                                        <a class="" href="{{ route('view-investor-profile', ['id' => $investorProfile->id]) }}">
                                            <i data-feather="eye" class="me-50"></i>
                                        </a>
                                        <a class="" href="{{ route('edit-investor-profile', ['id' => $investorProfile->id]) }}">
                                            <i data-feather="edit-2" class="me-50"></i>
                                        </a>
                                        <form id="deleteForm" method="POST" action="{{ route('delete-investor-profile') }}"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type="text" name="investorProfile_id" id="delete-investor-profile-id" hidden>
                                            <button type="button" class="btn-link"
                                                style="border: none; background: none; padding: 0; margin: 0;"
                                                onclick="confirmDelete({{ $investorProfile->id }})">
                                                <i data-feather="trash-2" class="me-50"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mx-1 d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination mt-2">
                                <li class="page-item prev"><a class="page-link"
                                        style="pointer-events: {{ $data->currentPage() == 1 ? 'none' : '' }}"
                                        href="{{ $data->url($data->currentPage() - 1) }}"></a>
                                </li>
                                @for ($i = 1; $i <= $data->lastPage(); $i++)
                                    <li class="page-item {{ $i == $data->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item next" disabled><a class="page-link"
                                        style="pointer-events: {{ $data->currentPage() == $data->lastPage() ? 'none' : '' }}"
                                        href="{{ $data->url($data->currentPage() + 1) }}"></a>
                                </li>
                            </ul>
                        </nav>
                    </div>



                </div>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#success-alert").alert('close');
            }, 3000);
        });
    </script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#error-alert").alert('close');
            }, 3000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(investorProfileId) {

            console.log(investorProfileId);
            document.getElementById('delete-investor-profile-id').value = investorProfileId;
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm();
                }
            });
        }

        function submitForm() {
            document.getElementById('deleteForm').submit();
        }
    </script>




@endsection
