<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Classes\minhaClasse;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailRecuperarSenha;

class usuariosController extends Controller
{
	// Função para retornar a página principal
	public function index()
	{	
		// Verificar se existe sessão	
		if (!Session::has('login')) {
			
			return $this->frmLogin();

		} else {

			return view('aplicacao');

		}		
	}

	// Apresenta o formulário de login
	public function frmLogin()
	{
		return view('usuario_frm_login');
	}

	// Função para logar no sistema
	public function logar(Request $request)
	{
		// Validação dos campos
		$this->validate($request, [
			'text_usuario'=>'required',
			'text_senha'=>'required'
		]);

		// Verificar se usuário existe
		$user = usuarios::where('usuario', $request->text_usuario)->first();


		if (count($user) == 0)
		{
			$erros_bd = ['Usuário não encontrado!'];

			return view('usuario_frm_login', compact('erros_bd'));
		}

		// Verificação da senha do usuário
		if (!Hash::check($request->text_senha, $user->senha))
		{
			$erros_bd = ['Senha incorreta!'];

			return view('usuario_frm_login', compact('erros_bd'));
		}

		// Cria a sessão do usuário	

		Session::put('login', 'sim');
		Session::put('id_usuario', $user->id_usuario);
		Session::put('usuario', $user->usuario);

		return redirect('/');

	}

	// Função para fazer logout do sistema
	public function logout()
	{
		// Destruir a sessão
		Session::flush();

		return redirect('/');
	}

	// Função para retornar a página de recuperação de senha
	public function recovery()
	{
		return view('usuario_frm_recuperar_senha');
	}

	// Função para executar o recovery
	public function execRecovery(Request $request)
	{
		// Validação dos campos
		$this->validate($request, [
			'text_email'=>'required|email'
		]);

		// Busca o usuário que contém a conta de email informada
		$usuario = usuarios::where('email', $request->text_email)->get();

		if ($usuario->count() == 0) {

			$erros_bd = ['O e-mail não está associado a nenhuma conta de usuário!'];

			return view('usuario_frm_recuperar_senha', compact('erros_bd'));
		}

		// Cria uma nova senha para o usuário
		$nova_senha = minhaClasse::criarSenha();

		// Atualiza a senha do usuário para a nova senha
		$usuario = $usuario->first();
		$usuario->senha = Hash::make($nova_senha);
		$usuario->save();

		// Enviar email ao usuário com a nova senha
		Mail::to($usuario->email)->send(new emailRecuperarSenha($nova_senha));

		// Apresenta a view informado que o email foi enviado
		return redirect('/usuario_email_enviado');
	}

	public function emailEnviado()
	{
		return view('usuario_email_enviado');
	}

	// Função para retornar a página de cadastro de usuário
	public function createUser()
	{
		return view('usuario_frm_create');
	}

	// Função para executar criação de usuário
	public function executarCreateUser(Request $request)
	{
		// Validação dos campos
		$this->validate($request, [
			'text_usuario'=>'required|between:3,15|alpha_num',
			'text_senha'=>'required|between:6,15',
			'text_repetir_senha'=>'required|same:text_senha',
			'text_email'=>'required|email',
			'check_termos'=>'accepted'
		]);

		// Verificar se já existe um usuário com o mesmo nome ou email no sistema
		$dados = usuarios::where('usuario', '=', $request->text_usuario)->orWhere('email', '=', $request->text_email)->get();

		if ($dados->count() != 0)
		{
			$erros_bd = ['Já existe um usuário com o mesmo nome ou email!'];

			return view('usuario_frm_create', compact('erros_bd'));
		}

		// Inserir o usuário no BD
		$novo = new usuarios;

		$novo->usuario = $request->text_usuario;
		$novo->senha = Hash::make($request->text_senha);
		$novo->email = $request->text_email;

		$novo->save();

		return redirect('/');

	}
}