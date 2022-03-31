<?php

class Veiculo extends CI_Controller
{
    public function index()
    {
        $this->load->model("veiculomodel");

        $veiculos = $this->veiculomodel->selecionarTodos();
        $tabela = "";
        foreach ($veiculos as $item) {
            $tabela .= "
                    <tr>
                        <td style='cursor: pointer'>
                            <a href='/codeigniter-aula/index.php/veiculo/alterar?codigo=" . $item->id . "'>
                            ✏️
                            </a>
                            <a href='/codeigniter-aula/index.php/veiculo/excluir?codigo=" . $item->id . "'>
                            ❌
                            </a>
                        </td>
                        <td>" . $item->marca . "</td>
                        <td>" . $item->modelo . "</td>
                        <td>" . $item->cor . "</td>
                        <td>" . $item->valor . "</td>
                        <td>
                            <img src= '" . $item->imagem . "' style = 'width:100px' />
                        </td>
                    </tr>
                ";
        }
        $variavel = array(
            "lista_veiculos" => $veiculos,
            "tabela" => $tabela,
            "titulo" => "Você está em marquinhos veiculos",
            "sucesso" => "Veiculo add com sucesso",
            "erro" => "ashduashu"
        );

        $this->load->view("veiculo/index", $variavel);
    }

    public function novo()
    {
        $marca = $_POST["marca"];
        $modelo = $_POST['modelo'];
        $valor = $_POST['valor'];
        $cor = $_POST['cor'];
        $ano = $_POST['ano'];
        $imagem = $_POST['imagem'];

        $data = array(
            "marca" => $marca,
            "modelo" => $modelo,
            "valor" => $valor,
            "cor" => $cor,
            "ano" => $ano,
            "imagem" => $imagem
        );

        $this->load->model("veiculomodel");
        $retorno = $this->veiculomodel->inserir($data);
        if ($retorno) {
            header('location: /codeigniter-aula/index.php/veiculo');
        } else {
            echo "houve erro na alteração";
        }      
    }

    //Alteração de veículo
    public function alterar()
    {
        $this->load->model("VeiculoModel");

        $id = $_GET["codigo"];

        $retorno = $this->VeiculoModel->buscarid($id);

        $data = array(
            "veiculo" => $retorno[0],
            "titulo" => "Alteração de veículos"
        );

        $this->load->view("veiculo/formAlterar", $data);
    }

    public function salvaralteracao()
    {
        $this->load->model("VeiculoModel");
        $id = $_POST["id"];
        $marca = $_POST["marca"];
        $modelo = $_POST['modelo'];
        $valor = $_POST['valor'];
        $imagem = $_POST['imagem'];
        $cor = $_POST['cor'];
        $ano = $_POST['ano'];

        $retorno = $this->VeiculoModel->salvaralteracao(
            $id,
            $marca,
            $modelo,
            $valor,
            $imagem,
            $cor,
            $ano
        );

        if ($retorno) {
            header('location: /codeigniter-aula/index.php/veiculo');
        } else {
            echo "houve erro na alteração";
        }
    }

    public function formNovo()
    {
        $this->load->view("veiculo/formNovo");
    }

    public function excluir () {
        $this->load->model("VeiculoModel");

        $id = $_GET["codigo"];

        $retorno = $this->VeiculoModel->excluir($id);

        if ($retorno) {
            header('location: /codeigniter-aula/index.php/veiculo');
        } else {
            echo "houve erro na alteração";
        }
    }
}
