<?php 

    class CorModel extends CI_MODEL {
        
        public function selecionarTodos(){
            $dados = $this->db->query("SELECT * FROM cor ORDER BY cor")->result();
            return $dados;
        }

        public function inserir($dados) {
            try {
                $this->db->insert("cor", $dados);
                return true;
            } catch (Exception $ex){
                return false;
            }
        }

        public function salvaralteracao ( $id, $cor ){
            $sql = "UPDATE cor 
                    SET
                        cor = " . $cor ."
                    WHERE id = " . $id ."
                    ";
            $this->db->query($sql);
            return true;
        }

        public function buscarId ( $id ){
            $retorno = $this->db->query("SELECT * FROM cor WHERE id = " . $id);
            return $retorno->result();
        }

        public function buscarCor ( $cor ){
            $retorno = $this->db->query("SELECT * FROM cor WHERE cor LIKE '%" . $cor . "%'");
            return $retorno->result();
        }

        public function excluir($id) {
            $this->db->query("DELETE FROM cor WHERE id = " .$id);
            return true;
        }
    }
