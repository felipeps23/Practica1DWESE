<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest{
    
    public function attributes(){
        return [
        'login'     => 'nombre de usuario', 
        'mail'      => 'correo electronico',
        'password'  => 'clave de acceso',
        'date'      => 'fecha de nacimiento',
        ];
    }
    
    
    public function autorize(){
        return true;
    }
    
    public function messages(){
        
        $required = 'El campo :attribute es obligatorio.';
        $min = 'La longitud minima del campo :attribute es :min';
        $max = 'La longitud maxima del campo :attribute es :max';
        $comun = 'El campo :attribute no tiene un formato valido.';
        
        return[
            'login.required'    => $required,
            'login.min'         => $min,
            'login.max'         => $max,
            'login.alpha_num'   => 'Los caracteres permitidos son alfanumericos',
            'mail.required'     => $required,
            'mail.max'          => $max,
            'mail.email'        => $comun,
            'password.required' => $required,
            'password.min'      => $min,
            'password.max'      => $min,
            'date.date'         => $comun,
            ];
    }
    
    
    public function rules(){
        return[
            'login'     => 'required|min:5|max:10|alpha_num', 
            'mail'      => 'required|max:100|email',
            'password'  => 'required|min:8',
            'date'      => 'nullable|date',
            ];
    }
}