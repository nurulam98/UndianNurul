<?php

namespace App\Http\Controllers;

use App\Hadiah;
use App\Peserta;
use App\PesertaHadiah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemenangController extends Controller
{

    public function index(){
        return view('welcome');
    }

    public function generatePemenang(Request $request)
    {
        $nameToko = "";
        if ($request['inputToko'] = "1"){
            $nameToko = "Yogya";
        }elseif ($request['inputToko'] = "2"){
            $nameToko = "Borma";
        }
        $hadiah = Hadiah::where('id','=',$request['inputHadiah'])->first();
        $isAvailableQuantity = $hadiah->quantity - $hadiah->inUsed;
        $limit = $request['inputQuantity'];
        if ($limit > $isAvailableQuantity){
            $limit = $isAvailableQuantity;
        }
        $toko = Peserta::select('id','No_Undian','Nama_Peserta','No_Hp','nama_toko')->where('nama_toko', 'LIKE','%'.$nameToko.'%')->where('usertype','=',2)->where('undianRolling','=',0)->inRandomOrder()->limit($limit)->get();
        foreach($toko as $t){
            Peserta::where('id',$t->id)->update(['undianRolling' => 1]);
            PesertaHadiah::create([
                'FK_Hadiah' => $hadiah->id,
                'FK_Peserta' => $t->id
            ]);
        }
        $inUsed = $limit + $hadiah->inUsed;
        Hadiah::where('id', $hadiah->id)->update(['inUsed' => $inUsed]);
        return response()->json(['toko' => $toko,'hadiah' => $hadiah->nama_hadiah]);
    }

    public function ResetAll()
    {
        $text = "cuyyy";
        PesertaHadiah::truncate();
        Peserta::where('id','>',0)->update(['undianRolling' => 0]);
        Hadiah::where('id', '>',0)->update(['inUsed' => 0]);
        return redirect(route('Index'));
    }
}
