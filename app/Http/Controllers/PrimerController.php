<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerController extends Controller
{
    private $mensajes = [
            'mensaje1'=> 'El usuario pepe no es válido F',
            'mensaje2'=> 'Otra cosaca.',
    ];
    
    public function ruta10(){
        $frutas = [
                  ['nombre'=>'melocoton','precio'=>1.34], 
                  ['nombre'=>'kiwi','precio'=>2.24],
                  ['nombre'=>'papaya','precio'=>4.34]  ,
                  ['nombre'=>'aguacate','precio'=>0.34],
                  ['nombre'=>'maracuya','precio'=>5.34],
                  ['nombre'=>'fruta de dragon','precio'=>7.34],     
             ];
        $empresa = 'Hermanos<br>Fruteros';
        $valores = [
                    'frutas' => $frutas,
                    'empresa'=> $empresa

        ];
        echo '<pre>'.var_export($valores,true).'</pre>';
        exit;
        return view('base.frutas', $valores);
        //return view('ejemplos.formulario1')->with($valores));
        
    }

    function ruta12($idusuario, $idlog){
        $valores = [
            'idusuario' => $idusuario,
            'idlog'=> $idlog
        ];
        return view('base.ruta12',$valores);
    }

    function ruta13(){
        return view('base.ruta13');
    }

    function ruta14(Request $peticion){
        $nombre = $peticion->input('nombre');
        $nombre2 = $peticion->query('nombre','no llega');
        return $nombre.''.$nombre2.''.$peticion->nombre;
    }

    function ruta15(Request $peticion, $mensaje = '') {
        $datos = [];
        if(isset($this->mensajes[$mensaje])) {
            $datos = [
                'mensaje'=> $this-> mensajes[$mensaje] 
            ];
        }
        return view('base.ruta15') -> with($datos);
    }

    function ruta16(Request $request){

        $nombre = $request -> input('nombre');
        if(strcasecmp($nombre,'pepe') === 0){
            return redirect('ruta15/mensaje1')->withInput($request -> except('clave', 'clave1'));
        }else{
            return redirect('ruta15/?mensaje2');

        }
        
    }
    
    function home(){
        return view('base.home');
    }
    function formulario(){
        return view('base.login');
    }
}
