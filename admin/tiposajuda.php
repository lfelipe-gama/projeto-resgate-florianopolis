<?php
    ob_start();
    include 'seguranca/conectabd_seguranca.php';

    if(!empty($_POST)) {
        switch ($_GET['funcao']){
            case 'salvar':
                $sql = "UPDATE tipos_ajuda SET nome='{$_POST['nome']}', descricao='{$_POST['descricao']}', info_adicional='{$_POST['info_adicional']}' WHERE id={$_POST['id']}";
                mysqli_query($conexao, $sql);
                break;
        }

    }
?>