<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compromiso;

class CompromisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $compromisos = array(
        array('id' => '1','titulo' => 'Artículos JCR sometidos','pes_id' => '2'),
        array('id' => '2','titulo' => 'Artículos JCR Aceptados o Publicados','pes_id' => '5'),
        array('id' => '3','titulo' => 'Modelo de utilidad o patente','pes_id' => NULL),
        array('id' => '4','titulo' => 'Conferencias Nacionales','pes_id' => '2'),
        array('id' => '5','titulo' => 'Conferencias Internacionales.','pes_id' => '5'),
        array('id' => '9','titulo' => 'Compromiso 2p','pes_id' => '6'),
        array('id' => '10','titulo' => 'Compromiso 1p','pes_id' => '6')
      );
      
      foreach ($compromisos  as $compromiso ) {
        $Compromiso = Compromiso::create($compromiso);
      }
  }
}
