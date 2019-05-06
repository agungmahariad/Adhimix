<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adhimix - Landing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <link href="{{ asset('assets/img/logo baru.jpg') }}" rel="icon">
  <link href="{{ asset('assets/img/logo baru.jpg') }}" rel="apple-touch-icon">
  <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fonts/font-hlv.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Niramit:400,400i,700,700i" rel="stylesheet">
  <style type="text/css">
  .hide{
    display: none;
  }
</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg probootstrap-navabr-dark" id="nav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('assets/img/logo-main.png') }}" alt=""></a>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="icon"><i class="fas fa-mobile-alt"></i></div>
          <div class="sub">
            <label>Call Us</label>
            <span>1500-635</span>
          </div>
        </li>
        <li class="nav-item">
          <div class="icon"><i class="far fa-building"></i></div>
          <div class="sub">
            <label>Office Hour</label>
            <span>Monday-Friday 8.00 - 17.00</span>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <section class="probootstrap-cover" style="background: url({{ asset('assets/img/landingpage.jpg') }}) center no-repeat; background-size: cover;">
    <div class="row">
      <div class="container">
        <div class="row probootstrap-vh-100 align-items-center text-center">
          <div class="col-sm">
            <div class="probootstrap-text">
              @if (session('success'))
              {{-- expr --}}
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('success') }}
              </div>
              @endif
              @if (session('error'))
              {{-- expr --}}
              <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('error') }}
              </div>
              @endif
              <h4 class="probootstrap-heading text-white cf">Build A Better Way</h4>
              <div class="probootstrap-subheading mb-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
              </div>
              <p>
                <button class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#login">Perusahaan sudah terdaftar</button>
                <button class="btn btn-primary btn-outline-white mb-2" data-toggle="modal" data-target="#signup">Daftarkan Perusahaan</button></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <div class="modal fade modal-login" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="logo-container">
                <img src="{{ asset('assets/img/logo-main.png') }}">
                <label>Masukkan Akun Perusahaan Anda</label>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <img src="{{ asset('assets/img/bg-login-header.jpg') }}">
              </div>
              <div class="col-lg-12">
                <form class="form-container" action="{{ url('login') }}" method="post" id="perusahaan">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="btn-container">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-login" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="logo-container">
                <img src="{{ asset('assets/img/logo-main.png') }}">
                <label>Daftarkan Akun Perusahaan Anda</label>
              </div>
            </div>
            <div class="form-container" id="perusahaan">
              <div class="row">
                <div class="col-sm-12">
                  <div class="autocomplete">
                    <input id="myInput" onkeyup="search()" class="form-control form-highlight" type="text" name="myCompany" placeholder="Nama Perusahaan">
                    <div id="isi">

                    </div>
                    <input type="checkbox" name="" id="comp_new" onchange="cek()"> <label for="comp_new">Klik untuk perusahaan baru</label>
                  </div>
                </div>
              </div>            
              <form method="post" action="{{ url('daftar') }}">
                @csrf
                <div class="row">                
                  <div class="col-md-6">
                    <h3>Data Perusahaan</h3>
                    <div class="form-group"><input required="" type="text" id="company_name" class="form-control" readonly="" name="company_name" placeholder="Nama Perusahaan"></div>
                    <div class="form-group"><input required="" type="text" id="address" class="form-control" readonly="" name="address" placeholder="Alamat"></div>
                    <div class="form-group"><input required="" type="text" id="npwp" class="form-control" readonly="" name="npwp" placeholder="NPWP"></div>
                    <div class="form-group"><input required="" type="email" id="email" class="form-control" readonly="" name="email" placeholder="Email"></div>
                    <div class="form-group"><input required="" type="number" id="no_telp" class="form-control" readonly="" name="no_telp" placeholder="No Telepon"></div>
                    <div class="form-group"><input required="" type="text" id="no_rek" class="form-control" readonly="" name="no_rek" placeholder="No Rekening Perusahaan"></div>
                  </div>
                  <div class="col-md-6">
                    <h3>Data Admin</h3>
                    <div class="form-group"><input required="" type="text" class="form-control" name="fullname" placeholder="Nama Admin"></div>
                    <div class="form-group"><input required="" type="text" class="form-control" name="jabatan" placeholder="Jabatan"></div>
                    <div class="form-group"><input required="" type="text" class="form-control" name="no_telp_admin" placeholder="No Telepon"></div>
                    <div class="form-group"><input required="" type="text" class="form-control" name="username" placeholder="Username"></div>
                    <div class="form-group"><input required="" type="Password" class="form-control" name="password" placeholder="Password"></div>
                  </div>
                  <div class="col-sm-12">
                    <div class="btn-container">
                      <button class="btn btn-primary" type="submit">Daftarkan Perusahaan</button>
                    </div>
                  </div>              
                </form>
              </div>            
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="{{asset('assets/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    {{-- <script src="{{asset('assets/js/autocomplete.js')}}"></script> --}}

    <script>
      function search() {
        if($("#myInput").val()!=='')
        {
          $("#isi").removeClass('hide');
          $.ajax({
            type: "GET",
            url: "{{ url('api/search-company/') }}/"+$("#myInput").val(),
            success: function (data) {
              if(data !==null){
                $("#isi").html(data);
              }
            }
          }); 
        }else{
          $("#isi").addClass('hide');
        }
      }

      function cek() {
        if($("#comp_new").prop('checked')){
          $("#myInput").prop('disabled',true);
          $("#company_name").prop('readonly',false);
          $("#address").prop('readonly',false);
          $("#npwp").prop('readonly',false);
          $("#email").prop('readonly',false);
          $("#no_telp").prop('readonly',false);
          $("#no_rek").prop('readonly',false);
        }else{
          $("#myInput").prop('disabled',false);
          $("#company_name").prop('readonly',true);
          $("#address").prop('readonly',true);
          $("#npwp").prop('readonly',true);
          $("#email").prop('readonly',true);
          $("#no_telp").prop('readonly',true);
          $("#no_rek").prop('readonly',true);
          $("#company_name").val('');
          $("#address").val('');
          $("#npwp").val('');
          $("#email").val('');
          $("#no_telp").val('');
          $("#no_rek").val(''); 
        }
      }

      function move() {
        if ($("#id_company").val()!=='') { 
          $.ajax({
            type: "GET",
            url: "{{ url('api/get-company/') }}/"+$("#id_company").val(),
            success: function (data) {
              if(data !==null){
                $("#company_name").val(data[0]['company_name']);
                $("#address").val(data[0]['address']);
                $("#npwp").val(data[0]['npwp']);
                $("#email").val(data[0]['email']);
                $("#no_telp").val(data[0]['no_telp']);
                $("#no_rek").val(data[0]['no_rek']);
              }
            }
          }); 
        }else{
          $("#company_name").val('');
          $("#address").val('');
          $("#npwp").val('');
          $("#email").val('');
          $("#no_telp").val('');
          $("#no_rek").val(''); 
        }
      }
    </script>

  </body>
  </html>
