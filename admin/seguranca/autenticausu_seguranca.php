<?php
	ob_start();
	include "conectabd_seguranca.php";
	$txtusuario	= $_POST["usuario"];
	$pwdsenha	= $_POST["senha"];
	$senha		= sha1($pwdsenha);


	if ($txtusuario == "") {
		header("Location: ../index.php?mensagem=1");//FIXME definir erros
	}  elseif ($pwdsenha=="") {
		header("Location: ../index.php?mensagem=2");//FIXME definir erros
	} else {
		$sql_slt_usuario_res = mysqli_query($conexao,"SELECT * FROM usuarios WHERE usuario='{$txtusuario}'") or die("Erro: ".mysqli_error($conexao));
		if (mysqli_num_rows($sql_slt_usuario_res)  > 0) {
			$sql_slt_usuario_linhas = mysqli_fetch_array($sql_slt_usuario_res);
			if ($sql_slt_usuario_linhas["senha"] != $senha) {
				header("Location: ../index.php?mensagem=3");
			} else {
				session_start();
				$_SESSION["id_sessao"] = session_id();
				$_SESSION["usuario"] = $txtusuario;
				$_SESSION["senha"] = $senha;
				header("location:../admin.php");
			}
		} else {
			header("Location: ../index.php?mensagem=4");//FIXME definir erros
		}
	}
?>
