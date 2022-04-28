<?php

class Veiculo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("CorModel");

        if (!isset($_SESSION["tesi2022"])) {
            echo "você precisa estar logado";
            header("location: http://127.0.0.1/codeigniter-aula/index.php/login/");
        }
    }
    public function index()
    {

        $veiculos = $this->veiculomodel->selecionarTodos();
        $tabela = "";
        foreach ($veiculos as $item) {
            $tabela .= "
                    <tr>";
            if (isset($_SESSION["tesi2022"])) {
                $tabela .= "
                <td style='cursor: pointer'>
                    <a href='/codeigniter-aula/index.php/veiculo/alterar?codigo=" . $item->id . "'>
                    ✏️
                    </a>
                    <a href='/codeigniter-aula/index.php/veiculo/excluir?codigo=" . $item->id . "'>
                    ❌
                    </a>
                </td>";
            }
            $tabela .= "
                    
                        <td>" . $item->marca . "</td>
                        <td>" . $item->modelo . "</td>
                        <td>" . $item->cor_nome . "</td>
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

        $this->template->load("templates/adminTemp", "veiculo/index", $variavel);
    }

    public function novo()
    {
        //var_dump( $_FILES);
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
            "titulo" => "Alteração de veículos",
            "opcoes" => $this->montaComboCores($retorno[0]->cor)
        );

        $this->template->load("templates/adminTemp", "veiculo/formAlterar", $data);
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
        $option = $this->montaComboCores(0);

        $data = array(
            "opcoes" => $option
        );
        $this->template->load("templates/adminTemp", "veiculo/formNovo", $data);
    }

    private function montaComboCores($idCor)
    {
        $cores = $this->CorModel->selecionarTodos();
        $option = "";
        foreach ($cores as $linhas) {
            $selecionado = "";
            if ($idCor == $linhas->id) {
                $selecionado = "selected";
            }
            $option .= "<option value ='" . $linhas->id . "'
            " . $selecionado . "
            >"
                . $linhas->cor . " </option>";
        }

        return $option;
    }

    public function excluir()
    {
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
