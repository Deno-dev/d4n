<?php
      include "conexao.php";

      $id = $_GET["id"];

      $sqlexcluir = $link->query("delete from servicos where idservicos = $id");

      if ($sqlexcluir == true) {
            echo "<script>";
                  echo "alert('Serviço excluído :/ Fique a vontade para marcar um novo :)');";
                  echo "javascript:window.location='cliente.php';";
            echo "</script>";
      }else{
            echo "<script>";
            echo "alert('Ops :c Algo deu errado, tente novamente ou contate o Administrador do Sistema');";
            echo "javascript:window.location='cliente.php";
            echo "</script>";
      }     
?>