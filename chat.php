<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-png">
    <meta charset="utf-8">
		<title> SuaNET - ADM</title>
		<link rel="stylesheet" type="" pe="text/css" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/javascript.js">
			
		</script>
			<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
						document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'processachat.php', true);
			req.send();
		}
		session_startnterval(function(){ajax();}, 100); 
		window.scrollTo(0, 1000);
	</script>
	</head>
	<body onload="ajax();">
		<?php 
		session_start();
		if (!isset($_SESSION['tipo'])) {
			echo "<script>
			alert('Ok, vamos fingir que você não tentou acessar uma página que não deveria, ok? Acesse com sua conta e vamos tentar novamente ;)');";
			echo "javascript:window.location='cliente.php';</script>";
			die();
		}
		$id = $_SESSION['id'];
		$usuario =  $_SESSION['usuario'];
		$tipo = $_SESSION['tipo'];
		include 'conexao.php';
		$sqlnome = $link->query("SELECT * FROM users where idusers like '%$id%'");

        $dados = $sqlnome->fetch_object();

        $idcliente = $dados->idcliente;

    	$sqlcliente = $link->query("SELECT * from clientes where idcliente = '$idcliente'");

    	$dadoscliente = $sqlcliente->fetch_object();

    	@$usuarionome = $dadoscliente->nome;

		 ?>
		<div class="navbar">
			<ul>
				<li><img src="images/user.png" width="50">
					<ul>
                    	<a href="chat2.php" style="text-decoration: none; color: black;"><li>Chat Não logados</li></a>
                    	<a href="login.php" style="text-decoration: none; color: black;"><li>Sair</li></a>
                	</ul>
            	</li>
				<li>Como vai, <?php echo $usuarionome; ?>?</li>
				<?php 
					if ($tipo == "adm") {
						echo "<li><a href='adm.php'><img src='images/logo-suanet.png' width='150' id='logo'></a></li>";
					}else{
						echo "<li><a href='cliente.php'><img src='images/logo-suanet.png' width='150' id='logo'></a></li>";
					}
				 ?>
			</ul>
		</div>
		<div class="container">
			<div class="cont-box">
				<div class="chatcont">
					<div id="chat">
						
					</div>
					<div>
						<form method="post" action="chat.php">
							<input type="text" style="height:25px;border-radius: 5px;width: 87%;" name="mensagem">
							<input type="image" src="images/enviar.png" width="40" style="float: right; margin-right: 40px">
								<?php
									include("conexao.php");
									@$mensagem = $_POST['mensagem'];
									if ($mensagem != '') {
										if ($tipo == 'adm') {
											$sql = $link->query("INSERT INTO chat1 SET nome= '$usuario', mensagem= '$mensagem'");
										}else{
											$sql = $link->query("INSERT INTO chat1 SET nome= '$usuarionome', mensagem= '$mensagem'");
										}
									}
								?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>	