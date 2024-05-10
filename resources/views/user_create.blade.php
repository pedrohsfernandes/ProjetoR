@extends('master')

    @if (session()->has('message'))
        {{session()->get ('message')}}
    @endif
@section('content')

<h2>Create</h2>

<form action="{{route ('user.store')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="text" name="email"  placeholder="email">
    <input type="text" name="password" placeholder="password">
    <button type="submit">Enviar</button>
</form>
    
@endsection