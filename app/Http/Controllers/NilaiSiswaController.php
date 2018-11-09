<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\NilaiSiswa;
use App\MataKuliah;
class NilaiSiswaController extends Controller
{
    public function index() {
    	$nsiswa = NilaiSiswa::all();
    	$matkuls = MataKuliah::all();
    	return view('input_nilai', get_defined_vars());
    }

    public function insert(Request $req) {
    	$data = $req->all();
    	$this->validateWith(array(
    		'npm' => 'required | max: 8',
    		'nama' => 'required',
    		'matkul' => 'required',
    		'nuts' => 'required',
    		'nuas' => 'required',
    	));
    	$uts = $data['nuts'] * (70/100);
    	$uas = $data['nuas'] * (30/100);
    	$total = $uts + $uas;

        if (NilaiSiswa::where('npm', $data['npm'])->count() > 0) {
            return redirect()->back()->with('danger','NPM '.$data['npm'].' sudah digunakan!');
        }
    	if ($total >= 80 and $total <= 100) {
    		$grade = 'A';
    	} elseif ($total >= 68 and $total <= 79) {
    		$grade = 'B';
    	} elseif ($total >= 56 and $total <= 67) {
    		$grade = 'C';
    	} elseif ($total >= 45 and $total <= 55) {
    		$grade = 'D';
    	} elseif ($total >= 0  and $total <= 44) {
    		$grade = 'E';
    	} else {
            $grade = 'P';
        }
     	NilaiSiswa::create([
    		'npm' => $data['npm'],
    		'nama' => $data['nama'],
    		'id_matkul' => $data['matkul'],
    		'nilai_uts' => $data['nuts'],
    		'nilai_uas' => $data['nuas'],
    		'grade' => $grade,
    	]);

    	return redirect()->route('value')->with('notif','Data nilai berhasil diinput!');
    }

    public function edit($id) {
        $matkuls = MataKuliah::all();
        $siswa = NilaiSiswa::find($id);
        return view('edit_nilai', get_defined_vars());
    }

    public function update(Request $req, $id) {
        $data = $req->all();
        $this->validateWith(array(
            'npm' => 'required | max: 8',
            'nama' => 'required',
            'matkul' => 'required',
            'nuts' => 'required',
            'nuas' => 'required',
        ));

        $uts = $data['nuts'] * (70/100);
        $uas = $data['nuas'] * (30/100);
        $total = $uts + $uas;

        if ($total >= 80 and $total <= 100) {
            $grade = 'A';
        } elseif ($total >= 68 and $total <= 79) {
            $grade = 'B';
        } elseif ($total >= 56 and $total <= 67) {
            $grade = 'C';
        } elseif ($total >= 45 and $total <= 55) {
            $grade = 'D';
        } elseif ($total >= 0  and $total <= 44) {
            $grade = 'E';
        } else {
            $grade = 'P';
        }
        $npm = $data['npm'];
        $search_npm = NilaiSiswa::find($id)->npm;
        if ($npm == $search_npm) {
            NilaiSiswa::find($id)->update([
                'nama' => $data['nama'],
                'id_matkul' => $data['matkul'],
                'nilai_uts' => $data['nuts'],
                'nilai_uas' => $data['nuas'],
                'grade' => $grade,
            ]);
        } else {
            if (NilaiSiswa::where('npm', $npm)->count() > 0) {
                return redirect()->route('edit_value', NilaiSiswa::find($id)->id_mahasiswa)->with('danger','Npm '.$npm.' sudah ada!');
            }
            NilaiSiswa::find($id)->update([
                'npm' => $data['npm'],
                'nama' => $data['nama'],
                'id_matkul' => $data['matkul'],
                'nilai_uts' => $data['nuts'],
                'nilai_uas' => $data['nuas'],
                'grade' => $grade,
            ]);
        }

        return redirect()->route('value')->with('notif','Data nilai berhasil diubah!'); 
    }
    
    public function delete($id) {
        NilaiSiswa::find($id)->delete();
        return redirect()->route('value')->with('notif','Data berhasil dihapus!');
    }
}
