<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-png">
    <meta charset="utf-8">
		<title> SuaNET - Bem vindo!	</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/javascript.js">

		</script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
						document.getElementById('chat2').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'processachat2.php', true);
			req.send();
		}
		session_startnterval(function(){ajax();}, 1000); 
		window.scrollTo(0, 1000);
	</script>
	</head>
	<body onload="ajax()">
		<div class="navbar">
			<ul>
				<li><img src="images/user.png" width="50">
					<ul>
                    	<a href="login.php" style="text-decoration: none; color: black;"><li>Entrar</li></a>
                	</ul>
            	</li>
				<li> Clique aqui para entrar!</li>
				<li><img src="images/logo-suanet.png" width="150" id="logo">
				</li>
			</ul>
		</div>
		<div class="container">
			<div class="cont-box">
				<div id="chatbox">
					<div id="chat2">

					</div>
					<?php
									include("conexao.php");
									@$mensagem = $_POST['mensagem'];
									if ($mensagem != '') {
											$sql = $link->query("INSERT INTO chat2 SET nome= 'Cliente', mensagem= '$mensagem'");
									}

								?>
					<form method="post" action="index.php">
						<input type="text" style="height:25px;border-radius: 5px;width: 87%;" name="mensagem">
						<input type="image" src="images/enviar.png" width="40" style="float: right;">
					</form>
				</div>
				<div id="cadastroform">
					<form class="form" name="formcadastro" id="formcadastro" method="post" action="cadastro.php">	
						<input type="text" name="nome" placeholder="  Nome Completo" size='100' style=" padding: 5px; height: 25px; margin-bottom: 20px;" required="">
						<div class="doubleput">
							<input type="text" name="cpf" size="50" placeholder=" CPF" minlength='11' maxlength="14" style=" padding: 5px; height: 25px;" required="">
							Nascimento:
							<input type="date" name="nasc" placeholder=" nascimento" required="" style="width: 250px">
						</div>
						<br>
						<input type="text" name="endereco" placeholder="Endereço" size="100" style="height: 25px; margin-bottom: 20px;" required="">
						<br>
						<div class="doubleput">
							<select style="width: 374px; border-radius: 9px; border: 1px solid black" name="plano">
								<option>15MB</option>
								<option>50MB</option>
								<option>75MB</option>
							</select>
							Data Instalação:<?php $min = date("Y-m-d", strtotime("+2 day")); $atual = date("Y-m-d");
							?>
							<input type="date" min="<?php echo $min;?>" name="datains" required="" style="width: 250px" value="<?php echo $atual;?>">
							*Atente-se a colocar uma data válida, por favor!
						</div>
						<input type="button" value="Marcar" style="width: 100px; height: 40px; background-color: #003471; color: white;" onclick="validacadastro()">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>	