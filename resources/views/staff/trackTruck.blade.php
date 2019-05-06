@extends('staff.layout')
@section('title','Adhimix | Tracking Truck')
@section('content')
<main id="main">
      <div class="container" style="margin-top: 100px">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">Nama Perusahaan
              <br><small style="font-size: 20px;">Daftar Pengiriman</small></h1>
              <br>
              <div class="form-group m-b-40 focused">
                <select class="form-control">
                  <option>Nama Proyek</option>
                  <option>Burj Khalifa Construction</option>
                  <option>Golden Gate</option>
                </select>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="box" style="background-color: #6ea8af14">
                    <table data-toggle="table" data-url="tables/data1.json" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                      <thead>
                        <tr>
                          <th data-sortable="true">No</th>
                          <th data-sortable="true">NO. DO</th>
                          <th data-sortable="true">Tanggal Pengiriman</th>
                          <th data-sortable="true">Jam Mulai</th>
                          <th data-sortable="true">No. TM</th>
                          <th data-sortable="true">Driver</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>001</td>
                          <td>01 Oktober 2018</td>
                          <td>10.30</td>
                          <td>024</td>
                          <td>Parjo</td>
                          <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalnya">Track</button>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>002</td>
                          <td>10 Oktober 2018</td>
                          <td>15.30</td>
                          <td>033</td>
                          <td>Samsul</td>
                          <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalnya">Track</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Detail Request</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class=" col-lg-12">
                  <div class="row">
                    <div class=" col-md-6 col-lg-6">
                      <div class="form-goup">
                        <label>Nama Proyek</label>
                        <input readonly="" type="text" name="" value="Netscape Browser 8" class="form-control">
                      </div>
                      <div class="form-goup">
                        <label>Owner</label>
                        <input readonly="" type="text" name="" value="Sir Arthur Connan Doyle" class="form-control">
                      </div>
                      <div class="form-goup">
                        <label>mulai</label>
                        <input readonly="" type="date" value="2018-02-18" name="" class="form-control">
                      </div>
                      <div class="form-goup">
                        <label>Akhir</label>
                        <input readonly="" type="date" value="2018-02-18" name="" class="form-control">
                      </div>
                    </div>
                    <div class=" col-md-6 col-lg-6">
                      <div class="form-goup">
                        <label>Alamat</label>
                        <textarea readonly="" class="form-control" style="max-height: 100px; height: 100px; max-width: 400px;width: 370px;">Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Detail Contract</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class=" col-lg-12">
                  <div class=" col-md-6 col-lg-6">
                    <div class="form-goup">
                      <label>ID Project</label>
                      <input readonly="" type="text" name="" value="ID001" class="form-control">
                    </div>
                  </div>
                  <div class=" col-md-6 col-lg-6">
                    <div class="form-goup">
                      <label>Nama Project</label>
                      <input type="text" name="" value="Burj Khalifa Construction" class="form-control" readonly="">
                    </div>
                  </div>
                  <div class="col col-md-12 col-lg-12">
                    <div class="form-goup">
                      <label>Client</label>
                      <input type="text" class="form-control" value="Client " name="" readonly="">
                    </div><br>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <h4>Staff List</h4>
                            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                              <thead>
                                <tr>
                                  <th  data-sortable="true">No</th>
                                  <th  data-sortable="true">ID Staff</th>
                                  <th  data-sortable="true">Nama Project</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>ID001</td>
                                  <td>Burj Khalifa Construction</td>
                                  <!-- <td>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</td> -->
                                </tr>

                                <tr>
                                  <td>2</td>
                                  <td>ID002</td>
                                  <td>Burj Khalifa Construction</td>
                                  <!-- <td>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 27 A Pancoran Jakarta Selatan 22780 - Indonesia</td> -->
                                </tr>

                                <tr>
                                  <td>3</td>
                                  <td>ID003</td>
                                  <td>Burj Khalifa Construction</td>
                                  <!-- <td>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 37 A Pancoran Jakarta Selatan 32780 - Indonesia</td> -->
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modalnya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Tracking Truck</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col col-lg-12">
                  <div id="map" style="height: 500px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>



      @endsection()