@php
use App\responDukungan;
@endphp
@extends('adhimix.layout')
@section('title','Dukungan Admin')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Data Dukungan
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4 class="">
						Dukungan
					</h4>
					<p>
						Admin dapat melihat data Dukungan di sini.
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
												<th>No</th>
												<th>Proyek</th>
												<th>Owner</th>
												<th>Alamat</th>
												<th>Kota</th>
												<th style="width: 18%;">Aksi</th>
											</tr>
										</thead>
										<tbody id="isi">
											@foreach ($data['list'] as $list)
											<tr>
												<td>{{ $loop->index + 1 }}</td>
												<td>{{ $list->nama_proyek }}</td>
												<td>{{ $list->owner }}</td>
												<td>{{ $list->alamat }}</td>
												<td>{{ $list->kota }}</td>
												<td style="text-align: center;">
													@if (responDukungan::where('id_proyek',$list->id_dukungan)->count()>0)
													<h3 title="{{ responDukungan::where('id_proyek',$list->id_dukungan)->get()[0]->created_at }}">Telah Direspon</h3>
													@else

													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#detail{{ $list->id_dukungan }}" title="Detail"><i class="fa fa-search"></i></button>
													<button class="btn btn-outline-primary" title="Tolak" onclick="tolak({{ $list->id_dukungan }})"><i class="fa fa-close"></i></button>
													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#terima{{ $list->id_dukungan }}" title="Terima"><i class="fa fa-check"></i></button>
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
		</section>
	</div>
</div>

@foreach ($data['list'] as $list)
<div class="modal fade text-xs-left" id="terima{{ $list->id_dukungan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Terima Dukungan</h4>
			</div>
			<form enctype="multipart/form-data" action="{{ url('terima/'.$list->id_dukungan) }}" method="post">
				@csrf 
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Masukan Komentar</label>
								<textarea class="form-control" required="" placeholder="Masukan Komentar" name="responDesc" style="resize: none; height: 200px;"></textarea>
							</div>			
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>UPLOAD PDF</label>
								<input type="file" class="dropify" name="pdf" required="">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary">Upload</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade text-xs-left" id="detail{{ $list->id_dukungan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Detail Permintaan Dukungan</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class=" col-lg-12">
						<div class="row">
							<div class=" col-md-6 col-lg-6">
								<div class="form-goup">
									<label>Nama Proyek</label>
									<input readonly="" type="text" name="" value="{{ $list->nama_proyek }}" class="form-control">
								</div>
								<div class="form-goup">
									<label>Owner</label>
									<input readonly="" type="text" name="" value="{{ $list->owner }}" class="form-control">
								</div>
								<div class="form-goup">
									<label>Dari</label>
									<input readonly="" type="date" value="{{ $list->proyek_mulai }}" name="" class="form-control">
								</div>
								<div class="form-goup">
									<label>Sampai</label>
									<input readonly="" type="date" value="{{ $list->proyek_akhir }}" name="" class="form-control">
								</div>
							</div>
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
										<th>Volume(m3)</th>
									</tr>
								</thead>
								<tbody>
									@php
									$no = 0;
									@endphp
									@foreach ($data['mutulist'] as $mutu)
									@if ($mutu->id_proyek==$list->id_dukungan)
									@php
									$no++;
									@endphp
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $mutu->nama_mutu }}</td>
										<td><input type="input" class="form-control" placeholder="Enter Here" value="{{ $mutu->vol }}" disabled></td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach

<script>
	function tolak(id) {
		swal({
			title: "Tolak permintaan ini?",
			text: "Anda tidak akan bisa mengembalikan status nya kembali!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				swal("Poof! Hapus berhasil!", {
					icon: "success",
				});
				window.location.href="{{ url('api/tolak/') }}/"+id;
			}
		});
	}
</script>
@endsection