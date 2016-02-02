<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tokens extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Tokens_model");
	}

	/**
   * Function index
   *
   * Carrega a página principal listando os tokens gerados
   *
   * @return (view)
   */
	public function index()
	{
		$data['tokens'] = $this->Tokens_model->ListTokens(10); //lista 10 tokens gerados
		$this->load->view('home',$data);
	}

	/**
   * Function GenerateToken
   *
   * Gera um novo token único e carrega a view com o token gerado
   *
   * @return (view)
   */
	public function GenerateToken(){
    $token = hash('ripemd160', self::GenerateRandomString()); //gera o token a partir de uma string randômica, fazendo uso da função hash(), nativa do PHP

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
   * Gera um token randômico
   *
	 * @param (integer) tamanho da string randômica a ser gerada
   * @return (view)
   */
	private function GenerateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters); //retorna o tamanho da string $characters
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)]; //seleciona uma posição da string $characters de forma randômica e concatena na variável $randomString
    }
    return $randomString; //retorna a string gerada
  }

}
