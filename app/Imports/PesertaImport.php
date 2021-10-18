<?php

namespace App\Imports;

use App\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Peserta([
            'nama_toko' => @$row[0],
            'NIK' => @$row[1],
            'Nama_Peserta' => @$row[2],
            'Alamat' => @$row[3],
            'No_Hp' => @$row[4],
            'No_Undian' => @$row[5],
            'usertype' => 2,
            'undianRolling' => 0,
        ]);
    }
}
