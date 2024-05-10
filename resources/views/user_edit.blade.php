@extends('master')

    @if (session()->has('message'))
        {{session()->get ('message')}}
    @endif
@section('content')

<h2>Edit</h2>

<form action="{{route('users.update', ['user' =>$user->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="text" name="email" value="{{ $user->email }}">
    <input type="text" name="password" value="{{ $user->password }}">
    <button type="submit">Enviar</button>
</form>
    
@endsection