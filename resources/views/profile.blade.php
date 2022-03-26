@include('layouts.header')
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@include('layouts.sidebar')
<div class="main-content">
    <div class="page-content">

        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Your Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Your Profile/</a></li>
                                <li class="breadcrumb">Update Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Your Profile</h4>
                            @if(session()->has('status'))
                                <div class="alert alert-success">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            <form action="{{route('profileupdate')}}" method="post">
                                @csrf
                            <div class="mb-3 row">
                            <input type="hidden" name="userid" value="{{$userData->id}}">
                                <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" value="{{$userData->name}}"
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" value="{{$userData->email}}" placeholder="Enter Email"
                                        id="example-email-input" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="submit">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>

    </div>
</div>
<!-- End Page-content -->
</div>
<!-- end main content-->

</div>

<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<!-- Data tables -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/js/pages/datatables.init.js"></script>
<!-- End Data tables -->

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 6 Jun 2021 11:18:48 GMT -->
</html>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
