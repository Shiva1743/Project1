@include('layouts.header')
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
    .card-body
    {
        background-color: beige;
    }
    .a
    {
        background-color: floralwhite;
    }
</style>
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
                        <h4 class="mb-sm-0 font-size-18">Test List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li>
                                    <a href="{{route('SubjectListS')}}"> Subject </a>/</li>
                                <li class="breadcrumb-item active">Test List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                @if(empty($testList->all()))
                <div class="col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-md me-4">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h1 class="font-center"><a href="javascript:void(0);" class="text-dark" id="task-name">OOPS :(</a></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top a">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                    <h4>Test is not created Yet</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($testList as $subValue)
                    @if(empty($subValue) || $subValue->status == '0')
                    <div class="col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-md me-4">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h1 class="font-center"><a href="javascript:void(0);" class="text-dark" id="task-name">Test will start in some time</a></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top a">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                    <h4> Visit site regularly </h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                            <?php 
                                    $attemptData = App\Models\StudentScore::where('testID',$subValue->id)->first();
                                ?>
                                    @if(!empty($attemptData))
                                    <h4 class="card-title badge bg-success float-end">completed</h4>
                                    @else
                                    <h4 class="card-title badge bg-danger float-end">Remaining</h4>
                                    @endif
                                
                                <div class="media">
                                    <div class="avatar-md me-4">
                                    </div>

                                    <div class="media-body overflow-hidden">
                                        @if(!empty($attemptData))
                                            <h1 class="font-center"><a href="javascript:void(0);" class="text-dark" id="task-name" disabled>{{$subValue->testName}}</a></h1>
                                        @else
                                            <h1 class="font-center"><a href="{{route('Quiz',['testID'=>$subValue->id])}}" class="text-dark" id="task-name" >{{$subValue->testName}}</a></h1>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top a">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                    <h4><i class= "dripicons-pencil me-2"></i>Marks::  {{$subValue->description}}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
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

