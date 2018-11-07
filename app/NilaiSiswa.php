<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    protected $table = 'nilai_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = [
    	'npm','nama','id_matkul','nilai_uts','nilai_uas','grade'
    ];

    protected $hidden = [
    	'created_at','updated_at'
    ];
    
    public function mata_kuliah() {
    	return $this->belongsTo('App\MataKuliah','id_matkul');
    }
}
