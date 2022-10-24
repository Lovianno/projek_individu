<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $table = 'jenis_kontak_siswa';
    protected $fillable = [
        'siswa_id',
        'jenis_kontak_id',
        'deskripsi'
    ];

    public function siswa(){
        return $this->belongsTo('app\models\siswa', 'siswa_id');
    }
    public function jenis_kontak(){
        return $this->belongsTo('app\models\jenis_kontak', 'jenis_kontak_id');
    }
}
