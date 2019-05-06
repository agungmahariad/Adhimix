@extends('adhimix.layout')
@section('title','Data Company')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Data Perusahaan
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4 class="">
						Perusahaan
					</h4>
					<p>
						Admin dapat melihat data perusahaan di sini.
					</p>
					<hr>
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
												<th style="width: 15%;">No</th>
												<th>Nama</th>
												<th>Alamat</th>
												<th>Npwp</th>
												<th>Email</th>
												<th>No Telp</th>
												<th>No Rek</th>
												<th style="width: 18%;">
													Aksi
												</th>
											</tr>
										</thead>
										<tbody id="isi">
											@foreach ($data['dataCompany'] as $e)
											<tr>
												<td class="text-center">{{ $loop->index + 1 }}</td>
												<td class="text-center">{{ $e->company_name }}</td>
												<td class="text-center">{{ $e->address }}</td>
												<td class="text-center">{{ $e->npwp }}</td>
												<td class="text-center">{{ $e->email }}</td>
												<td class="text-center">{{ $e->no_telp }}</td>
												<td class="text-center">{{ $e->no_rek }}</td>
												<td style="text-align: center;">
													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{ $e->id_company }}" title="Edit"><i class="fa fa-edit"></i></button>
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