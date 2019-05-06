@php
use App\responpenawaran;
@endphp
@extends('staff.layout')
@section('title','Adhimix | Permintaan Penawaran')
@section('content')
<main id="main">
  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name }} <br><small style="font-size: 20px">Permintaan Penawaran</small></h1>
        <div class="row">
          <div class="col-lg-12">
            <div class="box wow" style="background-color: #6ea8af14">
              <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <a href="{{ url('penawaran-baru') }}" class="btn btn-primary"> Permintaan Baru</a>
                <thead>
                  <tr class="text-center">
                    <th data-sortable="true">No</th>
                    <th data-sortable="true">Proyek</th>
                    <th data-sortable="true">Owner</th>
                    <th data-sortable="true">Alamat</th>
                    <th data-sortable="true">Kota</th>
                    <th data-sorttable="true">Tanggal Respon</th>
                    <th>Respon Adhimix</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data['penawaran'] as $e)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $e->nama_proyek }}</td>
                    <td>{{ $e->owner }}</td>
                    <td>{{ $e->alamat }}</td>
                    <td>{{ $e->kota }}</td>
                    <td>
                      @if (responpenawaran::where('id_proyek',$e->id_penawaran)->count() > 0)
                      {{ responpenawaran::where('id_proyek',$e->id_penawaran)->orderBy('times','DESC')->get()[0]->tgl_respon }}
                      @else 
                      Belum ada respon
                      @endif
                    <td class="text-center">
                      @if (responpenawaran::where('id_proyek',$e->id_penawaran)->count() > 0)
                        <a href="{{ url('lihat-penawaran/'.$e->id_penawaran) }}" class="btn btn-success">Lihat</a></td>
                      @else 
                        Belum ada respon
                      @endif
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Detail Penawaran</h3>
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
                  <label>From</label>
                  <input readonly="" type="date" value="2018-02-18" name="" class="form-control">
                </div>
                <div class="form-goup">
                  <label>To</label>
                  <input readonly="" type="date" value="2018-02-18" name="" class="form-control">
                </div>
              </div>
              <div class=" col-md-6 col-lg-6">
                <div class="form-goup">
                  <label>Alamat</label>
                  <textarea readonly="" class="form-control" style="max-height: 100px; height: 100px; max-width: 400px;width: 370px;">Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</textarea>
                </div>
                <div class="form-goup">
                  <label>Uang Muka (%)</label>
                  <input type="text" readonly="" class="form-control" value="100%" name="">
                </div>
                <div class="form-goup">
                  <label>Status PPN</label>
                  <input readonly="" type="text" name="" value="Include" class="form-control">
                </div>
              </div>
            </div>
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Mutu</th>
                  <th>Slump</th>
                  <th>Spec</th>
                  <th>Volume</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <br>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><input type="input" class="form-control" placeholder="K-100" disabled></td>
                  <td><input type="input" class="form-control" placeholder="" disabled></td>
                  <td><input type="input" class="form-control" placeholder="" disabled></td>
                  <td><input type="input" class="form-control" placeholder="10" disabled></td>
                  <td><input type="input" class="form-control" placeholder="Rp. 500.000" disabled></td>
                </tr>
              </tbody>
            </table>
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
                      <table  data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
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
    </div>
  </div>
</div>

      @endsection()