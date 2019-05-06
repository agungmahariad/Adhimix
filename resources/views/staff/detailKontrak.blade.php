@extends('staff.layout')
@section('title','Adhimix | Detail Kontrak')
@section('content')

<main id="main">
	<div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name }} <br><small style="font-size: 20px">Detail Kontrak</small></h1>
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
													<input readonly="" value="{{ $e->mulai_proyek }}" name="proyek_mulai" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Tanggal Akhir Proyek</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" value="{{ $e->akhir_proyek }}" name="proyek_akhir" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3">
												<label>Uang Muka (%)</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" value="{{ $e->uang_muka }}" name="proyek_akhir" class="form-control" type="number"  id="date"> 
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-3">
												<label>Status PPN</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" value="{{ $e->ppn }}" name="proyek_akhir" class="form-control" type="text"  id="date"> 
												</div>
											</div>
										</div>
									</div>	
							@endforeach
								</div>
								
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
