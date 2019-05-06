@extends('admin.layout')
@section('title','Adhimix | Company Setting')
@section('content')

<main id="main">
  <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
          @foreach ($data['dataUser'] as $e)
            
          <div class="card-body">
            <center class="m-t-30"> <img src="assets/img/29.jpg" class="img-circle" width="150" />
              <h4 class="card-title m-t-10">{{ $e->company_name }}</h4>
              <h6 class="card-subtitle">{{ $e->fullname }}</h6>
              <div class="row text-center justify-content-md-center">
                                        <!-- <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fa fa-user"></i> <font class="font-medium">254</font></a></div>
                                          <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fa fa-cubes"></i> <font class="font-medium">54</font></a></div> -->
                                        </div>
                                      </center>
                                    </div>
                                    <div>
                                      <hr> </div>
                                      <div class="card-body text-center">

                                      <!--  <small class="text-muted">Email address </small>
                                        <h6>angkasapura@gmail.com</h6> <small class="text-muted p-t-30 db">Phone</small>
                                        <h6>+62 838 1121 2847</h6> -->
                                        <small class="text-muted p-t-30 db">Address</small>
                                        <h6>{{ $e->address }}</h6> 
                                        <div class="map-box">
                                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89749.29570104559!2d106.73279678351606!3d-6.211392202247391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb413e8d0488fcbfe!2sPT.+Adhimix+Precast+Indonesia!5e0!3m2!1sid!2sid!4v1534320845319" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        </div>
                                        
                                      <!--   <div class="col-sm-12">
                                          <br>
                                          <button class="btn btn-success">Edit</button>
                                        </div> -->
                                 <!-- <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button> -->
                              </div>
                            </div>
                          </div>
                          <!-- Column -->
                          <!-- Column -->
                          <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs profile-tab" role="tablist">
                                <!--                                 <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li> -->
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                               
                                  <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Company Name</strong>
                                          <br>
                                          <p class="text-muted">{{ $e->company_name }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Phone</strong>
                                          <br>
                                          <p class="text-muted">{{ $e->no_company }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r" style="padding-left: 0px;"> <strong>Email</strong>
                                          <br>
                                          <p class="text-muted">{{ $e->email }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Address</strong>
                                          <br>
                                          <p class="text-muted">{{ $e->address }}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong>Sector</strong>
                                          <ul>
                                            <li>Sector 1</li>
                                            <li>Sector 2</li>
                                          </ul>
                                        </div>
                                      </div>
                                      <h4 class="font-medium m-t-30">Company Profile</h4>
                                      <hr>
                                      <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                      <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                      </div>
                                      <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="card-body">
                                          <form method="post" action="{{ url('updatecompany/'.$e->id_company) }}" class="form-horizontal form-material">
                                            @csrf @method('patch')
                                            <div class="form-group">
                                              <label class="col-md-12">Company Name</label>
                                              <div class="col-md-12">
                                                <input type="text" value="{{ $e->company_name }}" class="form-control form-control-line" name="company_name">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="example-email" class="col-md-12">Email</label>
                                              <div class="col-md-12">
                                                <input type="email" value="{{ $e->email }}" class="form-control form-control-line" name="email" id="example-email">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-md-12">Phone</label>
                                              <div class="col-md-12">
                                                <input type="number" value="{{ $e->no_company }}" class="form-control form-control-line" name="no_telp">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-md-12">No Rek</label>
                                              <div class="col-md-12">
                                                <input type="number" value="{{ $e->no_rek }}" class="form-control form-control-line" name="no_rek">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-md-12">NPWP</label>
                                              <div class="col-md-12">
                                                <input type="input" value="{{ $e->npwp }}" class="form-control form-control-line" name="npwp">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-md-12">Picture</label>
                                              <div class="col-md-12">
                                                <input type="file" data-default-file="{{ asset('admin/profil/').$e->pict }}" id="input-file-now" name="gambar" class="dropify" />
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-12">Alamat</label>
                                              <div class="col-sm-12">
                                                <textarea class="form-control form-control-line" name="alamat">{{ $e->address }}</textarea>
                                              </div>
                                            </div>
                                            {{-- <div class="form-group">
                                              <label class="col-md-12">About</label>
                                              <div class="col-sm-12">
                                                <textarea id="summernote"></textarea>
                                              </div>
                                            </div> --}}
                                            <div class="form-group">
                                              <div class="col-sm-12">
                                                <button class="btn btn-success" type="submit">Update Profile</button>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Column -->
                              </div>
                            </div>
                          </main>
          @endforeach



                          @endsection