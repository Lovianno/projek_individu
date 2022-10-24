<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'foto',
        'about'
    ];

    public function kontak(){
        return $this->belongsToMany('App\Models\jenis_kontak')->withPivot('id','deskripsi');
    }
    public function project(){
        return $this->hasMany('App\Models\projek', 'id_siswa');
    }

}
