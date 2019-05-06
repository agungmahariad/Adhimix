<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.png') }}" rel="icon">

  <!-- Fonts -->  
  <link rel="stylesheet" href="{{ asset('assets/fonts/font-hlv.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Niramit:400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/lib/data-table/data-table.css') }}" rel="stylesheet">  

  {{-- Droppidy --}}
  <link href="{{ asset('assets/lib/dropify/dropify.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/core.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/templates.css') }}" rel="stylesheet">
  {{-- Summernote --}}
  <link href="{{ asset('assets/lib/summernote/summernote.css') }}" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="body">

  <!--==========================
  Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block" style="display: none !important;">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o" style="color: #ad1948"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="fa fa-phone" style="color: #ad1948"></i> (62-21) 1500 636
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">
      <div id="logo">
        <a href="{{ url('dashboard-admin') }}" class="scrollto navbar-brand"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu cf">
          <li class=""><a href="{{ url('staff-management') }}">Pengaturan Staff</a></li>
          <li><a href="{{ url('company-setting') }}" class="twitter">Setting Perusahaan</a></li>
          <li><a href="#" onclick="conf()" class="twitter"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </li>
      </ul>
    </nav><!-- #nav-menu-container -->
  </div>
</header><!-- #header -->

  <!--==========================
  Intro Section
  ============================-->
  @yield('content')
  <footer id="footer">
    <div class="footer-content">
      <div class="container">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6" >
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d479316.28317795985!2d106.61280389971239!3d-6.387504753723039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb413e8d0488fcbfe!2sPT.+Adhimix+Precast+Indonesia!5e0!3m2!1sid!2sid!4v1533797298611" frameborder="0" style="border:0; width: 100%; height: 360px;" allowfullscreen></iframe> 
            </div>
            <div class="col-lg-6" style="padding-top: 50px;"> 
              <div class="row">
                <div class="col-sm-6">
                  <h2 class="header2">OFFICE</h2>
                  <p>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</p>
                  <h2 class="header2">CALL CENTER</h2>
                  <p>Call Center : (62-21) 1500.636</p>
                </div>
                <div class="col-sm-6">
                  <h2 class="header2">CONTACT</h2>
                  <p>Phone. (62-21) 1500.636 | Fax. (62-21) 799.1666</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
    <div class="footer-copy">
      <div class="container">
        &copy; 2018 | PT Adhimix Precast Indonesia. All Rights Reserved.
      </div>
    </div>   
  </footer><!-- #footer -->


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <<<<<<< HEAD
  <script src="{{asset('assets/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('assets/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('assets/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/lib/magnific-popup/magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/lib/sticky/sticky')}}.js"></script>
  <script src="assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('assets/contactform/contactform.js')}}"></script>
  <script src="{{asset('assets/lib/data-table/data-tale.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  =======
  <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('assets/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/lib/magnific-popup/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/lib/sticky/sticky.js') }}"></script>
  <script src="{{ asset('assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('assets/contactform/contactform.js') }}"></script>
  <script src="{{ asset('assets/lib/data-table/data-tale.js') }}"></script>

  {{-- Dropify --}}
  <script src="{{ asset('assets/lib/dropify/dropify.js') }}"></script>

  {{-- Summernote --}}
  <script src="{{ asset('assets/lib/summernote/summernote.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('assets/js/main.js') }} "></script>
  @if (session('success')!==null)
  <script>
    swal('Sukses!','{{ session('success') }}','success');
  </script>
  @endif
  @if (session('error')!==null)
  <script>
    swal('Gagal!','{{ session('error') }}','error');
  </script>
  @endif
  @if ($errors->any())
  @foreach ($errors->all() as $element)
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ $element }}
  </div>
  @endforeach
  @endif
  
  <script>
    function conf() {
      swal({
        title: "Logout?",
        text: "Setelah logout, Anda harus login kembali untuk mengakses web ini!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Logout berhasil!", {
            icon: "success",
          });
          window.location.href="{{ url('logout') }}";
        }
      });
    }
    function show(){
      if($("#muncul").hasClass('hide')){
        $("#muncul").removeClass('hide');
      }else{
        $("#muncul").addClass('hide');
      }
    }
    $(document).ready(function() {
      $('#summernote').summernote({
        popover: {
          image: [

            // This is a Custom Button in a new Toolbar Area
            ['custom', ['examplePlugin']],
            ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
            ]
          }
        });
      
    });
    $(document).ready(function() {
      $('.dropify').dropify();
    });
  </script>
</body>
</html>
