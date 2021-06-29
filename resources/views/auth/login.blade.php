<!DOCTYPE html>
<html lang="en">
   <head>
      <title>HIP | Admin</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="Codedthemes" />
      <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }} ">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
   </head>
   <body themebg-pattern="theme1">
      <div class="theme-loader">
         <div class="loader-track">
            <div class="preloader-wrapper">
               <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
               <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                     <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                     <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                     <div class="circle"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <section class="login-block">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                    @csrf
                  {{--logo--}}
                  <div class="text-center">
                     <img src="{{ asset('logo/logo.png') }} " alt="logo.png">
                  </div>

                  <div class="auth-box card">
                     <div class="card-block">
                        <div class="row m-b-20">
                           <div class="col-md-12">
                              <h3 class="text-center">Sign In</h3>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                           </div>
                        </div>
                        {{--email--}}
                        <div class="form-group form-primary">
                           <input type="email" id="email" name="email" class="form-control" value="{{ @old('email') }}">
                           <span class="form-bar"></span>
                           <label class="float-label">Your Email Address</label>
                        </div>
                        {{--password--}}
                        <div class="form-group form-primary">
                           <input type="password" id="password" name="password" class="form-control">
                           <span class="form-bar"></span>
                           <label class="float-label">Password</label>
                        </div>

                        <div class="row m-t-25 text-left">
                           <div class="col-12">
                              <div class="checkbox-fade fade-in-primary d-">
                                 <label>
                                 <input type="checkbox" value="">
                                 <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                 <span class="text-inverse">Remember me</span>
                                 </label>
                              </div>
                              <div class="forgot-phone text-right f-right">
                                 <a href="{{ route('password.request') }}" class="text-right f-w-600"> Forgot Password?</a>
                              </div>
                           </div>
                        </div>
                        <div class="row m-t-30">
                           <div class="col-md-12">
                              <button type="submit" name="sign_in" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                           </div>
                        </div>
                        <hr/>
                        <div class="row">
                           <div class="col-md-10">
                              <p class="text-inverse text-left m-b-0">Thank you.</p>
                              <p class="text-inverse text-left"><a href="javascript:void(0)"><b>Back to website</b></a></p>
                           </div>
                           <div class="col-md-2">
                              <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                           </div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }} "></script>
      <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }} "></script>
      <script type="text/javascript" src="{{ asset('assets/js/common-pages.js') }}"></script>
   </body>
</html>
