<?php 
	$nome = $_POST['nome'];					//importando dados do form
	$cpf = $_POST['cpf'];
	$nasc = $_POST['nasc'];
	$endereco = $_POST['endereco'];
	$plano = $_POST['plano'];
	$instalacao = $_POST['datains'];
	$datahoje = date("dmY"); //A senha padrão dos usuários é a data em que o cadastro foi feito
	include 'conexao.php'; //Importando conexão com o Banco

	//Inserindo o cliente na table clientes
   	$sqlclientes = $link->query("INSERT into clientes(nome, cpf, nasc, endereco, plano, instalacao) values('$nome',$cpf,'$nasc', '$endereco', '$plano', '$instalacao')");
   	if ($sqlclientes == true) {
   		$sqlconsultacliente = $link->query("SELECT * from clientes where cpf = '$cpf'");
   		$dados = $sqlconsultacliente->fetch_object();
   		$idcliente = $dados->idcliente;

   		$sqlusers = $link->query("INSERT into users(usuario, senha, tipo, idcliente) values($cpf, $datahoje, 'cliente', '$idcliente')");
   	//Inserindo o cliente na table de OS's
   		$sqlservico = $link->query("INSERT into servicos(data, cliente, cpf, endereco, plano, idcliente) values('$instalacao','$nome', '$cpf', '$endereco', '$plano', '$idcliente')");
   		if($sqlusers == true && $sqlservico){
   			echo "<script>";
   				echo "alert('Cadastro realizado com sucesso! Acesse sua conta com o CPF e a senha padrão :)');";
   				echo "javascript:window.location='login.php';";
   			echo "</script>";
   		}else{
   			echo "<script>alert('As you may see, somewhint went wrong!');</script>";
   		}
   	}else{
		echo "<script>alert('Ops! Algo deu errado, tente novamente ou contate o administrador do Sistema');</script>";   		
   	}
 ?>