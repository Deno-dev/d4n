<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Chamando o ícone da guia -->
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-png"> 
	<!-- Chamando o css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Chamando o JavaScript -->
    <script type="text/javascript" src="js/javascript.js"></script>
	<title> Suanet - Cliente </title>
</head>
<body>
	<?php 
		session_start();
		if (!isset($_SESSION['tipo'])) {
			echo "<script>
				alert('Você precisa estar logado para acessar esta pagina!');";
			echo "javascript:window.location='login.php';
		    </script>";		
			die();
		}
		$iduser = $_SESSION['id'];
		$usuario =  $_SESSION['usuario'];
		$tipo = $_SESSION['tipo'];
		if ($tipo != "cliente") {
			echo "<script>
				alert('Você não tem permissão para entrar nessa pagina! Aparentemente tu é bem mais que isso amigao, faz favor hein');";
			echo "javascript:window.location='login.php';
		    </script>";		}
	?>
		<div class="navbar">
			<ul>
				<li><img src="images/user.png" width="50">
					<ul>
						<a href="chat.php" style="text-decoration: none; color: black;"><li>Chat</li></a>
                    	<a href="https://www.suanet.net.br" style="text-decoration: none; color: black;"><li>Site</li></a>
                    	<a href="login.php" style="text-decoration: none; color: black;"><li>Sair</li></a>
                	</ul>
            	</li>
            	<li>Como vai, <?php
            		include 'conexao.php';
            		    $sqlnome = $link->query("SELECT * FROM users where idusers like '%$iduser%'");

            			$dados = $sqlnome->fetch_object();

            			$idcliente = $dados->idcliente;

    					$sqlcliente = $link->query("SELECT * from clientes where idcliente = '$idcliente'");

    					$dadoscliente = $sqlcliente->fetch_object();

    					$usuarionome = $dadoscliente->nome;
            		if (is_string($usuario)) {
    					echo $usuarionome;
            		}else{
            			echo $usuario;
            		}
            	 ?>?</li>
				<?php 
					if ($tipo == "adm") {
						echo "<li><img src='images/logo-suanet.png' width='150' id='logo'></li>";
					}else{
						echo "<li><img src='images/logo-suanet.png' width='150' id='logo'></li>";
					}
				 ?>
			</ul>
		</div>
		<div class="container">
			<div class="cont-box">
				<div id="painel">
					<center>
						<?php 
							
							$plano = $dadoscliente->plano;

							switch ($plano) {
								case '75MB':
									echo "<img src='images/75.png' width='90' style='margin-top: 10px;''>" . "<br>";
									break;
								case '50MB':
									echo "<img src='images/50.png' width='90' style='margin-top: 10px;''>" . "<br>";
									break;
								case '15MB':
									echo "<img src='images/15.png' width='90' style='margin-top: 10px;''>" . "<br>";
									break;
							}
							echo "<br>";
							echo $usuarionome;
							echo "<br>";
							echo "CPF: " . $dadoscliente->cpf;
							echo "<br>";
							echo $dadoscliente->endereco . "<br>";
						?>
				<button class="btnp" onclick="abrirpop2()">Alterar Cadastro <img src="images/alterarc.png" width="20: background-color:white;"></button>
    		<div class="popup" id="popup2">
            	<form action="alterarcadastro.php" method="post" name="formalteracadastro" id="formalteracadastro">
            		<center><h2 style="color: black">Alterar Cadastro</h2></center>
                	<div>
                    	<input type="text" name="nnome" placeholder="Novo Nome" class="form-input" required="">
                	</div>
                	<div>
                    	<input type="text" name="nusuario" placeholder="Novo Usuário" class="form-input" required="">
                	</div>
                 	<div>
                    	<input type="text" name="nsenha" placeholder="Nova Senha" class="form-input" required="">
                	</div>
                	<div>
                    	<input type="text" name="ncpf" placeholder="Novo CPF" class="form-input" required="">
                	</div>
                	<div>
                    	<input type="button" value="Alterar" class="form-btn" onclick="enviaralteracadastro()">
                	</div>
                	<div>
                		<input type="button" value="Cancelar" class="form-btn" onclick="fechar2()">
                	</div>
               	</form>
			</div>
						<form name="formcriaservico" id="formcriaservico" method="POST" action="marcaservico.php">
							<h2>Marcar nova instalação</h2>
							<input type="text" name="npendereco" placeholder=" Endereço do serviço..." class="formservico" required>
							<br>
							<select class="formservico" name="npplano" required="">
								<option>15MB</option>
								<option>50MB</option>
								<option>75MB</option>
							</select>							<br>
							<input type="date" name="npdata" class="formservico" required="">
							<br>
							<input type="button" onclick="confirmservico()" value="Marcar" class="btnp">		
						</form>
					 <br>
					</center>
					<br>
		 
				</div>
				<div id="oss">
					<form name="formpesquisa" method="POST" action="cliente.php">
						<input class="pesquisa" placeholder="Pesquisar..."  type="text" name="pesquisa">
						<input type="image" src="images/pesquisa.png" width="30" class="pesquisab">
					</form>
					<div id="resultado">
						<?php
						include 'conexao.php'; 
							@$pesquisa = $_POST['pesquisa'];
							if ($pesquisa == '') {
								$sqlpesquisa = $link->query("SELECT * FROM servicos where idcliente like '%$idcliente%'");
								while($dados = $sqlpesquisa->fetch_object()){
    							echo "<div class='atendimento'>";        					
    							echo "<div class='alinhacrud'>";
    							echo $dados->cliente;
    							$id = $dados->idservicos;
    						?>
    						<!-- Execução da exclusão de um serviço pelo cliente -->
    						<a href='javascript:func()' style='text-decoration: none; margin-left:81%;'><img src='images/alterar.png' onclick="abrirpopup()"width='20'></img></a>

    						<a href='javascript:func()' style='text-decoration: none; margin-left:10px;' onclick="confirmacao(<?php echo $id;?>);"><img src='images/excluir.png' width='20'></img></a>

    		<div class="popup" id="popup">
            	<form action="alterar.php?id=<?php echo $id ?>" method="post" name="formalteraservico" id="formalteraservico">
            		<center><h2 style="color: black">Alterar serviço</h2></center>
                	<div>
                    	<input type="text" name="nendereco" placeholder="Novo Endereço" class="form-input" required="">
                	</div>
                	<div>
                    	<input type="date" name="ndata" placeholder="Nova Data" class="form-input" required="">
                	</div>
                	<div>
                		<select class='form-input' name="nplano">
                			<option>15MB</option>
                			<option>50MB</option>
                			<option>75MB</option>
                		</select>                    	
                	</div>
                	<div>
                    	<input type="button" value="Alterar" class="form-btn" onclick="enviaraltera()">
                	</div>
                	<div>
                		<input type="button" value="Cancelar" class="form-btn" onclick="fechar()">
                	</div>
               	</form>
			</div>

    						<?php
        						echo "</div>";
        						echo $dados->endereco;
        						echo "<br>";
        						echo $dados->plano;
        						echo "<br>";
        						echo $dados->data;
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
</body>
</html>