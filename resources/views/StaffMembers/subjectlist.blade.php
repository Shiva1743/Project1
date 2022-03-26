@include('layouts.header')
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('layouts.sidebar')
<div class="main-content">
    <div class="page-content">

        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Subject List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Create Subjects/</a></li>
                                <li class="breadcrumb">Subject List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Subjects</h4>
                            <button type="button" class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Subject</button>
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Subject Code</th>
                                    <th>Add Test</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($subDetails as $subValue)
                                    <tr>
                                        <td>{{$subValue->subName}}</td>
                                        <td>{{$subValue->subNo}}</td>
                                        <td><button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".addtest{{$subValue->id}}">+</button></td>
                                        <td><a href="{{route('deleteSubject',['id'=>$subValue->id])}}"><i class="mdi mdi-trash-can font-size-20 text-danger me-2" onclick="return confirm('Are you sure you want to delete this item?');"></i></a></td>
                                            <div class="modal fade addtest{{$subValue->id}}" tabindex="-1" id="addtestmodal" role="dialog" >
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add Test</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                            @if (isset($errors) && count($errors) > 0)
                                                                <script type="text/javascript">
                                                                    $(document).ready(function() {
                                                                        $('#addtestmodal').modal('show');
                                                                    });
                                                                </script>
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                                <form action="{{route('addTest',['subID'=>$subValue->id])}}" method="post" id="newModalForm">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label for="formrow-firstname-input" class="form-label">Test name</label>
                                                                        <input type="text" class="form-control" name="testname" id="testname">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="mb-3">
                                                                            <label for="formrow-email-input" class="form-label">Test Description</label>
                                                                            <input type="text" name="description" class="form-control" id="description">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <button type="submit" id="subBtn" class="btn btn-primary w-md testSubmit">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>

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

<div class="card-body">
    <div>
    <!-- center modal -->
    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form action="{{route('addSubject')}}" method="post" id="subjectForm">
                            @csrf
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Subject name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Subject Code</label>
                                    <input type="number" name="code" class="form-control" id="code">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script>
  $(document).ready(function() 
  {
    $("#subjectForm").validate({
        rules:
        {
            name: {
                required: true,
            },
            code: {
              required: true,
            }
        },
        messages: {
          name: 'Enter subject name',
          code: 'Enter SubjectCode',
        },
    });
  });
</script> 
