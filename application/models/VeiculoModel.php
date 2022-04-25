<?php
    class VeiculoModel extends CI_Model{
        
        public function selecionarTodos(){
            $retorno = $this->db->query("SELECT v.*, c.cor AS cor_nome  FROM veiculo AS v INNER JOIN cor AS c ON c.id = v.cor");
            return $retorno->result();
        }

        public function buscarId ( $id ){
            $retorno = $this->db->query("SELECT * FROM veiculo WHERE id = " . $id);
            return $retorno->result();
        }

        public function salvaralteracao ( $id, $marca, $modelo, $valor, $imagem, $cor, $ano ){
            $sql = "UPDATE veiculo 
                    SET
                        marca = '" . $marca ."',
                        modelo = '" . $modelo ."',
                        ano = " . $ano .",
                        valor = " . $valor .",
                        cor = " . $cor .",
                        imagem = '" . $imagem ."'
                    WHERE id = " . $id ."
                    ";
            $this->db->query($sql);
            return true;
        }

        public function inserir ( $data ){
            $this->db->insert("veiculo", $data);
            return true;
        }

        public function excluir($id) {
            $this->db->query("DELETE FROM veiculo WHERE id = " .$id);
            return true;
        }
    }
