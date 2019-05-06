@php
use App\responPenawaran;
use App\kontrak;
@endphp
@extends('adhimix.layout')
@section('title','Adhimix Kontrak Management')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Data Penawaran Siap Kontrak
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4 class="">
						Kontrak
					</h4>
					<p>
						Admin dapat melihat data kontrak di sini.
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
												<td class="text-left">{{ $loop->index + 1 }}</td>
												<td class="text-left">{{ $list->nama_proyek }}</td>
												<td class="text-left">{{ $list->owner }}</td>
												<td class="text-left">{{ $list->alamat }}</td>
												<td class="text-left">{{ $list->kota }}</td>
												<td class="text-center">
													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#detail{{ $list->id_dukungan }}" title="Detail"><i class="fa fa-search"></i></button>
													@if (kontrak::where('id_proyek',$list->id_penawaran)->count() < 1)

													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#terima{{ $list->id_penawaran }}" title="Kirim Kontrak"><i class="fa fa-send"></i></button> 
													@else	
													<h5 title="{{ kontrak::where('id_proyek',$list->id_penawaran)->get()[0]->created_at }}">kontrak telah dikirim</h5>
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
<div class="modal fade text-xs-left" id="terima{{ $list->id_penawaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Tetapkan Harga</h4>
			</div>
			<form enctype="multipart/form-data" action="{{ url('kirim-kontrak/'.$list->id_penawaran) }}" method="post">
				@csrf 
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Masukan Komentar</label>
								<textarea class="form-control" style="height:195px;resize: none;" required="" placeholder="Masukan Deskripsi" name="komentar"></textarea>
							</div>					
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Masukan PDF</label>
								<input type="file"  class="dropify" name="pdf">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade text-xs-left" id="detail{{ $list->id_dukungan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
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
									<input readonly="" type="date" value="{{ $list->mulai_proyek }}" name="" class="form-control">
								</div>
								<div class="form-goup">
									<label>Sampai</label>
									<input readonly="" type="date" value="{{ $list->akhir_proyek }}" name="" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-goup">
									<label>Provinsi (Kota)</label>
									<input readonly="" type="input" value="{{ $list->provinsi }} ({{ $list->kota }})" name="" class="form-control">
								</div>

								<div class="form-goup">
									<label>Alamat</label>
									<textarea class="form-control" style="resize: none;" readonly="">{{ $list->alamat }}</textarea>
								</div>
								<div class="form-goup">
									<label>Uang Muka</label>
									<input readonly="" type="input" value="{{ $list->uang_muka }}%" name="" class="form-control">
								</div>
								<div class="form-goup">
									<label>Status PPN</label>
									<input readonly="" type="input" value="{{ $list->ppn }}" name="" class="form-control">
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="table-responsive">
							<hr>
								<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered " width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Mutu</th>
										<th>Slump</th>
										<th>Spec</th>
										<th>Volume(m3)</th>
										<th class="text-center">Harga / Vol</th>
									</tr>
								</thead>
								<tbody>
									@php
									$no = 0;
									@endphp
									@foreach ($data['mutulist'] as $mutu)
									@if ($mutu->id_proyek==$list->id_penawaran)
									@php
									$no++;
									@endphp
									<tr>
										<td>{{ $no }}</td>
										<td>{{ $mutu->nama_mutu }}</td>
										<td>{{ $mutu->slump }}</td>
										<td>{{ $mutu->spec }}</td>
										<td>{{ $mutu->vol }}</td>
										<td class="text-center">Rp.{{ number_format($mutu->harga) }}</td>
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