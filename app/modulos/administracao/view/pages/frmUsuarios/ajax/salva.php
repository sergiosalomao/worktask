<?php
require_once "../../../../controller/UsuarioController.php";
require_once "../../../../model/Usuario.php";
require_once "../../../../../../appConfig.php";

if (isset($_POST)) {
    $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    $senha2 = (isset($_POST['senha2'])) ? $_POST['senha2'] : '';
    $tipo_usuario_id = (isset($_POST['tipo_usuario_id'])) ? $_POST['tipo_usuario_id'] : '';
    $status = (isset($_POST['status'])) ? $_POST['status'] : '';
    $criado_em = date('d-m-Y H:i:s');
    $modificado_em = date('d-m-Y H:i:s');

    // compara as senhas
    if ((!empty($senha) || !empty($senha2)) && ($senha != $senha2))
    {
        $array = array(
            'retorno' => 'incompleto',
            'classe' => 'bg-warning',
            'mensagem' => 'Senhas nao Coincidem!');

        echo json_encode($array);
        exit;
    }else

    // Valida se foram preenchidos todos os campos
    if (empty($nome) || empty($email) || empty($senha) || empty($senha2) || empty($tipo_usuario_id) || empty($status))
    {
        $array = array(
            'retorno' => 'incompleto',
            'classe' => 'bg-warning',
            'mensagem' => 'Preencher todo os campos obrigatorios(*)!');

        echo json_encode($array);
        exit;
    }
        else {
            #Instancia o Controller
            $UsuarioController = new UsuarioController();

            #Instancia o Model
            $UsuarioModel = new Usuario();

            #define os valores dos campos
            $UsuarioModel->setNome($nome);
            $UsuarioModel->setEmail($email);
            $UsuarioModel->setSenha($senha);
            $UsuarioModel->setTipoUsuarioId($tipo_usuario_id);
            $UsuarioModel->setStatus($status);
            $UsuarioModel->setCriadoEm($criado_em);
            $UsuarioModel->setModificadoEm($modificado_em);


            #Pega total de registros atuais
            $tot_reg = $UsuarioController->ContaRegistros();

            #verifica se existe alguem com a mesma descricao do tipo
            if ($UsuarioController->procurarPorEmail($email)) {
                #se existir altera o registro existente
                $id = $UsuarioController->procurarPorEmail($email)->id;

                $UsuarioController->atualizar($id, $UsuarioModel);

                #Pega total de registros atuais
                $tot_reg = $UsuarioController->ContaRegistros();

                $array = array(
                    'retorno' => 'atualizado',
                    'classe' => 'bg-sucess',
                    'mensagem' => 'Registro atualizado com sucesso!');

                echo json_encode($array);

                exit;
            } else {
                #grava

                $UsuarioController->gravar($UsuarioModel);

                #compara
                if ($UsuarioController->contaRegistros() > $tot_reg) {
                    $array = array(
                        'retorno' => 'salvo',
                        'classe' => 'bg-sucess',
                        'mensagem' => 'Registros salvos com sucesso!');

                    echo json_encode($array);

                } else {
                    $array = array(
                        'retorno' => 'error',
                        'classe' => 'bg-danger',
                        'mensagem' => 'Erro ao salvar registro!');

                    echo json_encode($array);
                }
            }
        }
}
