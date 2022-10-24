<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kontak extends Model
{
    use HasFactory;
    protected $table = 'jenis_kontak';
    protected $fillable = [
        'jenis_kontak'
    ];

    
    public function siswa(){
        return $this->belongsToMany('app\models\siswa', 'id');
    }
}
