@php
use App\responpenawaran;
use App\historyPenawaran;
$harga  = 0;$total  = 0;
@endphp

@extends('staff.layout')
@section('title','Adhimix | Lihat Respon')
@section('content')
<main id="main">
  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-lg-12">
        @if ($data['penawaran'][0]->status !== "done")
        <a href="{{ url('nego/'.$data['penawaran'][0]->id_penawaran) }}" class="btn btn-success pull-right" style="margin: 2px; color: white">Klik Untuk Nego</a>
        <a href="{{ url('setuju/'.$data['penawaran'][0]->id_penawaran) }}" class="btn btn-warning pull-right" style="margin: 2px; color: white">Klik Bila Setuju</a>
        @else
        <h3 class="pull-right">Penawaran Telah Disetujui</h3>
        @endif
        <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name }} <br><small style="font-size: 20px">Daftar Nego</small></h1>

        <div class="row">
          <div class="col-lg-6">

            <div class="row">
              <div class="col-lg-3">
                <label>Nama Proyek </label>
              </div>
              <div class="col-lg-9">
                <div class="form-goup">
                  <input readonly="" type="text" name="" value="{{$data['penawaran'][0]->nama_proyek}}" class="form-control">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-3">
                <label>Owner </label>
              </div>
              <div class="col-lg-9">
                <div class="form-goup">
                  <input readonly="" type="text" name="" value="{{$data['penawaran'][0]->owner}}" class="form-control">
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">

            <div class="row">
              <div class="col-lg-3">
                <label>Alamat </label>
              </div>
              <div class="col-lg-9">
                <div class="form-goup">

                  <textarea readonly="" class="form-control" style="max-height: 65px; height: 100px; max-width: 540px;width: 400px;">{{$data['penawaran'][0]->alamat}}</textarea>
                </div>
                @foreach ($data['mutulist'] as $mutu)
                @if ($mutu->id_proyek==Request::segment(2))
                @php
                $harga = $mutu->vol * $mutu->harga;
                $total = $total + $harga;
                @endphp
                @endif
                @endforeach
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-lg-3">
                <label>Total Harga proyek </label>
              </div>
              <div class="col-lg-9">
                <div class="form-goup">
                  <input readonly="" type="text" name="" value="Rp.{{ number_format($total) }}" class="form-control">
                </div>
              </div>
            </div>

          </div>

        </div>

        <br>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="text-center">
                  <th style="width: 10px">No</th>
                  <th>Mutu</th>
                  <th>Slump</th>
                  <th>Spec</th>
                  <th>Volume</th>
                  <th>Harga Satuan</th>
                  <th>Total Harga</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['mutulist'] as $mutu)
                @php
                $harga = 0;
                @endphp
                @if ($mutu->id_proyek==Request::segment(2))
                @php
                $harga = $mutu->vol * $mutu->harga;
                @endphp
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $mutu->nama_mutu }}</td>
                  <td>{{ $mutu->slump }}</td>
                  <td>{{ $mutu->spec }}</td>
                  <td>{{ $mutu->vol }}</td>
                  <td>{{ $mutu->harga }}</td>
                  <td>{{ $harga}}</td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12">
            <div class="box wow" style="background-color: #6ea8af14">
              <br>
              <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Respon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (responpenawaran::where('id_proyek',Request::segment(2))->get() as $element)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $element->tgl_respon }}({{ $element->insert_by }})</td>
                    <td>
                      {{-- <button class="btn btn-success" data-toggle="modal" data-target="#detail{{ $element->id_respon_penawaran }}">Detail</button> --}}
                      <a href="{{ url('detail-lihat-penawaran/'.$element->id_respon_penawaran) }}" class="btn btn-success">Detail</a>
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
@foreach (responpenawaran::where('id_proyek',Request::segment(2))->get() as $row)
<div class="modal fade" id="detail{{ $row->id_respon_penawaran }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Detail Nego</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -30px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class=" col-lg-12">
            <div class="row">
              <div class=" col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Nama Proyek</label>
                  <input readonly="" type="text" name="" value="{{$data['penawaran'][0]->nama_proyek}}" class="form-control">
                </div>
                <div class="form-group">
                  <label>Owner</label>
                  <input readonly="" type="text" name="" value="{{$data['penawaran'][0]->owner}}" class="form-control">
                </div>
                <div class="form-group">
                  <label>From</label>
                  <input readonly="" type="date" value="{{$data['penawaran'][0]->mulai_proyek}}" name="" class="form-control">
                </div>
                <div class="form-group">
                  <label>To</label>
                  <input readonly="" type="date" value="{{$data['penawaran'][0]->akhir_proyek}}" name="" class="form-control">
                </div>
              </div>
              <div class=" col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea readonly="" class="form-control" style="max-height: 100px; height: 100px; max-width: 400px;width: 370px;">{{$data['penawaran'][0]->alamat}}</textarea>
                </div>
                <div class="form-group">
                  <label>Uang Muka (%)</label>
                  <input type="text" readonly="" class="form-control" value="{{ historyPenawaran::where('id_respon',$row->id_respon_penawaran)->first()['uang_muka'] }}" name="">
                </div>
                <div class="form-group">
                  <label>Status PPN</label>
                  <input readonly="" type="text" value="{{ historyPenawaran::where('id_respon',$row->id_respon_penawaran)->first()['ppn'] }}" name="" value="Exclude" class="form-control">
                </div>
                @if ($row->insert_by=="Admin")
                <div class="form-group">
                  <a href="{{ url('open-pdf-penawaran/'.$row->id_respon_penawaran) }}" target="_blank" class="btn btn-primary">Download PDF</a>
                </div>
                @endif
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
                @php
                $harga = 0;
                @endphp
                @foreach (DB::table('history_penawarans')->where('id_respon',$row->id_respon_penawaran)->join('mutus','mutus.id_mutu','=','history_penawarans.mutu')->select('history_penawarans.*','mutus.nama_mutu')->get() as $x)
                @php
                $harga = $x->vol * $x->harga;
                @endphp
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $x->nama_mutu }}</td>
                  <td>{{ $x->slump }}</td>
                  <td>{{ $x->spec }}</td>
                  <td>{{ $x->vol }}</td>
                  <td>{{ $harga }}</td>
                </tr>
                @endforeach
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
@endforeach


  @endsection()