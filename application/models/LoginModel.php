<?php

class LoginModel extends CI_Model
{

    public function registrar($data)
    {
        try {

            if ($this->validaEmail($data["email"])) {
                $this->db->insert('usuario', $data);
                return true;
            } else
                return false;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function validaEmail($email)
    {
        $sql = "SELECT count(1) as total FROM usuario WHERE email = '" . $email . "'";
        $retorno = $this->db->query($sql)->result();
        if ($retorno[0]->total == 0)
            return true;
        return false;
    }

    public function criarSenha($email, $senha, $chave){
        if ($this->validaChave($email, $chave)){
            $sql = "UPDATE usuario SET senha = '" . $senha ."' WHERE email = '" . $email ."' AND chave = '" . $chave ."'";
            try{
                $this->db->query($sql);
                return true;
            }catch (Exception $ex){
                return false;
            }
        }
        return false;
    }

    public function validaChave($email, $chave)
    {
        $sql = "SELECT count(1) as total FROM usuario WHERE email = '" . $email . "' AND chave = '" . $chave . "'";
        $retorno = $this->db->query($sql)->result();
        if ($retorno[0]->total == 0)
            return false;
        return true;
    }

    public function validaLogin($email, $senha){
        $sql = "SELECT COUNT(1) as total FROM usuario WHERE email = '" . $email . "' AND senha = '" . $senha . "'";

        $retorno = $this->db->query($sql)->result();
        if ($retorno[0]->total == 0)
            return false;
        return true;
    }
}
