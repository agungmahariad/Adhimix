@extends('staff.layout')
@section('title','Adhimix | Permintaan Dukungan')
@section('content')


<main id="main">
	<div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name }} <br><small style="font-size: 20px">Permintaan Dukungan</small></h1>
				<div class="row">
					<div class="col-lg-12">
						<div class="box wow" style="background-color: #6ea8af14">
							<form class="floating-labels" method="post" action="{{ url('tambah-dukungan') }}">
								@csrf
								<div class="row">
									<div class="col-lg-6">

										<div class="row">
											<div class="col-lg-3">
												<label>Nama Proyek</label>
											</div>
											<div class="col-lg-9">
												<label>Nama Proyek</label>
												<div class="form-group m-b-40 focused">
													<input type="text" placeholder="Nama Proyek" required="" name="nama_proyek" class="form-control" >
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
													<input type="text" placeholder="Masukan alamat" required="" name="alamat" class="form-control" >
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
													<select class="form-control" required="" name="provinsi">
														<option>Provinsi</option>
														<option>Banten</option>
														<option>Jakarta</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Kota</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<select class="form-control" required="" name="kota">
														<option>Kota</option>
														<option>Tangerang kota</option>
														<option>Jakarta Barat</option>
													</select>
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
													<input type="text" placeholder="masukan nama Owner" required="" name="nama_owner" class="form-control" >
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
													<input placeholder="Tanggal Mulai Proyek" required="" name="proyek_mulai" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Tanggal Akhir Proyek</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input placeholder="Tanggal Akhir Proyek" required="" name="proyek_akhir" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
												</div>
											</div>
										</div>

									</div>


									
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<div class="table-responsive">
											<hr>
											<button type="button" class="btn btn-primary" onclick="addMutu()"><span class="glyphicon google-plus"></span>Tambah Mutu</button>
											<br>
											<br>
											<table class="table table-striped table-bordered table-hover" id="tableMutu">
												<thead>
													<tr>
														<th>Mutu</th>
														<th>Volume(m3)</th>
														<th style="width: 60px;">Action</th>
													</tr>
												</thead>
												<tbody id="tab">
													<tr id="row1" class="tr">
														<td>
															<div class="form-group m-b-40 focused">
																<select class="form-control" required="" name="mutu1">
																	<option value="">Pilih Mutu</option>
																	@foreach ($data['listMutu'] as $mutu)
																	<option value="{{ $mutu->id_mutu }}">{{ $mutu->nama_mutu }}</option>
																	@endforeach
																</select>
															</div>
														</td>
														<td>
															<input type="input" class="form-control" required="" placeholder="Enter Here" name="volume1">
														</td>
														<td>
															<button type="button" onclick="delMutu('1')" disabled="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div><br>
								<input type="number" class="hide" name="banyak" value="1" id="banyak" >
								<input type="submit" class="btn btn-primary" value="Save">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script>
	function addMutu() {
		var row = parseInt($("#banyak").val()) + 1;
		$.ajax({
			type: "GET",
			url: "{{ url('api/get-row/') }}/"+row,
			success: function (data) {
				if(data !==null){
					$("#tab").append(data);
				}
			}
		}); 
		$("#banyak").val(row.toString());
	}
	function delMutu(id)
	{
		$("#row"+id).remove();
	}
</script>
@endsection()