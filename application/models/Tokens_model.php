<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tokens_model extends CI_Model{

  /**
   * Function SaveToken
   *
   * Salva o token gerado no banco de dados
   *
   * @param (string) token
   * @return (boolean)
   */

  function SaveToken($token){
    if($this->db->insert('tokens',array('token' => $token)))
      return true;
    else
      return false;
  }

  /**
   * Function IsUniqueToken
   *
   * Checa se o token gerado é único, se for grava no banco de dados
   *
   * @param (string) token
   * @return (boolean)
   */

  function IsUniqueToken($token){
    $this->db->select('*')->from('tokens')->where('token',$token);
    if($this->db->count_all_results() == 0)
      $status = self::SaveToken($token);
    else
      $status = false;

    return $status;
  }

  /**
   * Function ListTokens
   *
   * Lista os tokens gerados
   *
   * @param (integer) limit
   * @return (array) tokens
   */

  function ListTokens($limit = 10){
    $this->db->select('*')->from('tokens')->order_by('token','RAND')->limit($limit);
    return $this->db->get()->result();
  }

}

?>
