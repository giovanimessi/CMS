<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('Assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/style.css')}}">
    
</head>
<body>


    <header>

        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        
            <a class="navbar-brand" href="/">LOGO</a>
          
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <!-- Navbar menu -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-6">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">

    @foreach($front_menu as $menuSlug => $menutitle )
                <li class="nav-item">
                  
                    <a href="{{$menuSlug}}">{{$menutitle}}</a>

                </li>
                @endforeach
              </ul>
            </div>
            </div>
            </div>

            </div>  
          </nav>

    </header>
        







        

           

 
 @yield('content')





   <!-- footer start -->
   <footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-4 col-lg-6">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                            </a>
                        </div>
                        <p>
                         
                            {{$front_config['subtitle']}}
                        </p>
                        <!--redes sociais-->
                        <div class="socail_links"><
                            <ul>
                                <li>
                                    <a href="#">
                                        
                                        <i class="ti-facebook"  ></i>
                                    
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"  ></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                                Menu
                        </h3>
                        <ul>
                            @foreach($front_menu as $menuSlug => $menutitle )
                                       
                            <li>
                            <a href="{{$menuSlug}}">{{$menutitle}}</a>

                            </li>


                              @endforeach
                           
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Giovani Moura

                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->

<!-- JS  -->
<script src="{{asset('/Assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('/Assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('/Assets/js/popper.min.js')}}"></script>
<script src="{{asset('/Assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/Assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/Assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('/Assets/js/ajax-form.js')}}"></script>
<script src="{{asset('/Assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('/Assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/Assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('/Assets/js/scrollIt.js')}}"></script>
<script src="{{asset('/Assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('/Assets/js/wow.min.js')}}"></script>
<script src="{{asset('/Assets/js/nice-select.min.js')}}"></script>
<script src="{{asset('/Assets/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('/Assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('/Assets/js/plugins.js')}}"></script>
<script src="{{asset('/Assets/js/gijgo.min.js')}}"></script>

<!--contato js-->
<script src="{{asset('js/contact.js ')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>
</body>


</html>