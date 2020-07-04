<?php 
	session_start();
	include 'conexao.php';
	$usuario = $_SESSION['usuario']; //puxando o usuário da sessão para inserção no banco com CPF
	$id = $_SESSION['id'];


	$sqlid = $link->query("SELECT * FROM users where idusers like '%$id%'");

    $dados = $sqlid->fetch_object();

    $usersidcliente = $dados->idcliente;

    $sqlcliente = $link->query("SELECT * from clientes where idcliente = '$usersidcliente'");

    $dadoscliente = $sqlcliente->fetch_object();
	
	$clienteidcliente = $dadoscliente->idcliente;

	$nome = $dadoscliente->nome;

	$cpf = $dadoscliente->cpf;


	$npendereco = $_POST['npendereco']; //endereço
	$npplano = $_POST['npplano'];       //plano
	$npdata = $_POST['npdata'];			//data do novo serviço

//--------------------------------------------------------------Inserindo no banco de dados o novo serviço
	$sqlnovoservico = $link->query("INSERT into servicos(data, cliente, cpf, endereco, plano, idcliente) values('$npdata','$nome', '$cpf', '$npendereco', '$npplano' , '$clienteidcliente')");

//--------------------------------------------------------------Informando término da operação e redirecionando de volta a pagina de cliente

	if ($sqlnovoservico == true) {
		echo "<script>
			alert('Novo serviço marcado com sucesso');";
		echo 	"javascript:window.location='cliente.php';";

		echo "</script>";
	}else{
		echo "<script>
			alert('Algo deu errado :/ Verifique as informações ou contate o Administrador do Sistema');";
		//echo 	"javascript:window.location='cliente.php';";

		echo "</script>";
	}
?>