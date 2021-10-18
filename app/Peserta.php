<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = "Peserta_Undian";

    protected $fillable = ['nama_toko','NIK','Nama_Peserta','Alamat','No_Hp','No_Undian','usertype','undianRolling'];

}
