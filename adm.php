<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-png">
    <meta charset="utf-8">
		<title> SuaNET - ADM</title>
		<link rel="stylesheet" type="" pe="text/css" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
		<script type="text/javascript" src="js/javascript.js">
			
		</script>
	</head>
	<body>
		<?php 
		session_start();
		if (!isset($_SESSION['tipo'])) {
			echo "<script>
			alert('Ok, vamos fingir que você não tentou acessar uma página que não deveria, ok? Acesse com sua conta e vamos tentar novamente ;)');";
			echo "javascript:window.location='login.php';</script>";
			die();
		}
		$usuario =  $_SESSION['usuario'];
		$tipo = $_SESSION['tipo'];
		if ($tipo != "adm") {
			echo "<script>
			alert('Você não tem acesso a esta pagina!');";
			echo "javascript:window.location='cliente.php';</script>";
		}
		 ?>
		<div class="navbar">
			<ul>
				<li><img src="images/user.png" width="50">
					<ul>
                    	<a href="chat.php" style="text-decoration: none; color: black;"><li>Chat Logados</li></a>
                    	<a href="chat2.php" style="text-decoration: none; color: black;"><li>Chat Não logados</li></a>
                    	<a href="login.php" style="text-decoration: none; color: black;"><li>Sair</li></a>
                	</ul>
            	</li>
				<li>Como vai, <?php echo $usuario; ?>?</li>
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
				<div id="painel">
					<center>
					 <img src="images/favicon.png" width="90" style="margin-top: 10px;">
					 <br>
					</center>
					<br>
					<?php 
						include 'conexao.php';
   							$resultado = $link->query("SELECT * FROM clientes");
    						$clientes = $resultado->num_rows;
    						echo "Total de clientes: " . $clientes;
    						$resultado->close();
    						echo "<br>";
    						echo "<br>";
    						$rendimento = $clientes*150;
    						echo "Rendimento Previsto: R$$rendimento";
    						echo "<br>";
    						echo "<br>";
    						$resultado2 = $link->query("SELECT * FROM servicos");
    						$oss = $resultado2->num_rows;
    						$resultado2->close();
    						echo "Ordens de Serviço agendadas: $oss";
					?>
					<button class="btnp" onclick="href()">Chat Logados</button>
					<button class="btnp" onclick="href2()">Chat Não Logados</button>
				</div>
				<div id="oss">
					<form name="formpesquisa" method="POST" action="adm.php">
						<input class="pesquisa" placeholder="Pesquisar..."  type="text" name="pesquisa">
						<input type="image" src="images/pesquisa.png" width="30" class="pesquisab" onclick="ajax()">
					</form>
					<div id="resultado">
						<?php
						include 'conexao.php'; 
							@$pesquisa = $_POST['pesquisa'];
							if ($pesquisa == '') {
								$sqlpesquisa = $link->query("SELECT * FROM clientes");
								while($dados = $sqlpesquisa->fetch_object()){
    							echo "<div class='atendimento'>";        					
        						echo $dados->nome;
        						echo "<br>";
        						echo $dados->endereco;
        						echo "<br>";
        						echo $dados->plano;
        						echo "<br>";
        						echo $dados->instalacao;
        						echo "</div>";
    							}
							}else{
								$sqlpesquisa = $link->query("SELECT * FROM clientes where nome like '%$pesquisa%'");
								while($dados = $sqlpesquisa->fetch_object()){
    							echo "<div class='atendimento'>";        					
        						echo $dados->nome;
        						echo "<br>";
        						echo $dados->endereco;
        						echo "<br>";
        						echo $dados->plano;
        						echo "<br>";
        						echo $dados->instalacao;
        						echo "</div>";
    							}
							}
						 ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>	