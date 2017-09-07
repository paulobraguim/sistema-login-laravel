{{-- Apresentação dos erros de validação --}}

@if(count($errors) != 0)
	<div class="alert alert-danger">

	    {{-- Título da caixa de erros --}}

		@if(count($errors) == 1)
			<p class="titulo-erro">ERRO:</p>
		@else
			<p class="titulo-erro">ERRO:</p>
		@endif

		{{-- Apresentar os erros --}}

		<ul>
			@foreach ($errors->all() as $erro)
				<li>{{ $erro }}</li>
			@endforeach
		</ul>

	</div>
@endif

{{-- Apresentação dos erros de comunicação com o BD--}}

@if(isset($erros_bd))
	
	<div class="alert alert-danger">
		
		@foreach ($erros_bd as $erro)
			
			<p>{{ $erro }}</p>

		@endforeach				

	</div>

@endif