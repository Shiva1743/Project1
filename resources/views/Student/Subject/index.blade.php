@include('layouts.header')
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
    .card-body
    {
        background-color: white;
    }
    .a
    {
        background-color: antiquewhite;
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
                            <h4 class="mb-sm-0 font-size-18">
                                Subject List
                            </h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li> 
                                        <a href="{{route('SubjectListS')}}">
                                            Subject
                                        </a>/</li>
                                    <li class="breadcrumb-item active">
                                        Subject List
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control search" placeholder="Search by name">
                    </div>
                </div><br>
                <div class="row searchdata">
                    
                    </div>
                </div>
                <div class="record"></div>
            <!-- end page title -->
            <div class="row removesearch">
                @if(empty($subjectList->all()))
                <div class="col-xl-12 col-sm-12">
                        <div class="card">
                            <div class="card-body" >
                                <div class="media">
                                    <div class="avatar-md me-4">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/booksimage.jpg" alt="" height="70px" width="70px"  style="border-radius: 50%;">
                                        </span>
                                    </div>

                                    <div class="media-body overflow-hidden">
                                        <h1 class="text-truncate font-size-100">Subject is not created yet</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top a">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                    <h4>Visit site Regularly</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($subjectList as $subValue)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card border-success mb-3">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-md me-4">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <img src="assets/images/booksimage.jpg" alt="" height="70px" width="70px"  style="border-radius: 50%;">
                                        </span>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h1 class="text-truncate font-size-100"><a href="{{route('TestListS',['subID'=>$subValue->id])}}" class="text-darkblue" id="task-name"><< {{$subValue->subName}} >></a></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 border-top a">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-3">
                                    <h4><i class= "dripicons-code me-2"></i>SubjectCode:{{$subValue->subNo}}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="center-screen" style="position: bottom; padding-left:40%">
                        {{ $subjectList->links('pagination::bootstrap-4') }}
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

<script>
    $(document).ready(function()
    {
        $(".search").on("keyup",function(e)
        {
            var text = $(this).val();
            var rut = "{{route('searchSUB')}}";
            $.ajax({
                type:"POST",
                url:rut,
                data:{ 
                    _token: "{{csrf_token()}}",
                    name: text,
                },
                success:function(data){
                    if(data)
                    {
                        $.each(data, function(index, value) {
                            $subid = value.id;
                            $('.searchdata').append('<div class="col-xl-4 col-sm-6"><div class="card border-success mb-3"><div class="card-body"><div class="media"><div class="avatar-md me-4"><span class="avatar-title rounded-circle bg-light text-danger font-size-16"><img src="assets/images/booksimage.jpg" alt="" height="70px" width="70px"  style="border-radius: 50%;"></span></div><div class="media-body overflow-hidden"><h1 class="text-truncate font-size-100"><a href="{{route("TestListS",["subID"=>'.$subid.'])}}" class="text-darkblue" id="task-name"> '+value.subName+' </a></h1></div></div></div><div class="px-4 py-3 border-top a"><ul class="list-inline mb-0"><li class="list-inline-item me-3"><h4><i class= "dripicons-code me-2"></i>SubjectCode:'+value.subNo+'</h4></li></ul></div></div></div>');
                            $('.removesearch').remove();
                        });
                    }
                    else(empty(data))
                    {
                        $(".record").html('<div">No Records found</div>');
                        $('.removesearch').remove();
                    }
                }
                
            });
        })
        $(".search").focusout(function(e){
            location.reload();
        })
    });
</script>

