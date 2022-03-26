
var i = 0;
var x = 1;
$('.addQ').click(function(e1){
e1.preventDefault();
    i++;
    x = 0;
        var divHtml = '<div class="col-lg-12"><div class="card bg-light text-white-50"><div class="card-body"><h5 class="mt-0 mb-4 text-dark">Q.</h5><input type="text" name="data['+i+'][question]" id="question" class="mt-0 mb-4 text-dark form-control"><div class="col-sm-6"><h5 class="mt-0 mb-4 text-dark">Answer.</h5><input type="text" name="data['+i+'][answers]" id="answer" class="mt-0 mb-4 text-dark form-control" ><h5 class="mt-0 mb-4 text-dark">Options.</h5><div class="addoptionDiv"><div class="row col-lg-12 text-dark"><div class="col-sm-6 addOptionDiv">A.<input type="text" name="data['+i+'][optionA]" id="option" class="mt-0 mb-4 text-dark form-control" >C.<input type="text" name="data['+i+'][optionC]" id="option" class="mt-0 mb-4 text-dark form-control" ></div><div class="col-sm-6 addOptionDiv">B.<input type="text" name="data['+i+'][optionB]" id="option" class="mt-0 mb-4 text-dark form-control" >D.<input type="text" name="data['+i+'][optionD]" id="optionD" class="mt-0 mb-4 text-dark form-control" ></div></div></div></div></div></div><a href="javascript: void(0);"><button class="btn btn-danger remove">X</button></a></div>';
        $('.addDiv').append(divHtml);
        x++;
    
});
$(document).on('click','.remove',function(e2){
    e2.preventDefault();
    $(this).closest('div').remove();
})
$(document).on('click','.removeOption',function(e2){
    alert("154545");
    e2.preventDefault();
    $(this).closest('.addOptionDiv').remove();
});
//   $(document).ready(function() 
//   {
//     $("#quizform").validate({
//         rules:
//         {
//             quiztitle:{
//                 required: true,
//             },
//             "data[]": "required",
//         },
//         messages: {
//             quiztitle: "Enter quiz title",
//             "data[]": "cjsadnj",
//         },
//     });
    
//   });
  