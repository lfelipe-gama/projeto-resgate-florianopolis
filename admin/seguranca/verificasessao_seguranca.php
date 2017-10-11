<?php
#===					 ===#
#=== CRIAÇÃO DAS SESSÕES ===#
#===					 ===#
	
	session_start();

	if (!isset($_SESSION["id_sessao"]) || !isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
		unset($_SESSION["id_sessao"]);
		header("Location: ../index.php?erro");
		exit();
	} elseif ($_SESSION["id_sessao"] != session_id()) {
		unset($_SESSION["id_sessao"]);
		header("Location: ../index.php?erro");
		exit();
	}
?>