<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Hash;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //1. Leer el archivo de datos
    $json=File::get('database/_data/bootcamps.json');
    //2. convertir los datos en un arreglo
    $arreglo_bootcamps = json_decode( $json );
    //3. recorrer el arreglo
    foreach($arreglo_bootcamps as $bootcamps){
        //4. Registrar el usuario en bd
        // se utiliza el método ::create
        Bootcamp::create([
            "name"  => $bootcamps->name,
            "description"  => $bootcamps->description,
            "website"  => $bootcamps->website,
            "phone"  => $bootcamps->phone,
            "user_id"  => $bootcamps->user_id,
        ]);
    }
    }
}
