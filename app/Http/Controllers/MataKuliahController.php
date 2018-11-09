<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MataKuliah;
class MataKuliahController extends Controller
{
    public function index() {
    	$matkuls = MataKuliah::all();
    	return view('input_matkul')->withMatkuls($matkuls);
    }

    public function insert(Request $req) {
    	$data = $req->all();

    	$this->validateWith(array(
    		'kd_mk' => 'required',
    		'mk' => 'required',
    	));

        if (MataKuliah::where('kode_matkul', $data['kd_mk'])->count() > 0) {
            return redirect()->back()->with('danger','Kode matakuliah '.$data['kd_mk'].' sudah digunakan!');  
        } 
        
    	MataKuliah::create([
    		'kode_matkul' => $data['kd_mk'],
    		'nama_matkul' => $data['mk']
    	]);

    	return redirect()->route('matkul')->with('notif','Data berhasil disimpan!');
    }

    public function edit($id) {
        $matkuls = MataKuliah::find($id);
        return view('edit_matkul')->withMatkuls($matkuls);
    }

    public function update(Request $req, $id) {
        $data = $req->all();

        $this->validateWith(array(
            'mk' => 'required',
            'kd_mk' => 'required',
        ));
        
        $kd_mk = $data['kd_mk'];
        $search_kd = MataKuliah::find($id)->kode_matkul;
        if ($kd_mk != $search_kd) {
            if (MataKuliah::where('kode_matkul', $kd_mk)->count() > 0) {
                return redirect()->route('edit_mk', MataKuliah::find($id)->id_matkul)->with('danger','Kode '.$kd_mk.' sudah ada!');
            } 
            MataKuliah::find($id)->update([
                'kode_matkul' => $kd_mk,
                'nama_matkul' => $data['mk'],
            ]);
        } else {
            MataKuliah::find($id)->update([
                'nama_matkul' => $data['mk'],
            ]);
        }

        return redirect()->route('matkul')->with('notif','Update data berhasil!');
    }

    public function delete($id) {
        $mk = MataKuliah::find($id);
        if ($mk->siswa->count() > 0) {
            return redirect()->back()->with('danger','MataKuliah '.$mk->nama_matkul.' tidak bisa dihapus karena berhubungan dengan data lain!');
        }
        $mk->delete();
        return redirect()->route('matkul')->with('notif', 'MataKuliah '.$mk->nama_matkul.' berhasil dihapus!');
    }
}
