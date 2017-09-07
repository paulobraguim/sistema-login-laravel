@extends('layouts.app')

@section('conteudo')

	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">

			{{-- Apresenta os erros se existirem --}}
			@include('inc/erros')	

			<form method="POST" action="/logar">
				{{-- Controle de segurança --}}
				{{ csrf_field() }}

				{{-- Usuário --}}
  				<div class="form-group">
				    <label for="id_text_usuario">Usuário</label>
				    <input type="text" class="form-control" id="id_text_usuario" name="text_usuario" placeholder="Digite seu usuário">
				</div>

				{{-- Senha --}}
  				<div class="form-group">
				    <label for="id_senha">Senha</label>
				    <input type="password" class="form-control" id="id_senha" name="text_senha" placeholder="********">
				</div>
				 
				{{-- Botão --}}
  				<div class="text-center">
				    <button type="submit" class="btn btn-primary">Entrar</button>
				</div> 

				{{-- Link recuperar senha --}}
				<div class="text-center margin-top-20">
					<a href="/recovery">Recuperar senha</a>
				</div>

				{{-- Link criar nova conta de usuário --}}
				<div class="text-center">
					<a href="/create_user">Criar nova conta</a>
				</div>		

			</form>
		</div>
	</div>

@endsection