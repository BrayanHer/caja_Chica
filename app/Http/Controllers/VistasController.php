<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departamentos;
use App\vales;
use App\motivos;
use Session;

class VistasController extends Controller
{
 // _________________________________________________________________________________________________________________________

    public function principal(){
        $folio = vales::withTrashed()->orderBy('ID_VAL', 'desc')
    ->take(1)
        ->get();


    if(count($folio)==0){
        $IdVale = 1;
       
}

else{
    $IdVale = $folio[0]->ID_VAL + 1;
}
$motivos=motivos::withTrashed()->orderBy('ID_MOT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
->get();

$departamentos=departamentos::withTrashed()->orderBy('ID_DEPT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
->get();
        return view('index')
        ->with('departamentos',$departamentos)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale);
    }
// _________________________________________________________________________________________________________________________


// _________________________________________________________________________________________________________________________

    public function Index(){
        $folio = vales::withTrashed()->orderBy('ID_VAL', 'desc')
        ->take(1)
            ->get();
    
    
        if(count($folio)==0){
            $IdVale = 1;
           
    }
    
    else{
        $IdVale = $folio[0]->ID_VAL + 1;
    }
    $motivos=motivos::withTrashed()->orderBy('ID_MOT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
->get();
        $departamentos=departamentos::withTrashed()->orderBy('ID_DEPT', 'asc') //withTrashed -> todos ->eliminados (lógico) o no
        ->get();

        return view('App')
        ->with('departamentos',$departamentos)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale);
    }
// _________________________________________________________________________________________________________________________

}
