<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaHadiah extends Model
{
    protected $table = "Peserta_Hadiah";

    protected $fillable = ['FK_Hadiah','FK_Peserta'];
}
