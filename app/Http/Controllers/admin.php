<?php

namespace App\Http\Controllers;

use App\account;
use App\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    public function dashboard()
    {
        $data['title']      = "Adhimix | Company Admin Dashboard";
        $data['dataAdmin'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        return view('admin.dashboard', compact('data'));
    }
    public function staffManagement()
    {
        $data['list'] = account::where('id_company', session('id_company'))->where('type', 'staff')->get();
        $data['dataAdmin'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name')
        ->get();
        return view('admin.staff', compact('data'));
    }

    public function companySetting()
    {
        $data['dataUser'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name','companies.no_telp as no_company','companies.email','companies.address','companies.no_rek','companies.about','companies.pict','companies.npwp')
        ->get();
        return view('admin.companySetting', compact('data'));
    }

    public function editCompany(Request $req,$id_company)
    {
        $data['dataUser'] = DB::table('accounts')->where('id_user', session('id_user'))
        ->join('companies', 'accounts.id_company', '=', 'companies.id_company')
        ->select('accounts.*', 'companies.company_name','companies.no_telp as no_company','companies.email','companies.address','companies.no_rek','companies.about','companies.pict','companies.npwp')
        ->get();
        
        if ($req->hasfile('gambar')) {
            if ($req->company_name==$data['dataUser'][0]->company_name) {
                $pict   = $req->file('gambar');
                $name   = 'profil' . time() . '.' . $pict->getClientOriginalExtension();
                $folder = public_path('admin/profil/');
                $pict->move($folder, $name);

                company::where('id_company',$id_company)->update([
                    'address'=> $req->alamat,
                    'npwp'=> $req->npwp,                 'email'=> $req->email,
                    'no_telp'=> $req->no_telp,           'no_rek'=> $req->no_rek,
                    'pict'=> $name
                ]);
            }else{
                $pict   = $req->file('gambar');
                $name   = 'profil' . time() . '.' . $pict->getClientOriginalExtension();
                $folder = public_path('admin/profil/');
                $pict->move($folder, $name);

                company::where('id_company',$id_company)->update([
                    'company_name'=> $req->company_name, 'address'=> $req->alamat,
                    'npwp'=> $req->npwp,                 'email'=> $req->email,
                    'no_telp'=> $req->no_telp,           'no_rek'=> $req->no_rek,
                    'pict'=> $name
                ]);
            }
        }else{
            if ($req->company_name==$data['dataUser'][0]->company_name) {
                company::where('id_company',$id_company)->update([
                    'address'=> $req->alamat,
                    'npwp'=> $req->npwp,                 'email'=> $req->email,
                    'no_telp'=> $req->no_telp,           'no_rek'=> $req->no_rek,
                    'pict'=> $req->gambar
                ]);
            }else{
                $this->validate($req, [
                    'company_name' => 'unique:companies'
                ],
                $messages = [
                    'unique' => 'Nama Perusahaan telah di gunakan !',
                ]);
                company::where('id_company',$id_company)->update([
                    'company_name'=> $req->company_name, 'address'=> $req->alamat,
                    'npwp'=> $req->npwp,                 'email'=> $req->email,
                    'no_telp'=> $req->no_telp,           'no_rek'=> $req->no_rek,
                    'pict'=> $req->gambar
                ]);
            }
        }
        session::flash('success', "Perusahaan ".$data['dataUser'][0]->company_name." berhasil di edit !");
        return redirect('company-setting');
    }

    public function delAccount($id)
    {
        account::where('id_user', $id)->delete();
        session::flash('success', 'Staff telah dihapus!');
        return back();
    }

    public function addStaff(Request $req)
    {
        if (account::where('username', $req->username)->count() > 0) {
            session::flash('error', 'Username telah digunakan!');
            return back();
        } else {
            account::create([
                'id_company' => session('id_company'), 'fullname' => $req->fullname,
                'username'   => $req->username, 'password'        => $req->password,
                'jabatan'    => $req->jabatan, 'no_telp'          => $req->no_telp,
                'pict'       => '-', 'type'                       => 'staff',
            ]);
            session::flash('success', 'Staff berhasil di daftarkan!');
            return back();
        }
    }
}
