
@include('layouts.header')
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@include('layouts.sidebar')
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Quiz</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quiz</a></li>
                            <li class="breadcrumb-item active">Add Quiz</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif
                    <div class="card-body">
                        <span class="errormsg"></span>
                        <h4 class="card-title">Basic Information</h4>
                        <p class="card-title-desc">Fill all information below</p>

                        <form method="post" action="{{route('addQuiz')}}">
                            @csrf
                            <input type="hidden" name="testID" value="{{$testID}}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="quiztitle">Quiz Title</label>
                                        <input id="quiztitle" name="quiztitle" type="text" class="form-control">
                                    </div>
                                    <div class="addDiv">
                                    <div class="col-lg-12">
                                        <div class="card bg-light text-white-50">
                                            <div class="card-body">
                                                <h5 class="mt-0 mb-4 text-dark">Q.</h5>
                                                <input type="text" name="addquestion[0][question]" id="question" class="mt-0 mb-4 text-dark form-control">
                                                <div class="col-sm-6">
                                                <h5 class="mt-0 mb-4 text-dark">Answer.</h5>
                                                <input type="text" name="option[0][answers]" id="answer" class="mt-0 mb-4 text-dark form-control" >
                                                <h5 class="mt-0 mb-4 text-dark">Options.</h5>
                                                <div class="addOptionDiv">
                                                <input type="text" name="addoption[0][option][0]" id="optionA" class="mt-0 mb-4 text-dark form-control" >
                                                <a href="javascript: void(0);"><button class="btn btn-dark addOption">+</button></a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript: void(0);"><button class="btn btn-success addQ">+</button></a>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
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
<!-- 
$('#removeQ').click(function(e) {
            e.preventDefault();
            alert("remove");
            
      }) -->
      <!-- '<div class="col-lg-12 WholeQ"><div class="card bg-light text-white-50 Question"><div class="card-body"><h5 class="mt-0 mb-4 text-dark">Q.</h5><input type="text" name="question" id="question" class="mt-0 mb-4 text-dark form-control"><div class="col-sm-6"><h5 class="mt-0 mb-4 text-dark">Options.</h5><input type="text" name="option" id="optionA" class="mt-0 mb-4 text-dark form-control" ><a href="#"><button class="btn btn-dark">+</button></a></div></div></div><a href="#"><button class="btn btn-danger" id="removeQ">-</button></a></div>'; -->

<!-- Mirrored from themesbrand.com/skote-django/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jun 2021 11:18:48 GMT -->
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script>
      var i = 0;
      
      var x = 1;
      $('.addQ').click(function(e1){
        e1.preventDefault();
            i++;
            x = 0;
            var divHtml = '<div class="col-lg-12"><div class="card bg-light text-white-50"><div class="card-body"><h5 class="mt-0 mb-4 text-dark">Q.</h5><input type="text" name="addquestion['+i+'][question]" id="question" class="mt-0 mb-4 text-dark form-control"><div class="col-sm-6"><h5 class="mt-0 mb-4 text-dark">Answer.</h5><input type="text" name="option['+i+'][answers]" id="answer" class="mt-0 mb-4 text-dark form-control" ><h5 class="mt-0 mb-4 text-dark">Options.</h5><div class="addOptionDiv"><input type="text" name="addoption['+i+'][option]['+x+']" id="optionA" class="mt-0 mb-4 text-dark form-control" ><a href="javascript: void(0);"><button class="btn btn-dark addOption" id="addoption">+</button></a></div></div></div></div><a href="javascript: void(0);"><button class="btn btn-danger remove">X</button></a></div>';
            $('.addDiv').append(divHtml);
            x++;
            
      });
      for(var a = 1 ;a<=3; a++)
        {
            
            $(document).on('click','.addOption',function(e3){
                
                e3.preventDefault();
                 
                var divHtmlA = '<div class="addOptionDiv"><input type="text" name="addoption['+i+'][option]['+x+']" id="optionA" class="mt-0 mb-4 text-dark form-control" ><a href="javascript: void(0);"><button class="btn btn-danger removeOption">X</button></a></div>';
                $(this).closest('.addOptionDiv').append(divHtmlA);
                x++;
                if(a>2)
                {
                    $(this).closest('.addOption').prop('disabled',true);
                }
                else
                {
                    // x = 0;
                    $(this).closest('.addOption').prop('disabled',false);
                }
            });
        }
        $(document).on('click','.remove',function(e2){
          alert("154545");
          e2.preventDefault();
          $(this).closest('div').remove();
      })
      $(document).on('click','.removeOption',function(e2){
          alert("154545");
          e2.preventDefault();
          $(this).closest('.addOptionDiv').remove();
      })
</script> 
