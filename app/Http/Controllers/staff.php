<?php

namespace App\Http\Controllers;

use App\dukungan;
use App\penawaran;
use App\mutu;
use App\kontrak;
use App\mutudukungan;
use App\mutupenawaran;
use App\responDukungan;
use App\responPenawaran;
use App\historyPenawaran;
use App\produksi;
use App\pengiriman;
use App\piutang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class staff extends Controller
{
    public function dashboard()
    {
        $data['companyName']   = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        return view('staff.dashboard', compact('data'));
    }

    public function permintaanDukungan()
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $data['dukungan'] = DB::table('dukungans')->where('id_company', $data['companyName'][0]->id_company)
        ->leftJoin('respon_dukungans', 'dukungans.id_dukungan', '=', 'respon_dukungans.id_proyek')
        ->select('dukungans.*', 'respon_dukungans.responDesc', 'respon_dukungans.pdf', 'respon_dukungans.created_at as respon','respon_dukungans.status','respon_dukungans.id_respon_dukungan as idres' )
        ->get();
        $data['mutulist'] = DB::table('mutudukungans')
        ->join('mutus', 'mutudukungans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutudukungans.*', 'mutus.nama_mutu')
        ->get();
        return view('staff.dukungan', compact('data'));
    }

    public function dukunganBaru()
    {
        $data['listMutu']    = mutu::all();
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        return view('staff.dukunganbaru', compact('data'));
    }

    public function detailDukungan($id)
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $data['dukungan'] = DB::table('dukungans')->where('id_company', $data['companyName'][0]->id_company)
        ->where('id_dukungan',$id)
        ->leftJoin('respon_dukungans', 'dukungans.id_dukungan', '=', 'respon_dukungans.id_proyek')
        ->select('dukungans.*', 'respon_dukungans.responDesc', 'respon_dukungans.pdf', 'respon_dukungans.created_at as respon','respon_dukungans.status','respon_dukungans.id_respon_dukungan as idres' )
        ->get();
        $data['mutulist'] = DB::table('mutudukungans')->where('id_proyek', $id)
        ->join('mutus', 'mutudukungans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutudukungans.*', 'mutus.nama_mutu')
        ->get();
        return view('staff.detailDukungan', compact('data'));
    }

    public function openPdf($id)
    {
        $pdf = responDukungan::where('id_respon_dukungan',$id)->get();
        return view('staff.pdf',compact('pdf'));
    }

    public function getRow($id)
    {
        $html = "<tr id='row" . $id . "' class='tr'><td><div class='form-group m-b-40 focused'><select class='form-control' required='' name='mutu" . $id . "'><option value=''>Pilih Mutu</option>";
        foreach (mutu::all() as $key) {
            $html .= "<option value='" . $key->id_mutu . "'>" . $key->nama_mutu . "</option>";
        }
        $html .= "</select></div></td><td><input type='number' class='form-control' required='' placeholder='Enter Here' name='volume" . $id . "'></td><td><button type='button' onclick='delMutu(" . $id . ")' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>";
        echo $html;
    }
    public function saveDukungan(Request $request)
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        dukungan::insert([
            'id_company'   => $data['companyName'][0]->id_company,
            'nama_proyek'  => $request->nama_proyek, 'provinsi'      => $request->provinsi,
            'kota'         => $request->kota, 'owner'                => $request->nama_owner,
            'proyek_mulai' => $request->proyek_mulai, 'proyek_akhir' => $request->proyek_akhir,
            'alamat'       => $request->alamat,
        ]);

        $id_proyek = dukungan::max('id_dukungan');
        for ($i = 1; $i <= 100; $i++) {
            if (isset($_POST['mutu' . $i])) {
                mutudukungan::insert([
                    'id_proyek' => $id_proyek, 'id_mutu' => $_POST['mutu' . $i],
                    'vol'       => $_POST['volume' . $i],
                ]);
            }
        }
        session::flash('success', 'Permintaan dukungan telah dibuat!');
        return redirect('permintaan-dukungan');
    }

    public function permintaanPenawaran()
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $data['penawaran'] = penawaran::where('id_company', $data['companyName'][0]->id_company)->get();
        $data['mutulist'] = DB::table('mutupenawarans')
        ->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutupenawarans.*', 'mutus.nama_mutu')
        ->get();
        return view('staff.penawaran', compact('data'));
    }

    public function penawaranBaru($value = '')
    {
        $data['listMutu']    = mutu::all();
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        return view('staff.penawaranbaru', compact('data'));
    }

    public function getRowPenawaran($id)
    {
        $html = "<tr id='row" . $id . "' class='tr'><td><div class='form-group m-b-40 focused'><select class='form-control' required='' name='mutu" . $id . "'><option value=''>Pilih Mutu</option>";
        foreach (mutu::all() as $key) {
            $html .= "<option value='" . $key->id_mutu . "'>" . $key->nama_mutu . "</option>";
        }
        $html .= "</select></div></td><td><input type='input' class='form-control' required='' name='slump".$id."' placeholder='Enter Here'></td>
        <td><input type='input' class='form-control' required='' name='spec" . $id . "' placeholder='Enter Here'></td>
        <td><input type='input' class='form-control' required='' name='vol" . $id . "' placeholder='Enter Here'></td>
        <td>
        <button class='btn btn-danger' type='button' onclick='del(" . $id . ")'><span class='glyphicon glyphicon-trash'></span> Delete</button>
        </td></tr>";
        echo $html;
    }

    public function savePenawaran(Request $request)
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        penawaran::insert([
            'id_company'   => $data['companyName'][0]->id_company,
            'nama_proyek'  => $request->nama_proyek, 'provinsi'      => $request->provinsi,
            'kota'         => $request->kota, 'owner'                => $request->owner,
            'mulai_proyek' => $request->mulai_proyek, 'akhir_proyek' => $request->akhir_proyek,
            'alamat'       => $request->alamat,
        ]);
        $id_proyek = penawaran::max('id_penawaran');
        for ($i = 1; $i <= 100; $i++) {
            if (isset($_POST['mutu' . $i])) {
                mutupenawaran::insert([
                    'id_proyek' => $id_proyek, 'id_mutu' 			  => $_POST['mutu'.$i],
                    'vol'       => $_POST['vol'.$i], 'slump'	  => $_POST['slump'.$i],
                    'spec'		=> $_POST['spec'.$i],'harga'	=>''
                ]);
            }
        }
        session::flash('success', 'Permintaan dukungan telah dibuat!');
        return redirect('permintaan-penawaran');
    }
    public function openPdfPenawaran($id)
    {
        $pdf = responPenawaran::where('id_respon_penawaran',$id)->get();
        return view('staff.pdf',compact('pdf'));
    }
    public function lihatPenawaran($id)
    {

        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $data['penawaran'] = penawaran::where('id_penawaran', $id)->get();
        $data['dukungan'] = DB::table('penawarans')->where('id_company', $data['companyName'][0]->id_company)
        ->leftJoin('respon_penawarans', 'penawarans.id_penawaran', '=', 'respon_penawarans.id_proyek')
        ->select('penawarans.*', 'respon_penawarans.pdf', 'respon_penawarans.created_at as respon','respon_penawarans.id_respon_penawaran as idres' )
        ->get();
        $data['mutulist'] = DB::table('mutupenawarans')
        ->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutupenawarans.*', 'mutus.nama_mutu')
        ->get();
        return view('staff.lihat',compact('data'));	
    }

    public function detailLihatPenawaran($id)
    {

        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $respon = responpenawaran::where('id_respon_penawaran',$id)->get();
        $data['penawaran'] = penawaran::where('id_penawaran', $respon[0]->id_proyek)->get();
        $data['dukungan'] = DB::table('penawarans')->where('id_company', $data['companyName'][0]->id_company)
        ->leftJoin('respon_penawarans', 'penawarans.id_penawaran', '=', 'respon_penawarans.id_proyek')
        ->select('penawarans.*', 'respon_penawarans.pdf', 'respon_penawarans.created_at as respon','respon_penawarans.id_respon_penawaran as idres' )
        ->get();
        $data['responPenawaran'] = responpenawaran::where('id_respon_penawaran', $id)->get();
        $data['mutulist'] = DB::table('mutupenawarans')->where('id_proyek', $id)
        ->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutupenawarans.*', 'mutus.nama_mutu')
        ->get();
        $data['mutudetail'] = historypenawaran::where('id_respon', $id)
        ->join('mutus','mutus.id_mutu','=','history_penawarans.mutu')
        ->select('history_penawarans.*','mutus.nama_mutu')
        ->get();
        return view('staff.detailLihat',compact('data')); 
    }

    public function nego($id)
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $data['mutulist'] = DB::table('mutupenawarans')->where('id_proyek',$id)
        ->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutupenawarans.*', 'mutus.nama_mutu')
        ->get();
        $data['penawaran']   = penawaran::where('id_penawaran',$id)->get();
        return view('staff.nego',compact('data'));  
    }

    public function doNego(Request $req,$id)
    {
        $times = responpenawaran::where('id_proyek',$id)->max('times') + 1;
        responpenawaran::create([
            'id_proyek'     => $id,                 'times' =>$times,
            'tgl_respon'    => date('Y-m-d H:i:s'), 'pdf'   =>'-',
            'insert_by'=>'Vendor'
        ]);
        penawaran::where('id_penawaran',$id)->update([
            'uang_muka' =>$req->uang_muka,
            'ppn'       => $req->ppn,
        ]);
        for ($i=1; $i <=100 ; $i++) { 
            if (isset($_POST['harga'.$i])) {
                mutupenawaran::where('id_mutu_penawaran',$_POST['id_mutu'.$i])->update([
                    'harga'     => $_POST['harga'.$i],
                    'vol'     => $_POST['vol'.$i],
                ]);
                $mutu = DB::table('mutupenawarans')->where('id_mutu_penawaran',$_POST['id_mutu'.$i])
                ->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
                ->select('mutupenawarans.*', 'mutus.nama_mutu')
                ->get();

                historyPenawaran::create([
                    'id_respon' =>responpenawaran::max('id_respon_penawaran'),
                    'mutu'      => $mutu[0]->id_mutu,
                    'slump'     => $mutu[0]->slump,
                    'spec'      => $mutu[0]->spec,
                    'vol'       => $mutu[0]->vol,
                    'harga'     => $mutu[0]->harga,
                    'ppn'       => $req->ppn,
                    'uang_muka' => $req->uang_muka
                ]);
            }
        }
        session::flash('success','Nego berhasil di kirim');
        return redirect('lihat-penawaran/'.$id);
    }
    public function setuju($id)
    {
        penawaran::where('id_penawaran',$id)->update([
            'status'    => 'done'
        ]);
        session::flash('success','Harga telah mencapai kesepakatan!');
        return redirect('permintaan-penawaran');
    }

    public function kontrak()
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_company'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();     
        $data['list'] = penawaran::where('status','done')->where('id_company',$data['companyName'][0]->id_company)->get();
        $data['mutulist'] = DB::table('mutupenawarans')
        ->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutupenawarans.*', 'mutus.nama_mutu')
        ->get();
        $data['kontrak']    = kontrak::all();
        return view('staff.kontrak',compact('data'));
    }

    public function detailKontrak($id)
    {
        $data['companyName'] = DB::table('accounts')->where('id_user', session('id_company'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();     
        $data['dukungan'] = penawaran::where('status','done')->where('id_company',$data['companyName'][0]->id_company)
        ->where('id_penawaran', $id)
        ->get();
        $data['mutulist'] = DB::table('mutupenawarans')
        ->join('mutus', 'mutupenawarans.id_mutu', '=', 'mutus.id_mutu')
        ->select('mutupenawarans.*', 'mutus.nama_mutu')
        ->get();
        $data['kontrak']    = kontrak::all();
        return view('staff.detailKontrak',compact('data'));
    }

    public function pdfKontrak($id)
    {
        $pdf = kontrak::where('id_proyek',$id)->get();
        return view('staff.pdfKontrak',compact('pdf'));
    }
    // public function produksi()
    // {
    //     $data['produksi'] = produksi::all();
    //     $data['pengiriman'] = pengiriman::all();
    //     return view('staff.daftarProduk', compact('data'));
    // }

    public function produksi()
    {
        $data['companyName']   = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $data['produksi'] = produksi::all();
        $data['pengiriman'] = pengiriman::all();
        return view('staff.daftarProduk', compact('data'));
    }

    public function piutang()
    {
        $data['companyName']   = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        $data['piutang'] = piutang::all();
        return view('staff.daftarPiutang', compact('data'));
    }


    // public function piutang()
    // {
    //     $data['piutang'] = piutang::all();
    //     return view('staff.daftarPiutang', compact('data'));
    // }

}
