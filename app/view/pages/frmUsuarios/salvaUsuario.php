<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once "../../../controller/UsuarioController.php";
require_once "../../../model/Usuario.php";


if (isset($_POST)):
     $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
     $email = (isset($_POST['email'])) ? $_POST['email'] : '';
     $senha = (isset($_POST['password'])) ? $_POST['password'] : '';
     $tipo = (isset($_POST['tipoUsuario'])) ? $_POST['tipoUsuario'] : '';
     $status = (isset($_POST['statusUsuario'])) ? $_POST['statusUsuario'] : '';

    // Valida se foram preenchidos todos os campos
    if (empty($nome) || empty($email) || empty($senha) || empty($tipo) || empty($status)):
        $array = array('status' => 'incompleto','classe' => 'bg-warning', 'mensagem' => 'Preencher todo os campos obrigatórios(*)!');
        echo json_encode($array);
    else:

        #Grava no banco de dados as informações do contato

        #Instancia o Controller
        $usuarioController = new UsuarioController();

        #Instancia o Model
        $usuarioModel = new Usuario();

        $usuarioModel->setNome($nome);
        $usuarioModel->setEmail($email);
        $usuarioModel->setSenha($senha);
        $usuarioModel->setTipoUsuarioId($tipo);
        $usuarioModel->setStatus($status);

        $array = array();

        #Pega total de registros atuais
        $tot_reg = count($usuarioController->ListarTodos());
        #grava
        $usuarioController->gravar($usuarioModel);
        #compara
        if(count($usuarioController->ListarTodos()) > $tot_reg) {
            $array = array('status' => 'salvo','classe' => 'bg-sucess', 'mensagem' => 'Registros salvos com sucesso!');
            echo json_encode($array);
        }
        else
            {
                $array = array('status' => 'error','classe' => 'bg-danger', 'mensagem' => 'Erro ao salvar registro!');
                echo json_encode($array);
            }
        // colocar aqui o retorno do error do banco nao pode salvar o usuario com email ja existente


        endif;
        endif;