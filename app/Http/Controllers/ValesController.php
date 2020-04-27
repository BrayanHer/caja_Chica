<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vales;
use App\departamentos;
use App\motivos;
use Session;
class ValesController extends Controller
{
    public function Gvales(Request $request){
        $Folio=$request->folio;
        $departamento=$request->departamento;
        $motivo=$request->motivo;
        $monto=$request->monto;
        $tipo=$request->tipo;
        $fechaCom=$request->fechaComp;


        $Alvale= new vales;
        $Alvale->Folio=$Folio;
        $Alvale->ID_DEPT=$departamento;
        $Alvale->ID_MOT=$motivo;
        $Alvale->Monto=$monto;
        $Alvale->Tipo=$tipo;
        $Alvale->Fecha_Comprobar=$fechaCom;
        $Alvale->save();

    return redirect()->back();
    }
// _________________________________________________________________________________________________________________________
    public function Comprobacion(){
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

$vales=\DB::Select('SELECT v.Folio,mot.Motivo,v.Monto,dep.Nombre AS Departamento,v.Tipo,v.Fecha_Comprobar
FROM vales AS v
INNER JOIN departamentos AS dep ON v.`ID_DEPT`=dep.`ID_DEPT`
INNER JOIN motivos AS mot ON v.`ID_MOT`=mot.`ID_MOT`
	');

        return view ('Vales.comprobacion')
        ->with('departamentos',$departamentos)
        ->with('motivos',$motivos)
        ->with('IdVale',$IdVale)
        ->with('vales',$vales);
    }
// _________________________________________________________________________________________________________________________

}
