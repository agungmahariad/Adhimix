@extends('adhimix.layout')
@section('title','Data Mutu')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Data Mutu
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4 class="">
						Mutu
					</h4>
					<p>
						Admin dapat melihat data mutu di sini.
					</p>
					<hr>
					<button class="btn btn-outline-primary" data-toggle="modal" data-target="#buatmutu" title="Edit"><i class="icon-plus-circle"></i> Tambah Mutu</button>
				</div>
			</div>
			<link rel="stylesheet" type="text/css" href="{{ asset('backend/data-table/bootstrap.css') }}">
			<div class="row" style="margin-top: -30px;">
				<div class="col-12">
					@if ($errors->any())
					@foreach ($errors->all() as $element)
					{{-- expr --}}
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{ $element }}
					</div>
					@endforeach
					@endif
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

					<div class="card">
						<div class="container">
							<div class="card-body">
								<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
									<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered tableku" width="100%">
										<thead>
											<tr>
												<th style="width: 15%;">
													No
												</th>
												<th>
													Mutu
												</th>
												<th>
													Harga
												</th>
												<th style="width: 18%;">
													Aksi
												</th>
											</tr>
										</thead>
										<tbody id="isi">
											@foreach ($data['dataMutu'] as $e)
											<tr>
												<td class="text-center">{{ $loop->index + 1 }}</td>
												<td class="text-center">{{ $e->nama_mutu }}</td>
												<td class="text-center">{{ $e->harga }}</td>
												<td style="text-align: center;">
													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{ $e->id_mutu }}" title="Edit"><i class="fa fa-edit"></i></button>
													<button class="btn btn-outline-primary" title="Delete" onclick="tolak({{ $e->id_mutu }})"><i class="icon-trash3"></i></button>
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
		</section>
	</div>
</div>

<div class="modal fade text-xs-left" id="buatmutu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Tambah Data Mutu</h4>
			</div>
			<form enctype="multipart/form-data" action="{{ url('createmutu') }}" method="post">
				@csrf
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Mutu</label>
								<input type="input" class="form-control" name="mutu" required="">
							</div>			
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Harga Mutu</label>
								<input type="input" class="form-control" name="harga" required="">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary">Tambah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>

@foreach ($data['dataMutu'] as $e)
<div class="modal fade text-xs-left" id="edit{{ $e->id_mutu }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Ubah Data Mutu</h4>
			</div>
			<form enctype="multipart/form-data" action="{{ url('editmutu/'.$e->id_mutu) }}" method="post">
				@csrf @method('patch')
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Mutu</label>
								<input type="input" class="form-control" value="{{ $e->nama_mutu }}" name="mutu" required="">
							</div>			
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Harga Mutu</label>
								<input type="input" class="form-control" value="{{ $e->harga }}" name="harga" required="">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary">Ubah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
<script>
	function tolak(id) {
		swal({
			title: "Hapus Mutu ini?",
			text: "Anda tidak akan bisa mengembalikan mutu nya kembali!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				swal("Poof! Hapus berhasil!", {
					icon: "success",
				});
				window.location.href="{{ url('deletemutu') }}/"+id;
			}
		});
	}
</script>
@endsection