<?php

class Cor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("CorModel");
        $this->load->model("veiculomodel");

        if (!isset($_SESSION["tesi2022"])) {
            echo "você precisa estar logado";
            header("location: http://127.0.0.1/codeigniter-aula/index.php/login/");
        }
    }
    public function index()
    {
        

        $cores = $this->CorModel->selecionarTodos();
        $tabela = "";
        foreach ($cores as $item) {
            $tabela .= "
                    <tr>";
            if (isset($_SESSION["tesi2022"])) {
                $tabela .= "
                <td style='cursor: pointer'>
                    <a href='/codeigniter-aula/index.php/cor/alterar?codigo=" . $item->id . "'>
                    ✏️
                    </a>
                    <a href='/codeigniter-aula/index.php/cor/excluir?codigo=" . $item->id . "'>
                    ❌
                    </a>
                </td>";
            }
            $tabela .= "
                    
                        <td>" . $item->id . "</td>
                        <td>" . $item->cor . "</td>
                    </tr>
                ";
        }
        $variavel = array(
            "lista_veiculos" => $cores,
            "tabela" => $tabela,
            "titulo" => "Você está em marquinhos veiculos",
            "sucesso" => "Veiculo add com sucesso",
            "erro" => "ashduashu"
        );

        $this->template->load("templates/adminTemp", "cor/index", $variavel);
    }

    public function novo()
    {
        //var_dump( $_FILES);
        $cor = $_POST['cor'];
        $achouCor = $this->CorModel->buscarCor($cor);
        if (sizeof($achouCor) > 0){
            echo "<script>alert('Cor ja existe')
            window.location='./'</script>";

            return;
        }
        
        $data = array(
            "cor" => $cor
        );
        $retorno = $this->CorModel->inserir($data);
        if ($retorno) {
            header('location: /codeigniter-aula/index.php/cor');
        } else {
            echo "houve erro na alteração";
        }
    }

    //Alteração de veículo
    public function alterar()
    {

        $id = $_GET["codigo"];

        $retorno = $this->CorModel->buscarid($id);

        $data = array(
            "cor" => $retorno[0],
            "titulo" => "Alteração de cores"
        );

        $this->template->load("templates/adminTemp", "cor/formAlterar", $data);
    }

    public function salvaralteracao()
    {
        $id = $_POST["id"];
        $cor = $_POST['cor'];
        $achouCor = $this->CorModel->buscarCor($cor);
        if (sizeof($achouCor) > 0){
            echo "<script>alert('Cor ja existe')
            window.location='./'</script>";

            return;
        }

        $retorno = $this->CorModel->salvaralteracao(
            $id,
            $cor
        );

        if ($retorno) {
            header('location: /codeigniter-aula/index.php/cor');
        } else {
            echo "houve erro na alteração";
        }
    }

    public function formNovo()
    {
        
        $this->template->load("templates/adminTemp", "cor/formNovo");
    }


    public function excluir()
    {

        $id = $_GET["codigo"];

        $retorno = $this->CorModel->excluir($id);

        if ($retorno) {
            header('location: /codeigniter-aula/index.php/veiculo');
        } else {
            echo "houve erro na alteração";
        }
    }
}
