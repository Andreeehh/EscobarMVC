<?php
class Login extends CI_Controller
{
    private $aux = "dahsudashiudhuashduiashui, dhasuidhuiashudiashui, dhausidhuasihduasuhdi";

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("LoginModel");
    }

    public function salvarRegistro()

    {
        $num1 = rand(0, 9);
        $num2 = rand(0, 9);
        $num3 = rand(0, 9);
        $num4 = rand(0, 9);
        $num5 = rand(0, 9);
        $num6 = rand(0, 9);



        $chave = $num1 . '' . $num2 . '' .
            $num3 . '-' . $num4 . '' .
            $num5 . '' . $num6;
        $data = array(
            "email" => $_POST["email"],
            "nome" => $_POST["nome"],
            "chave" => $chave,
        );

        //$this->load->model("LoginModel");
        $retorno = $this->LoginModel->registrar($data);
        if ($retorno)
            echo "Veja seu e-mail, para continuar o cadastro";
        else
            echo "Erro ao criar o usuário";
    }

    public function registro()
    {
        $this->load->view('login/register');
    }

    public function registrarSenha()
    {
        $this->load->view('login/registrarsenha');
    }

    public function index()
    {
        $this->template->load("templates/adminLogin",'login/login');
    }

    public function alterarSenha()
    {

        $senha = md5($_POST["senha"] . $this->aux);
        $email = $_POST["email"];
        $chave = $_POST["chave"];

        //$this->load->model("LoginModel");

        $retorno = $this->LoginModel->CriarSenha($email, $senha, $chave);

        if ($retorno){
            echo "Senha cadastrada com sucesso.";
        } else{
            echo "Senha não pode ser cadastrada.";
        }
            
    }

    public function validaLogin(){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $senha = md5($senha . $this->aux);

        //$this->load->model("LoginModel");

        $retorno = $this->LoginModel->ValidaLogin($email, $senha);

        if ($retorno){
            $_SESSION["tesi2022"] = array(
                "email" => $email,
                "admin" => true
            );
            header("location: http://127.0.0.1/codeigniter-aula/index.php/");
        } else {
            echo "Usuário ou senha inválidos";
        }
    }

    public function deslogar () {
        unset($_SESSION);
        header("location: http://127.0.0.1/codeigniter-aula/index.php/login/ ");
    }
}
