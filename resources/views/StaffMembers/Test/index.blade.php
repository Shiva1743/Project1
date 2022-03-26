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
                        <h4 class="mb-sm-0 font-size-18">Test List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Create Tests/</a></li>
                                <li class="breadcrumb">Test List</li>
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
                            <!-- <button type="button" class="btn btn-primary waves-effect waves-light" style="float:right;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add Test</button> -->
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Test Name</th>
                                    <th>Test Description</th>
                                    <th>Status</th>
                                    <th>Add Questions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($testData as $testValue)
                                    <tr>
                                        <?php
                                        $subName = App\Models\Subject::select('subject.subName as subName')
                                            ->leftjoin('testnew','testnew.subID','=','subject.id')
                                            ->where('testnew.id',$testValue->id)
                                            ->first();
                                        ?>
                                        <td>
                                        @if(!empty($subName->subName))
                                        {{$subName->subName}}
                                        @endif
                                        </td>
                                        <td>{{$testValue->testName}}</td>
                                        <td>{{$testValue->description}}</td>
                                        <td> 
                                            @if($testValue->status == '0')
                                            <div class="form-check form-switch">
                                            <input data-id="{{$testValue->id}}" class="form-check-input theme-choice teststattus" type="checkbox" value="0" >
                                            </div>
                                            @else
                                            <div class="form-check form-switch">
                                            <input data-id="{{$testValue->id}}" class="form-check-input theme-choice teststattus" type="checkbox" value="1" checked >
                                            </div>
                                            @endif
                                        </td>
                                        <td><a href="{{route('createQuiz',['testID'=>$testValue->id])}}"><button class="btn btn-success">+</button></a></td>
                                        <td><a href="{{route('deleteSubject',['testID'=>$testValue->id])}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="mdi mdi-trash-can font-size-20 text-danger me-2" ></i></a></td>
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
    $('.teststattus').click(function(){
        var urlV = "{{route('testStatus')}}";
        var status = this.value;
        var testID = $(this).data("id");

        $.ajax({
            type: 'POST',
            url: urlV,
            data: {
                _token: "{{ csrf_token() }}",
                status: status,
                testID: testID,
            },
            success:function(data){
                alert("Status Changed Successfully :)");
            }
        });
    })
  });
  
</script> 