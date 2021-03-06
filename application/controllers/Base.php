<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Tokens_model");
	}

	/**
   * Function Index
   *
   * Carrega a view da página principal
   *
   * @return (string)
   */
	public function Index()
	{
		//lista 10 tokens gerados
		$data['tokens'] = $this->Tokens_model->ListTokens(10);
		$this->load->view('home',$data);
	}

	/**
   * Function GenerateToken
   *
   * Gera o novo token e carrega a view com o token gerado
   *
   * @return (string)
   */
	public function GenerateToken(){
		//gera o token a partir de uma string randômica, fazendo uso da função hash(), nativa do PHP
    $token = hash('ripemd160', self::GenerateRandomString());

		//verifica se o token gerado é único, caso não seja, gera um novo
    if($this->Tokens_model->IsUniqueToken($token)){
				$data['token'] = $token;
				$data['tokens'] = $this->Tokens_model->ListTokens(10);
				$this->load->view('tokens',$data);
		}
    else
      self::GenerateToken();
  }

	/**
   * Function GenerateRandomString
   *
   * Gera uma string randômica que será utilizada como token
   *
	 * @param (string) $length Quantidade de caracteres do token
   * @return (string)
   */
	private function GenerateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		//retorna o tamanho da string $characters
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
			//seleciona uma posição da string $characters de forma randômica e concatena na variável $randomString
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
		//retorna a string gerada
    return $randomString;
  }
}
