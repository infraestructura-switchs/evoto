<?php

namespace diser\Imports;

use diser\User;
use diser\AyudaTemporales;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Auth;
use DB;

class UsersImport implements ToCollection
{
  use Importable;


  public function collection(Collection $rows)
  {
    // dd($rows);

    try {

      // DB::beginTransaction(); 
      $grupo     =  AyudaTemporales::find(1); 

             // dd($grupo->import_grupo);
      foreach ($rows as $row) 
      {
            //busca si el usuario ya existe en la BD
        $user   = User::select('email')->whereEmail($row[1])->first();

        //si no encuentra el ningun usuario procede a ingresarlo
        if ($user === null) {
          User::create([
               'id_grupo'        => $grupo->import_grupo,
               'id_entidad'      => Auth::user()->id_entidad,
               'id_role'         => '4',//rol 4 es usuario normal
               'documento'       => $row[2],          
               'name'            => $row[0],
               'apellido'        => ' ',
               'email'           => $row[1],
               // 'password'        => bcrypt(str_random(8)),
               'password'        => bcrypt('123456'),
               'estado'          => "Activo",
             ]);
        }

      }
      // DB::rollBack();

    } catch (Throwable $e) {
     return back()->with('info', 'Problema al ser importado, error 0x384.');
   }
 }
    // public function model(array $row)
    // {
    //     dd($row[0]);
    //     return new User([
    //       //posicion de los campos en excel  
    //       // 'id'              => $row[0], 
    //       'id_grupo'        => $row[0],
    //       'id_entidad'      => $row[1],
    //       'id_role'         => $row[2], 
    //       'documento'       => $row[3],          
    //       'name'            => $row[4],
    //       'apellido'        => $row[5],
    //       'email'           => $row[6],
    //       'password'        => Hash::make($row[7]),
    //       'estado'          => $row[8],
    //   ]);
    // }
}
