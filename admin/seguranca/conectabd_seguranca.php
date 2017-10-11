<?php
	$conexao = mysqli_connect("localhost", "", "", "","");
	if (!$conexao) {
		echo "Não foi possível usar o banco de dados:".mysqli_error($conexao);
		exit;
	}
?>