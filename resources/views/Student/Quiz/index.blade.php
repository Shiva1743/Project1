@include('layouts.header')
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
    .a {
    color: blue;
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
                        <h4 class="mb-sm-0 font-size-18">Quiz</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('SubjectListS')}}">Home</a>/</li>
                                <li class="breadcrumb">Quiz</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            @if(!empty($student))
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title a mb-4">Your Score::  {{$student->score}}</h4>
                            <form action="{{route('submitQuiz')}}" method="post" >
                                @csrf
                                @foreach($quizList as $k=>$Value)
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">{{$k+1}}.{{$Value->question}}</label>
                                </div>
                                <input type="hidden" name="data[{{$k}}][Q]" value="{{$Value->Q_srNo}}" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  id="flexRadioDefault1" name="data[{{$k}}][answer]" value="{{$Value->optionA}}">{{$Value->optionA}}
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  id="flexRadioDefault2" name="data[{{$k}}][answer]" value="{{$Value->optionB}}">{{$Value->optionB}}
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  id="flexRadioDefault3" name="data[{{$k}}][answer]" value="{{$Value->optionC}}">{{$Value->optionC}}
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  id="flexRadioDefault4" name="data[{{$k}}][answer]" value="{{$Value->optionD}}">{{$Value->optionD}}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="badge bg-success"> Answer ::</span> {{$Value->answer}}
                                @endforeach
                                <div>
                                    <input type="submit" id="submit" class="btn btn-primary w-md" value="Submit" disabled>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            @else
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            @if (isset($errors) && count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <h4 class="card-title mb-4">Questions</h4>
                            <form action="{{route('submitQuiz')}}" method="post" id="quizform">
                                @csrf
                            @foreach($quizList as $k=>$Value)
                                <input type="hidden" name="testID" value="{{$testID}}">
                                
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">{{$k+1}}.{{$Value->question}}</label>
                                </div>
                                <input type="hidden" name="data[{{$k}}][Q]" value="{{$Value->Q_srNo}}" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input option" type="radio" name="data[{{$k}}][answer]" value="{{$Value->optionA}}">{{$Value->optionA}}
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input option" type="radio" name="data[{{$k}}][answer]" value="{{$Value->optionB}}">{{$Value->optionB}}
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input option" type="radio" name="data[{{$k}}][answer]" value="{{$Value->optionC}}">{{$Value->optionC}}
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input option" type="radio" name="data[{{$k}}][answer]" value="{{$Value->optionD}}">{{$Value->optionD}}
                                        </div>
                                        </div>
                                    </div>
                                    <span class="error_append" style="color:red;"></span>
                                </div>
                            @endforeach
                                <div>
                                    <input type="submit" id="submitQuiz" class="btn btn-primary w-md" value="Submit">
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<!-- <script>
$(document).ready(function() 
{
    $('#submitquiz').on("submit",function(){
        if(!$('.option').is(":checked"))
        {
            $('.error_append').text("Please Select option");
            return false;
        }
        else
        {
            $('.error_append').text("");
            return true;
        }
    });
});
</script> -->
<script>
    // $(document).on("submit",function() 
    // {
//     var $data = $('.option');
//     alert($data);
//     $('.option').change(function()
//     {
//         alert("cjs");
//             $('input[name^="data\\["][name$="]"]').each(function(k,e){
//             var opt = $(this).attr('name');
//             var a = 'data['+k+'][answer]';
//             var b= $(a).is("checked");
//             if(!$(a).is("checked"))
//             {
//                 $('.error_append').text("Please Select option");
//                 $('#submitQuiz').prop("disabled","disabled");
//             }
//             if($(a).is("checked"))
//                 {
//                 alert("yes");
//                     $('.error_append').text("");
//                     $('#submitQuiz').prop("disabled","");
//                 }
//             // else 
//             // if(opt == 'data['+k+'][answer]')
//         });
        
//     })
    
//   });
  
</script>