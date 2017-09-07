@extends('layouts.app')

@section('conteudo')

	<div class="row">

		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">

			{{-- Apresentação de erros --}}
			@include('inc/erros')	

			<form method="POST" action="/exec_create_user">
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

				{{-- Repetir Senha --}}
  				<div class="form-group">
				    <label for="id_repetir_senha">Repetir senha</label>
				    <input type="password" class="form-control" id="id_repetir_senha" name="text_repetir_senha" placeholder="********">
				</div>

				{{-- Email --}}
  				<div class="form-group">
				    <label for="id_email">Email</label>
				    <input type="email" class="form-control" id="id_email" name="text_email" placeholder="Digite seu email">
				</div>

				{{-- Aceitação das condições do serviço --}}
				<div class="form-group text-center">
					<input type="checkbox" name="check_termos" id="termos" value="1">
					<label for="termos"> Aceito os termos e condições</label>
				</div>

				{{-- Botão --}}
				<div class="text-center">
					<button type="submit" class="btn btn-primary">Criar nova conta</button>
				</div>

				{{-- Link para voltar a página inicial --}}
				<div class="text-center margin-top-20">
					<a href="/">Voltar ao início</a>
				</div>		

			</form>

		</div>
	</div>	

@endsection