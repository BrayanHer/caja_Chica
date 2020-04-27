<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\usuarios;

class loginController extends Controller
{
    public function login(){
        return view ('login');
    }
 
    public function iniciasesion(Request $request){

        $usuario  = $request->Nomina;
        $pass    = $request->contraseña;

        $consulta = usuarios::withTrashed()->where('Nomina','=',$usuario)
                        ->where ('Password','=',$pass)
                            ->get();

             if(count($consulta)==0){
            Session::flash('error', 'El usuario no existe o la contraseña no es correcta');
                     return redirect()->route('login');
            }
           else{
              $desactivado = $consulta[0]->deleted_at;
                   if ($desactivado!=""){
                    Session::flash('error', 'El usuario esta deshabilitado pase con su administrador');
                             return redirect()->route('login');
                   }
                   else{
                  Session::put('sesionname',$consulta[0]->Nombre);
                        Session::put('sesionidu',$consulta[0]->Nomina);
                        Session::put('sesiontipo',$consulta[0]->Tipo);
                        Session::put('sesionuser',$consulta[0]->usuario);
      
                        $sname = Session::get('sesionname');
                        $sidu = Session::get('sesionidu');
                        $stipo = Session::get('sesiontipo');
                        $suser=Session::get('sesionuser');
            
                        return redirect()->route('Index');
                   }
           }   
     }
     
   public function principal(){
      if( Session::get('sesionidu')!="")
           return view ('administrador');
      else{
                Session::flash('error', 'Favor de loguearse antes de continuar');
                     return redirect()->route('login');
           }
         }
         
   public function cerrarsesion(){
        Session::forget('sesionname');
        Session::forget('sesionidu');
        Session::forget('sesiontipo');
        Session::flush();
        Session::flash('error', 'Sesión Cerrada Correctamente');
        return redirect()->route('login');
   }
}
