<?php

require_once "../../../controller/UsuarioController.php";
require_once "../../../model/Usuario.php";


if (isset($_POST)):
    $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    $tipo = (isset($_POST['tipo_usuario_id'])) ? $_POST['tipo_usuario_id'] : '';
    $status = (isset($_POST['status'])) ? $_POST['status'] : '';
    $criadoEm = (isset($_POST['criado_em'])) ? $_POST['criado_em'] : '';
    $modificadoEm = (isset($_POST['modificado_em'])) ? $_POST['modificado_em'] : '';

    // Valida se foram preenchidos todos os campos
    if (empty($nome) || empty($email) || empty($senha) || empty($tipo) || empty($status)):
        $array = array('status' => 'incompleto', 'classe' => 'bg-warning', 'mensagem' => 'Preencher todo os campos obrigatórios(*)!');
        echo json_encode($array);
    else:

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
        $tot_reg = $usuarioController->ContaRegistros();

        #verifica se existe alguem com o mesmo email
        if ($usuarioController->procurarPorEmail($email)) {
            #se existir altera o registro existente

            #atualiza data da modificacao e passa o ID
            $usuarioModel->setModificadoEm($modificadoEm);
            $usuarioModel->setId($usuarioController->procurarPorEmail($email)->id);
            $id = $usuarioModel->getId();
            $usuarioController->atualizar($id, $usuarioModel);
            $array = array('status' => 'atualizado', 'classe' => 'bg-sucess', 'mensagem' => 'Registro atualizado com sucesso!');
            echo json_encode($array);
            exit;

        } else {
            $usuarioModel->setCriadoEm($criadoEm);
            #grava
            $usuarioController->gravar($usuarioModel);
            #compara
            if (count($usuarioController->ListarTodos()) > $tot_reg) {
                $array = array('status' => 'salvo', 'classe' => 'bg-sucess', 'mensagem' => 'Registros salvos com sucesso!');
                echo json_encode($array);
            } else {
                $array = array('status' => 'error', 'classe' => 'bg-danger', 'mensagem' => 'Erro ao salvar registro!');
                echo json_encode($array);
            }

        }

    endif;
endif;