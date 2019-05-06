@php
use App\responPenawaran;
use App\historyPenawaran;
@endphp
@extends('adhimix.layout')
@section('title','Adhimix Penawaran Lists')
@section('content')
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-6 col-xs-12 mb-1">
			<h2 class="content-header-title">
				Data Penawaran
			</h2>
		</div>
	</div>
	<div class="content-body">
		<!-- Basic example section start -->
		<section id="basic-examples">
			<div class="row">
				<div class="col-xs-12 mt-1 mb-3">
					<h4 class="">
						Penawaran
					</h4>
					<p>
						Admin dapat melihat data Penawaran di sini.
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
												<th style="width: 25%;">Aksi</th>
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
													@if ($list->status!==null)
													<h5>Penetapan Harga Selesai</h5>
													@else
													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#detail{{ $list->id_penawaran }}" title="Detail"><i class="fa fa-search"></i></button>
													@php
													$if;
													$terakhir = responPenawaran::where('id_proyek',$list->id_penawaran)->count();
													$cek = responPenawaran::where('id_proyek',$list->id_penawaran)->where('times',$terakhir)->get();
													@endphp
													@if ($terakhir>0)
													{{-- expr --}}
													@foreach ($cek as $e)
													@php
													$if = $e->insert_by
													@endphp
													@endforeach
													@if ($if!=="Admin")
													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#terima{{ $list->id_penawaran }}" title="Tetapkan Harga"><i class="fa fa-usd"></i></button>
													@else
													<br>
													Telah Direspon
													@endif
													@else
													<button class="btn btn-outline-primary" data-toggle="modal" data-target="#terima{{ $list->id_penawaran }}" title="Tetapkan Harga"><i class="fa fa-usd"></i></button>
													@endif
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
@php
$last= responPenawaran::where('id_proyek',$list->id_penawaran)->count();
$uang_muka='';$status = '';
if ($last>0) {	
	$cek = responPenawaran::where('times',$last)->where('id_proyek',$list->id_penawaran)->get();
	$uang_muka = historyPenawaran::where('id_respon',$cek[0]->id_respon_penawaran)->first()['uang_muka'];
	$status = historyPenawaran::where('id_respon',$cek[0]->id_respon_penawaran)->first()['ppn'];
}
@endphp

<div class="modal fade text-xs-left" id="terima{{ $list->id_penawaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Tetapkan Harga</h4>
			</div>
			<form enctype="multipart/form-data" action="{{ url('tetapkan-harga/'.$list->id_penawaran) }}" method="post">
				@csrf 
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Proyek</label>
								<input type="text" value="{{ $list->nama_proyek }}" class="form-control" readonly="" name="">
							</div>			
							<div class="form-group">
								<label>Owner</label>
								<input type="text" value="{{ $list->owner }}" class="form-control" readonly="" name="">
							</div>			
							<div class="form-group">
								<label>Alamat</label>
								<textarea style="height: 130px;resize: none;" class="form-control" readonly="" >{{ $list->alamat }}</textarea>
							</div>			
							<div class="form-group">
								<label>Provinsi - Kota</label>
								<input type="text"  class="form-control" readonly="" value="{{ $list->provinsi.' - '.$list->kota }}" name="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Mulai Proyek - Akhir Proyek</label>
								<input type="text" class="form-control" readonly="" value="{{ $list->mulai_proyek.' - '.$list->akhir_proyek }}" name="">
							</div>
							<div class="form-group">
								<label>Uang Muka</label>
								<input type="number" min="1" value="{{ $uang_muka }}" placeholder="Masukan Uang Muka" max="100"  class="form-control" name="uang_muka" required="">
							</div>
							<div class="form-group">
								<label>Mulai Proyek - Akhir Proyek</label>
								<select class="form-control" name="ppn" required="">
									<option value="">Pilih Status PPN</option>
									<option @if ($status=="Include") selected @endif>Include</option>
									<option @if ($status=="Exclude") selected @endif>Exclude</option>
								</select>
							</div>
							<div class="form-group">
								<label>UPLOAD PDF</label>
								<input type="file" class="dropify" name="pdf" required="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive m-t-40" style="margin-bottom: 15px;">
									<table cellspacing="0" class="display nowrap table table-hover table-striped table-bordered " width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Mutu</th>
											<th>Slump</th>
											<th>Spec</th>
											<th>Vol (m3)</th>
											<th class="text-center">Harga</th>
										</tr>
									</thead>
									<tbody>
										@php
										$no = 0;
										@endphp
										@foreach ($data['mutulist'] as $e)
										@if ($e->id_proyek==$list->id_penawaran)
										@php
										$no++;
										@endphp
										<tr>
											<td>{{ $no }}</td>
											<td>{{ $e->nama_mutu }}</td>
											<td>{{ $e->slump }}</td>
											<td>{{ $e->spec }}</td>
											<td>{{ $e->vol }}</td>
											<td>
												<input type="number" placeholder="Masukan harga Per Volume" value="{{ $e->harga }}" name="harga{{ $no }}" required="" class="form-control">
											</td>
											<input type="hidden" name="id_mutu{{ $no }}" value="{{ $e->id_mutu_penawaran }}">
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								<input type="hidden" name="banyak" value="{{ $no }}">
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

<div class="modal fade text-xs-left" id="detail{{ $list->id_penawaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel4">Detail Penawaran</h4>
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