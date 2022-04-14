<!DOCTYPE html>
<html lang="en">
<head>
  <title> Login </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet"/>
  <style>
    label.error{
      color: red;
    }
  </style>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif
                <form class="mx-1 mx-md-4" id="loginform" action="{{route('Login')}}" method="post">
                  @csrf
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form group col-md-8">
                      <input type="email" name="email" placeholder="Your Email" id="email" class="form-control" />
                    </div>
                  </div>
                  {{-- <label class="d-flex flex-row align-items-center mb-4 error">{{ $errors->first('email') }}</label> --}}
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form group col-md-8">
                      <input type="password" name="password" id="password" placeholder="Password" class="form-control" />
                    </div>
                  </div>
                  <label class="d-flex flex-row align-items-center mb-4 error">{{ $errors->first('password') }}</label>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-group col-md-8">
                        <select name="role" class="form-select" style="width:250px;">    
                            <option value="2" selected disabled> Select Type </option>
                            <option value="0">Staff Members</option>
                            <option value="1">Student</option>
                        </select>
                    </div>
                  </div>
                  <label class="d-flex flex-row align-items-center mb-4 error">{{ $errors->first('role') }}</label>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary btn-lg" value="Login">
                  </div>
                  <div>
                    Not Registered Yet??
                    <a href="{{route('RegisterPortal')}}">Register Here</a>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="{{asset('assets/draw1.jpg')}}" class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script>
  $(document).ready(function() 
  {
    $("#loginform").validate({
        rules:
        {
            email: {
              required: true,
              email: true
            },
            password: {
                required: true,
            },
            role: {
              required: true,
            }
        },
        messages: {
          email: 'Enter your registered email',
          password: 'Enter your password',
          role: 'Please select occupation',
        },
    });
  });
</script>