<?php
      include "conexao.php";
      $nendereco = $_POST['nendereco'];
      $ndata = $_POST['ndata'];
      $nplano = $_POST['nplano'];
      $id = $_GET["id"];

      $sqlexcluir = $link->query("update servicos set endereco = '$nendereco', data = '$ndata', plano = '$nplano' where idservicos = '$id'");

      if ($sqlexcluir == true) {
            echo "<script>";
            echo "alert('Serviço alterado com sucesso!');";
            echo "javascript:window.location='cliente.php';";
            echo "</script>";
      }else{
            echo "<script>";
            echo "alert('Algo deu errado :/ Tente novamente ou contate o administrador do Sistema caso persita :c');";
            echo "javascript:window.location='cliente.php';";
            echo "</script>";
      }     
?>