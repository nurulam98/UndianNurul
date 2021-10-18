<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HadiahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hadiah')->insert([['id' => 1, 'nama_hadiah' => 'Motor Honda Beat', 'quantity'=>1,'inUsed'=> 0,'created_at'=>now(),'updated_at'=>now()],['id' => 2, 'nama_hadiah' => 'Air Cooler Sharp', 'quantity'=>2,'inUsed'=> 0,'created_at'=>now(),'updated_at'=>now()],['id' => 3, 'nama_hadiah' => 'TV Samsung 43"', 'quantity'=>2,'inUsed'=> 0,'created_at'=>now(),'updated_at'=>now()],['id' => 4, 'nama_hadiah' => 'Kompor Rinnai', 'quantity'=>10,'inUsed'=> 0,'created_at'=>now(),'updated_at'=>now()],['id' => 5, 'nama_hadiah' => 'Blender Philips', 'quantity'=>10,'inUsed'=> 0,'created_at'=>now(),'updated_at'=>now()],['id' => 6, 'nama_hadiah' => 'Travel Bag Confidence', 'quantity'=>75,'inUsed'=> 0,'created_at'=>now(),'updated_at'=>now()]]);
    }
}
