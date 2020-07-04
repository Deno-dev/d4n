<?php
include("conexao.php");

$sql = $link->query("SELECT * from chat1");
while($dados = $sql->fetch_object()){
	echo "<div style='margin-left:40px;'>";
	echo "<h3>" . $dados->nome . "</h3>";
	echo $dados->mensagem;
	echo "</div>";
}
?>