@extends('base')
@section('contenido')

{{
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
}}


<form action="{{ url('validate/doform') }}" method="post">
    @csrf
    
    <input name="login" placeholder = "login required between 5 and 10 caracters alphab" type="text"  value="{{ old('login')  }}"/>
        @error('login')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
    <input name="mail" placeholder = "email required format correo max 100 caracters" type="text"  value="{{ old('mail')  }}"/>
        @error('mail')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
    <input name="password" placeholder = "password required min 8 caracters" type="text"  value="{{ old('password')  }}"/>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <input name="date" placeholder = "date required aa/mm/dd" type="text"  value="{{ old('date')  }}"/>
        @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    <input type="submit" value="enviar"/>
    
</form>


@stop