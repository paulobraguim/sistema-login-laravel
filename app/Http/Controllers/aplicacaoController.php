<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class aplicacaoController extends Controller
{
    // Retorna a página inicial do sistema
    public function showIndex()
    {	

    	// Verifica se a sessão está ativa
    	if (!Session::has('login'))
    	{
    		
    		return redirect('/');

    	} 
    		return view('aplicacao');    	   	
    }
}
