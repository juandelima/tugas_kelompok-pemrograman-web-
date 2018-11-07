<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matkul';
    protected $primaryKey = 'id_matkul';
    protected $fillable = [
    	'kode_matkul','nama_matkul'
    ];
    protected $hidden = [
    	'created_at','updated_at'
    ];

    public function siswa() {
    	return $this->hasMany('App\NilaiSiswa','id_matkul','id_matkul');
    }
}
