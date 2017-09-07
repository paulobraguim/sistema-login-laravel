@extends('layouts.app')

@section('conteudo')

	<div class="row">

		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">

			{{-- Apresentação de erros --}}
			@include('inc/erros')

			<form method="POST" action="/exec_recovery">
				{{-- Controle de segurança --}}
				{{ csrf_field() }}				

				{{-- Email --}}
  				<div class="form-group">
				    <label for="id_email">Informe o E-mail para recuperar sua senha</label>
				    <input type="email" class="form-control" id="id_email" name="text_email" placeholder="Digite seu email">
				</div>

				{{-- Botão --}}
				<div class="text-center">
					<button type="submit" class="btn btn-success">Enviar email</button>
				</div>

				{{-- Link para voltar a página inicial --}}
				<div class="text-center margin-top-20">
					<a href="/">Voltar ao início</a>
				</div>		

			</form>

		</div>
	</div>	

@endsection