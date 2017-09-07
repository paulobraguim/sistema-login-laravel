<?php

namespace App\Classes;

	class minhaClasse {

		// Cria uma senha aleatória para o usuário
		public static function criarSenha()
		{
			$valor = '';
			$caracteres = 'abcdefghijklmnopqrstuvxwyz_ABCDEFGHIJKLMNOPQRSTUVXWYZ1234567890!?#$%';

			for ($i=0; $i < 10  ; $i++) { 
				$index = rand(0, strlen($caracteres));

				$valor .= substr($caracteres, $index, 1);
			}

			return $valor;

		}

	}

?>