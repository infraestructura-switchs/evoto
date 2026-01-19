<?php

namespace diser\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;


// use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class SufragantesExport implements FromCollection,ShouldAutoSize
{
    use Exportable;
 
    protected $users;
 
    public function __construct($users = "**")
    {
        $this->users = $users;
    }
 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return $this->users;
    	// dd($this->sufragantes_mesa);
    //     return $this->sufragantes_mesa ?: DB::table('sufragantes as su')
    // //->leftJoin('sufragantes as// su', 'us.id', '=', 'su.users_id')            
    // ->select('su.puesto_votacion','su.mesa', DB::raw('COUNT(su.documento) as votos'))
    // // ->where([['su.puesto_votacion','LIKE','%'.$searchText.'%']]) 
    // ->groupby('su.puesto_votacion','su.mesa')
    // ->orderby('su.puesto_votacion','DESC')
    //     //->where('su.users_id',$id)
    // ->get();
    }
}
