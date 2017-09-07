@extends('layouts.app')

@section('conteudo')
	<p>Estou na tela do sistema!</p>
	<p>Usuário: {{ session('usuario') }}</p>
	<a href="/logout">Logout</a>
@endsection