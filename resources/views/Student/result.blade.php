@include('layouts.header')
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@include('layouts.sidebar')
<div class="main-content">
    <div class="page-content">

        <div class="container-fluid">
                @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Your Score</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('result')}}">Your Score</a>/</li>
                                <li class="breadcrumb">Test</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                @if(empty($student->all()))
                <div class="col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-md me-4">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/companies/img-1.png" alt="" height="30">
                                        </span>
                                    </div>

                                    <div class="media-body overflow-hidden">
                                        <h1 class="text-truncate font-size-50">
                                            <span class="badge bg-warning">  Coming Soon...</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        
                                    </li>
                                    <li class="list-inline-item me-3">
                                         Visit site Regularly
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($student as $value)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-md me-4">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/companies/img-1.png" alt="" height="30">
                                        </span>
                                    </div>

                                    <div class="media-body overflow-hidden">
                                        <?php
                                
                                            $testname = App\Models\Test::where('id',$value->testID)->first();
                                                                                 ?>
                                         @if($testname=="")
                                        <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">TEST IS no longer available</a></h5>
                                        @else
                                        <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{$testname->testName}}</a></h5>
                                        @endif
                                        <div> 
                                            Your Score  ::  {{$value->score}}  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                        <span class="badge bg-success">Completed</span>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <i class= "bx bx-calendar me-1"></i> {{date("d-m-Y",strtotime($value->created_at))}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
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


<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jun 2021 11:18:48 GMT -->
</html>

