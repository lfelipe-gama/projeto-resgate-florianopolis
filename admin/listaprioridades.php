<?php
    ob_start();
    include 'seguranca/conectabd_seguranca.php';

    if(!empty($_POST)) {
        switch ($_GET['funcao']){
            case 'ordem':
                $count = 1;
                foreach ($_POST['item'] as $item){
                    $sql = "UPDATE lista_prioridades SET ordem='{$count}' WHERE id={$item}";
                    mysqli_query($conexao, $sql);
                    $count++;
                }
                break;
            case 'deletar':
                $sql = "DELETE FROM lista_prioridades WHERE id={$_POST['id']}";
                mysqli_query($conexao, $sql);
                break;
            case 'salvar':
                $sql = "UPDATE lista_prioridades SET nome='{$_POST['nome']}' WHERE id={$_POST['id']}";
                mysqli_query($conexao, $sql);
                break;
            case 'adicionar':
                $sql = "INSERT INTO lista_prioridades (nome,ordem) VALUES ('{$_POST['nome']}', '{$_POST['ordem']}')";
                mysqli_query($conexao, $sql);
                echo $conexao->insert_id;
                break;
        }

    }
?>