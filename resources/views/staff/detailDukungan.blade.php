@extends('staff.layout')
@section('title','Adhimix | Detail Permintaan Dukungan')
@section('content')


<main id="main">
	<div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12">
				@foreach ($data['dukungan'] as $e)
					<a href="{{ url('open-pdf/'.$e->idres) }}" target="_blank" class="btn btn-primary pull-right">Download PDF</a>
				@endforeach
				<h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name }} <br><small style="font-size: 20px">Permintaan Dukungan</small></h1>
				<div class="row">
					<div class="col-lg-12">
						<div class="box wow" style="background-color: #6ea8af14">
							@foreach ($data['dukungan'] as $e)
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="col-lg-3">
												<label>Nama Proyek</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" type="text" placeholder="Nama Proyek" value="{{ $e->nama_proyek }}" name="nama_proyek" class="form-control" >
													<span class="bar"></span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Alamat</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" type="text" placeholder="Masukan alamat" value="{{ $e->alamat }}" name="alamat" class="form-control" >
													<span class="bar"></span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Provinsi</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" type="text" name="provinsi" value="{{ $e->provinsi }}" class="form-control">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Kota</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" type="text" name="kota" value="{{ $e->kota }}" class="form-control">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-6">

										<div class="row">
											<div class="col-lg-3">
												<label>Nama Owner</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" type="text" value="{{ $e->owner }}" name="nama_owner" class="form-control" >
													<span class="bar"></span>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-lg-3">
												<label>Tanggal Mulai Proyek</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" value="{{ $e->proyek_mulai }}" name="proyek_mulai" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Tanggal Akhir Proyek</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" value="{{ $e->proyek_akhir }}" name="proyek_akhir" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
												</div>
											</div>
										</div>
									</div>	
							@endforeach
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<div class="table-responsive">
											<br>
											<br>
											<table class="table table-striped table-bordered table-hover" id="tableMutu">
												<thead>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Mutu</th>
														<th class="text-center">Volume(m3)</th>
													</tr>
												</thead>
												<tbody id="tab">
													@php
														$no=0;
													@endphp
													@foreach ($data['mutulist'] as $e)
													@php
														$no++
													@endphp
													<tr id="row1" class="tr">
														<td class="text-center">{{ $no }}</td>
														<td>
															<input readonly="" class="form-control" value="{{ $e->nama_mutu }}" placeholder="Enter Here" name="volume1">
														</td>
														<td>
															<input readonly="" class="form-control" value="{{ $e->vol }}" placeholder="Enter Here" name="volume1">
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div><br>
								<a href="{{ url('permintaan-dukungan') }}" class="btn btn-primary pull-right" value="Save">Kembali</a><br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection()
