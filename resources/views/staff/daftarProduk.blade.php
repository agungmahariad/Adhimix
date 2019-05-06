@extends('staff.layout')
@section('title','Adhimix | Daftar Produk')
@section('content')
<main id="main">
  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name}}
          <br><small style="font-size: 20px;">Daftar Produksi</small></h1>
          <div class="row">
            <div class="col-lg-12">
              <div class="box" style="background-color: #6ea8af14">
                <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                  <thead> 
                    <tr class="text-center">
                      <th data-sortable="true">No</th>
                      <th data-sortable="true">Proyek</th>
                      <th data-sortable="true">Owner</th>
                      <th data-sortable="true">Vol. Kontrak</th>
                      <th data-sortable="true">Realisasi</th>
                      <th data-sortable="true">Sisa</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data['produksi'] as $e)
                    <tr>
                      <td class="text-center">{{ $loop->index + 1 }}</td>
                      <td>{{ $e->nama_proyek }}</td>
                      <td>{{ $e->nama_owner }}</td>
                      <td>{{ $e->vol_kontrak }}</td>
                      <td>{{ $e->terkirim }}</td>
                      <td>{{ $e->tersisa }}</td>
                      <td class="text-center">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal{{$e->id_proyek}}">Detail</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @foreach ($data['produksi'] as $e)
  <div class="modal fade" id="modal{{$e->id_proyek}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Detail Produksi</h3>
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
                    <input readonly="" type="text" name="" value="{{ $e->nama_proyek }}" class="form-control" >
                  </div>
                  <div class="form-goup">
                    <label>Owner</label>
                    <input readonly="" type="text" name="" value="{{ $e->nama_owner }}" class="form-control">
                  </div>
                  <div class="form-goup">
                    <label>mulai</label>
                    <input readonly="" type="date" value="{{ $e->tanggal_mulai }}" name="" class="form-control">
                  </div>
                  <div class="form-goup">
                    <label>Akhir</label>
                    <input readonly="" type="date" value="{{ $e->tanggal_akhir }}" name="" class="form-control">
                  </div>
                </div>
                <div class=" col-md-6 col-lg-6">
                  <div class="form-goup">
                    <label>Alamat</label>
                    <textarea readonly="" class="form-control" style="max-height: 100px; height: 100px; max-width: 400px;width: 370px;">{{ $e->alamat_proyek }}</textarea>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Docket</th>
                    <th>Tanggal Kirim</th>
                    <th>No. TM</th>
                    <th>Driver</th>
                    <th>Vol. Kirim</th>
                    <th>vol. Terima</th>
                  </tr>
                </thead>
                <br>
                <tbody>
                  @php
                    $no = 0;
                  @endphp
                  @foreach ($data['pengiriman'] as $row)
                    @if ($row->id_proyek == $e->id_proyek)  
                    @php
                      $no++
                    @endphp
                  <tr>
                    <td>{{ $no }}</td>
                    <td><input type="input" class="form-control" placeholder="" disabled value="{{ $row->docket }}"></td>
                    <td><input type="input" class="form-control" placeholder="" disabled value="{{ $row->tanggal_kirim }}"></td>
                    <td><input type="input" class="form-control" placeholder="" disabled value="{{ $row->no_tm }}"></td>
                    <td><input type="input" class="form-control" placeholder="" disabled value="{{ $row->nama_driver }}"></td>
                    <td><input type="input" class="form-control" placeholder="" disabled value="{{ $row->vol_kirim }}"></td>
                    <td><input type="input" class="form-control" placeholder="" disabled value="{{ $row->vol_terima }}"></td>
                  </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalnya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Detail Produksi</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col col-lg-12">
              <div id="" style="height: 500px; width: 100%;"></div>
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