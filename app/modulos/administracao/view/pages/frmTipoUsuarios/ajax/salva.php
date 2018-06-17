<?php
require_once "../../../../controller/TiposUsuarioController.php";
require_once "../../../../model/TiposUsuario.php";
require_once "../../../../../../appConfig.php";

if (isset($_POST))
{
    $descricao = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';
    $obs = (isset($_POST['obs'])) ? $_POST['obs'] : '';

    // Valida se foram preenchidos todos os campos
    if (empty($descricao))
    {
        $array = array(
            'retorno' => 'incompleto',
            'classe' => 'bg-warning',
            'mensagem' => 'Preencher todo os campos obrigatórios(*)!');

        echo json_encode($array);
    }
    else
        {


        #Instancia o Controller
        $tipoUsuarioController = new TiposUsuarioController();

        #Instancia o Model
        $tipoUsuarioModel = new TiposUsuario();

        #define os valores dos campos
        $tipoUsuarioModel->setDescricao($descricao);
        $tipoUsuarioModel->setObs($obs);

        #Pega total de registros atuais
        $tot_reg = $tipoUsuarioController->ContaRegistros();

        #verifica se existe alguem com a mesma descricao do tipo
        if ($tipoUsuarioController->procurarPorDescricao($descricao))
        {
            #se existir altera o registro existente
            $id = $tipoUsuarioController->procurarPorDescricao($descricao)->id;


            $tipoUsuarioController->atualizar($id, $tipoUsuarioModel);

            $array = array(
                'retorno' => 'atualizado',
                'classe' => 'bg-sucess',
                'mensagem' => 'Registro atualizado com sucesso!');

            echo json_encode($array);

            exit;

        }
        else
            {
            #grava
            $tipoUsuarioController->gravar($tipoUsuarioModel);

            #compara
            if ($tipoUsuarioController->contaRegistros() > $tot_reg) {
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
