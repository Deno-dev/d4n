<?php 
	include "conexao.php";
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];

	$executa = "SELECT idusers, usuario, senha, tipo from users where usuario='$usuario' and senha='$senha'";
	$query = $link->query($executa);
	$resultado = $query->fetch_object();

	if (isset($resultado)){
		$tipo = $resultado->tipo;
		$id = $resultado->idusers;

		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['usuario'] = $usuario;
		$_SESSION['tipo'] = $tipo;

		if ($tipo=="adm") {
			header('location:adm.php');
		}else{
			header('location:cliente.php');
		}
	}else{
		echo "<script>
				alert('Usuário ou senha incorretos! Verifique as informações, em caso de necessidade contate o administrador do sistema!');";
		echo "javascript:window.location='login.php';
		    </script>";
	}
	$query->free();

 ?>