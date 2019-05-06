@extends('staff.layout')
@section('title','Adhimix | Nego')
@section('content')
<main id="main">
  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name }} <br><small style="font-size: 20px">Permintaan Penawaran</small></h1>
        <div class="row">
          <div class="col-lg-12">
            <div class="box wow" style="background-color: #6ea8af14">
              <form method="post" action="{{ url('do-nego/'.Request::segment(2)) }}">
                @csrf @method('patch')
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group m-b-40 focused">
                      <label>Nama Proyek</label>
                      <input type="text" placeholder=" Enter Project Name" data-toggle="tooltip" title="Nama Proyek" value="{{ $data['penawaran'][0]->nama_proyek }}" readonly="" class="form-control" >
                      <span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40 focused">
                      <label>Owner</label>
                      <input type="text" placeholder="Enter Owner's Name" data-toggle="tooltip" title="Nama Pemilik" value="{{ $data['penawaran'][0]->owner }}" readonly="" class="form-control" >
                      <span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40 focused">
                      <label>Alamat</label>
                      <input type="text" placeholder="Enter Address"  data-toggle="tooltip" title="Alamat" class="form-control" value="{{ $data['penawaran'][0]->alamat }}" readonly="">
                      <span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40 focused">
                      <label>Kota</label>
                      <input type="text" placeholder="Enter Address" class="form-control"  data-toggle="tooltip" title="Kota" value="{{ $data['penawaran'][0]->kota }}" readonly="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group m-b-40 focused">
                      <label>Mulai Proyek</label>
                      <input type="text" placeholder="Enter Address" class="form-control"  data-toggle="tooltip" title="Mulai Proyek" value="{{ $data['penawaran'][0]->mulai_proyek }}" readonly="">
                      <span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40 focused">
                      <label>Akhir Proyek</label>
                      <input type="text" placeholder="Enter Address" class="form-control"  data-toggle="tooltip" title="Akhir Proyek" value="{{ $data['penawaran'][0]->akhir_proyek }}" readonly="">
                      <span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40 focused">
                      <label>Uang Muka</label>
                      <input type="number" placeholder="Uang muka(%)" required=""  data-toggle="tooltip" title="Uang Muka" value="{{ $data['penawaran'][0]->uang_muka }}" name="uang_muka" class="form-control" >
                      <span class="bar"></span>
                    </div>
                    <div class="form-group m-b-40 focused">
                      <label>Status PPN</label>
                      <select class="form-control" required="" name="ppn"  data-toggle="tooltip" title="Status PPN">
                        <option value="">Pilih Status PPN</option>
                        <option @if ($data['penawaran'][0]->ppn=="Include")selected=""@endif>Include</option>
                        <option @if ($data['penawaran'][0]->ppn=="Exclude")selected=""@endif>Exclude</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <div class="table-responsive">
                      <hr>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th style="width: 10px">No</th>
                            <th>Mutu</th>
                            <th>Slump</th>
                            <th>Spec</th>
                            <th>Volume</th>
                            <th>Harga / Volume</th>
                            {{-- <th style="width: 60px;">Action</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data['mutulist'] as $e)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $e->nama_mutu }}</td>
                            <td>{{ $e->slump }}</td>
                            <td>{{ $e->spec }}</td>
                            <td><input type="number" value="{{ $e->vol }}"  name="vol{{ $loop->index + 1 }}" class="form-control" placeholder="Enter Here"></td>
                            <td><input type="number" value="{{ $e->harga }}" name="harga{{ $loop->index + 1 }}" class="form-control" placeholder="Enter Here">
                              <input type="number" name="id_mutu{{ $loop->index + 1 }}" value="{{ $e->id_mutu_penawaran }}">
                            </td>
                            <td>{{-- 
                              <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                            </td> --}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div><br>
                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>



  @endsection()