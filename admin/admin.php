<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Projeto Resgate</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="singin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php
ob_start();
include "seguranca/conectabd_seguranca.php";
include 'seguranca/verificasessao_seguranca.php';

$prioridades = mysqli_query($conexao, "SELECT * FROM lista_prioridades ORDER BY ordem");
$listaPrioridades = $prioridades->fetch_all(MYSQLI_ASSOC);

$cards = mysqli_query($conexao, "SELECT * FROM tipos_ajuda");
$listaCards = $cards->fetch_all(MYSQLI_ASSOC);

?>
<nav class="navbar bg-light fixed-top">
    <a class="navbar-brand">Projeto Resgate</a>
    <form class="form-inline">
        <a class="btn btn-danger" href="seguranca/logout.php">Sair</a>
    </form>
</nav>

<div class="container-fluid">
    <div class="row">
    <div class="col-md-6">
    <div class="card">
        <h4 class="card-header">Lista de Prioridades</h4>
        <div class="card-body">
            <p class="card-text">Limite de 8 itens. Arraste para ordernar.</p>
        </div>
        <ul class="list-group list-group-flush list-group-sortable" id="listaprioridades">
            <?php
            foreach($listaPrioridades as $item){
                echo '<li class="list-group-item" draggable="true" id="item-'.$item["id"].'">
                            <input type="hidden" id="texto-'.$item["id"].'" value="'.$item["nome"].'">
                            <div class="input-group"  id="campo-'.$item["id"].'">
                                <div class="form-control" readonly>'.$item["nome"].'</div>
                                
                                <span class="input-group-addon editar" onclick="editar('.$item["id"].')" data-id="'.$item["id"].'"><i class="material-icons md-10">edit</i></span>
                                <span class="input-group-addon deletar" onclick="deletar('.$item["id"].')" data-id="'.$item["id"].'"><i class="material-icons md-10">delete</i></span>
                            </div>
                        </li>';
            }
            ?>
        </ul>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" id="novo" name="novo">
                <span class="input-group-addon adicionar" onclick="adicionar()"><i class="material-icons md-10">add</i> Adicionar</span>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <h4 class="card-header">Quero Ajudar!</h4>
            <div class="card-body">
                <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush list-group-sortable" id="listaCards">
                <?php
                foreach($listaCards as $item){
                    echo '<li class="list-group-item" id="item-'.$item["id"].'">
                            <input type="hidden" id="texto-'.$item["id"].'" value="'.$item["nome"].'">
                            <div class="input-group"  id="campo-'.$item["id"].'">
                                <div class="form-control" readonly id="nome-ajuda-'.$item['id'].'">'.$item["nome"].'</div>
                                <span class="input-group-addon editar" id="editar-'.$item['id'].'" data-id="'.$item["id"].'" data-nome="'.$item["nome"].'" data-descricao="'.$item["descricao"].'"  data-infoadicional="'.$item["info_adicional"].'" data-toggle="modal" data-target="#exampleModal"><i class="material-icons md-10">edit</i></span>

                            </div>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nome" class="form-control-label">Nome:</label>
                                <input type="text" class="form-control" id="nome">
                            </div>
                            <div class="form-group">
                                <label for="descricao" class="form-control-label">Descriçao:</label>
                                <textarea class="form-control" id="descricao"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="info_adicional" class="form-control-label">Informaçoes adicionais:</label>
                                <textarea class="form-control" id="info_adicional"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary enviar">Send message</button>
                    </div>
                </div>
            </div>
        </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
<script src="../js/listarprioridades.js"></script>
    <script>
        $(document).ready(function () {
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract info from data-* attributes
                var nome = button.data('nome'); // Extract info from data-* attributes
                var descricao = button.data('descricao'); // Extract info from data-* attributes
                var info_adicional = button.data('infoadicional'); // Extract info from data-* attributes
                var modal = $(this);
                modal.find('.modal-title').text('Alterando ' + nome);
                $nome = modal.find('.modal-body #nome');
                $descricao = modal.find('.modal-body #descricao');
                $info_adicional = modal.find('.modal-body #info_adicional');
                $nome.val(nome);
                $descricao.val(descricao);
                $info_adicional.val(info_adicional);

                $('.enviar').click(function () {
                    data = {
                        'id':id,
                        'nome': $nome.val(),
                        'descricao': $descricao.val(),
                        'info_adicional': $info_adicional.val()
                    };
                    $.ajax({
                        data: data,
                        type: 'POST',
                        url: 'tiposajuda.php?funcao=salvar'
                    }).done(function () {
                        $('#nome-ajuda-'+id).html($nome.val());

                        $('#editar-'+id).attr('data-nome',$nome.val());
                        $('#editar-'+id).attr('data-descricao',$descricao.val());
                        $('#editar-'+id).attr('data-infoadicional',$info_adicional.val());
                        $('#exampleModal').modal('toggle');
                    });
                })
            });
        })
    </script>
</body>
</html>