@extends('admin.layout')
@section('title','Adhimix | Staff Management')
@section('content')
<main id="main">
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">
                    {{ $data['dataAdmin'][0]->company_name }}
                    <br>
                        <small>
                            Daftar Staff
                        </small>
                    </br>
                </h1>
                <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box wow" style="background-color: #6ea8af14">
                                <div class="btn-container btn-table-top">
                                    <button class="btn btn-primary" data-target="#new" data-toggle="modal">
                                        <i class="fas fa-user-plus">
                                        </i>
                                        Staff Baru
                                    </button>
                                </div>
                                <table class="table-default" data-pagination="true" data-search="true" data-select-item-name="toolbar1" data-show-columns="true" data-show-refresh="true" data-show-toggle="true" data-sort-name="name" data-sort-order="desc" data-toggle="table" data-url="tables/data1.json">
                                    <thead>
                                        <tr>
                                            <th data-sortable="true">
                                                No
                                            </th>
                                            <th data-sortable="true">
                                                Nama Staff
                                            </th>
                                            <th data-sortable="true">
                                                Username
                                            </th>
                                            <th data-sortable="true">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['list'] as $e)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $e->fullname }}
                                            </td>
                                            <td>
                                                {{ $e->username }}
                                            </td>
                                            <td>
                                                <button class="btn btn-small btn-danger" onclick="confdel({{ $e->id_user }})">
                                                    Hapus
                                                </button>
                                                <button class="btn btn-small btn-primary" data-target="#update" data-toggle="modal">
                                                    Update
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </br>
            </div>
        </div>
    </div>
</main>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Detail Staff
                </h3>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-container">
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="row">
                                <div class=" col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>
                                            Nama Staff
                                        </label>
                                        <input class="form-control" name="username" readonly="" type="text" value="Ahmad Soebardjo">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Username
                                        </label>
                                        <input class="form-control" name="username" readonly="" type="text" value="Username">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Password
                                        </label>
                                        <input class="form-control" name="username" readonly="" type="Password" value="Password">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="update" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Detail Staff
                </h3>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-container">
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="row">
                                <div class=" col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>
                                            Nama Staff
                                        </label>
                                        <input class="form-control" name="username" readonly="" type="text" value="Ahmad Soebardjo">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Username
                                        </label>
                                        <input class="form-control" name="username" readonly="" type="text" value="Username">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Password
                                        </label>
                                        <input class="form-control" name="username" readonly="" type="Password" value="Password">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Tutup
                </button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                    Ubah dan Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="new" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    Add new Staff
                </h3>
                <button aria-label="Close" class="close" data-dismiss="modal" style="margin-top: -30px;" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <form action="{{ url('add-staff') }}" class="form-container" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="row">
                                <div class=" col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>
                                            Nama Staff
                                        </label>
                                        <input class="form-control" name="fullname" placeholder="Nama staff" required="" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Username
                                        </label>
                                        <input class="form-control" name="username" placeholder="Username" required="" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Password
                                        </label>
                                        <input class="form-control" name="password" placeholder="Password" required="" type="Password" value="">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Phone number
                                        </label>
                                        <input class="form-control" name="no_telp" placeholder="Phone number" required="" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                                <div class=" col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>
                                            Jabatan
                                        </label>
                                        <input class="form-control" name="jabatan" placeholder="Jabatan" required="" type="text" value="">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">
                        Tutup
                    </button>
                    <button class="btn btn-primary" data-dismiss="update" type="submit">
                        Tambah Staff
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function confdel(id) {
    swal({
      title: "Hapus data?",
      text: "Akun tidak akan bisa digunakan kembali setelah terhapus!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Poof! Hapus berhasil!", {
          icon: "success",
        });
        window.location.href="{{ url('del-account/') }}/"+id;
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
</script>
@endsection
