<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newController extends Controller
{
     private $mensajes = [
            'mensaje1'=> 'Bienvenido',
            'mensaje2'=> 'Error, usuario no valido',
    ];
    
    
    function signin(Request $peticion, $mensaje = '') {
        $datos = [];
        if(isset($this->mensajes[$mensaje])) {
            $datos = [
                'mensaje'=> $this-> mensajes[$mensaje] 
            ];
        }
        return view('base.formulario') -> with($datos);
    }
  
    
    function userhome(Request $request){
        $clave = $request-> input('clave');
        $nombre = $request -> input('nombre');
        if(strcasecmp($nombre,'pepe') === 0 && strcasecmp($clave,'pepe')===0){
            return redirect('welcome')->withInput($request -> except('clave', 'clave1'));
        }else{
            return redirect('signin/mensaje2')->withInput($request -> except('clave', 'clave1'));

        }
        
    }
    function welcome(Request $request){
         return view('base.bienvenido1') ;
        
    }
     function forgoten(Request $request){
         return view('base.forgoten') ;
        
    }
    
    
    
    
    
    
    
    
    
    
    
    public function postLogin(Request $request){
        
        if (Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                    'active' => 1
                ]
                , $request->has('remember')
                )){
            return redirect()->intended($this->redirectPath());
        }
        else{
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            
            $messages = [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El formato de email es incorrecto',
                'password.required' => 'El campo password es requerido',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            return redirect('auth/login')
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Error al iniciar sesión');
        }
    }

   
}
