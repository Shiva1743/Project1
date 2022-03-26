@include('layouts.header')
@include('layouts.sidebar')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h3 class="text-primary">Welcome to SCET !!..</h3>
                                    <p>Dashboard</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="" alt="" class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-truncate"></h5>
                                <p class="text-muted mb-0 text-truncate"></p>
                            </div>

                            <div class="col-sm-8">
                                <div class="pt-4">

                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="font-size-15"></h5>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-15"></h5>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                    <div class="mt-7">
                                        <a href="{{route('profile')}}" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
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

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>
<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jun 2021 11:18:48 GMT -->
</html>