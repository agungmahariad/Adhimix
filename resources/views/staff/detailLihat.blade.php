@php
	use App\responpenawaran;
	use App\historyPenawaran;
@endphp
@extends('staff.layout')
@section('title','Adhimix | Detail Permintaan Penawaran')
@section('content')


<main id="main">
	<div class="container" style="margin-top: 100px">
		<div class="row">
			<div class="col-lg-12">
				@foreach ($data['responPenawaran'] as $row)
					<a href="{{ url('open-pdf-penawaran/'.$row->id_respon_penawaran) }}" target="_blank" class="btn btn-primary pull-right">Download</a>
				@endforeach
				<h1 class="header1" style="margin-top: -40px; margin-bottom: 20px;color: #ad1948">{{ $data['companyName'][0]->company_name }} <br>
					<small style="font-size: 20px">
						@foreach (responpenawaran::where('id_respon_penawaran',Request::segment(2))->get() as $element)
							{{ $element->tgl_respon }}({{ $element->insert_by }})
						@endforeach
					</small>
				</h1>
				<div class="row">
					<div class="col-lg-12">
						<div class="box wow" style="background-color: #6ea8af14">
								@foreach ($data['responPenawaran'] as $row)			
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="col-lg-3">
												<label>Nama Proyek</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" type="text" placeholder="Nama Proyek" value="{{$data['penawaran'][0]->nama_proyek}}" name="nama_proyek" class="form-control" >
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
													<input readonly="" type="text" placeholder="Masukan alamat" value="{{$data['penawaran'][0]->alamat}}" name="alamat" class="form-control" >
													<span class="bar"></span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Uang Muka (%)</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input type="text" readonly="" class="form-control" value="{{ historyPenawaran::where('id_respon',$row->id_respon_penawaran)->first()['uang_muka'] }}" name="">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Status PPN</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" type="text" value="{{ historyPenawaran::where('id_respon',$row->id_respon_penawaran)->first()['ppn'] }}" name="" value="Exclude" class="form-control">
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
													<input readonly="" type="text" value="{{$data['penawaran'][0]->owner}}" name="nama_owner" class="form-control" >
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
													<input readonly="" value="{{$data['penawaran'][0]->mulai_proyek}}" name="proyek_mulai" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-3">
												<label>Tanggal Akhir Proyek</label>
											</div>
											<div class="col-lg-9">
												<div class="form-group m-b-40 focused">
													<input readonly="" value="{{$data['penawaran'][0]->akhir_proyek}}" name="proyek_akhir" class="form-control" type="text" onfocus="(this.type='date')"  id="date"> 
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
														<th style="width: 10px">No</th>
										                  <th>Mutu</th>
										                  <th>Slump</th>
										                  <th>Spec</th>
										                  <th>Volume</th>
										                  <th>Harga</th>
													</tr>
												</thead>
												<tbody id="tab">
													@php
									                $harga = 0;
									                @endphp
									                @foreach ($data['mutudetail'] as $x)
									                @php
									                $harga = $x->vol * $x->harga;
									                @endphp
									                <tr>
									                  <td>{{ $loop->index + 1 }}</td>
									                  <td>{{ $x->nama_mutu }}</td>
									                  <td>{{ $x->slump }}</td>
									                  <td>{{ $x->spec }}</td>
									                  <td>{{ $x->vol }}</td>
									                  <td>{{ $harga }}</td>
									                </tr>
									                @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div><br>
								<a href="{{ url('permintaan-penawaran') }}" class="btn btn-primary pull-right" value="Save">Kembali</a><br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection()
