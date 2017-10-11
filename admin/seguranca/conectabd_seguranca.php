<?php
	$conexao = mysqli_connect("mysql857.umbler.com", "user_resgate", "yasjekTac7", "proj_resgate","41890");
	if (!$conexao) {
		echo "Não foi possível usar o banco de dados:".mysqli_error($conexao);
		exit;
	}
?>