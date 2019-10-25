@extends('base')
@section('contenido')

<form action="{{ url('validate/doform') }}" method="post">
    @csrf
    <input name="login" placeholder = "login required" type="text"  value=""/>
    <input name="mail" placeholder = "email required" type="text"  value=""/>
    <input name="password" placeholder = "password required" type="text"  value=""/>
    <input name="date" placeholder = "date required" type="text"  value=""/>
    <input type="submit" value="enviar"/>
</form>

@stop