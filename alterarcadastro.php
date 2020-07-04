<?php 
	include 'conexao.php';
	session_start();
	
	$usuario = $_SESSION['usuario'];
	$id = $_SESSION['id'];

	$nnome = $_POST['nnome']; //endereço
	$nusuario = $_POST['nusuario'];       //plano
	$nsenha = $_POST['nsenha'];
	$ncpf = $_POST['ncpf'];	

	$sqlusers = $link->query("SELECT * FROM users where idusers = '$id'");
	$dadosusers = $sqlusers->fetch_object();
	$usersidcliente = $dadosusers->idcliente;

	$sqlclientes = $link->query("SELECT * FROM clientes where idcliente = '$usersidcliente'");
	$dadosclientes = $sqlclientes->fetch_object();
	$clientesidcliente = $dadosclientes->idcliente;

//--------------------------------------------------------------Inserindo no banco de dados o novo serviço
	$sqlalterarcadastro = $link->query("update clientes set nome = '$nnome', cpf = '$ncpf' where idcliente = '$clientesidcliente'");
	$sqlalterarusuario = $link->query("update users set usuario = '$nusuario', senha = '$nsenha' where idcliente = '$usersidcliente'");
	$sqlalteraservico = $link->query("update servicos set cliente = '$nnome' where idcliente = '$usersidcliente'");

//--------------------------------------------------------------Informando término da operação e redirecionando de volta a pagina de cliente

	if ($sqlalterarcadastro == true && $sqlalterarusuario) {
		echo "<script>
			alert('Cadastro alterado com sucesso com sucesso');";
		echo 	"javascript:window.location='cliente.php';";

		echo "</script>";
	}else{
		echo "<script>
			alert('Algo deu errado :/ Verifique as informações ou contate o Administrador do Sistema');";
		echo 	"javascript:window.location='cliente.php';";

		echo "</script>";
	}
?>