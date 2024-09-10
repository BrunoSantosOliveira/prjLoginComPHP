<?php
    include "conexao.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM tb_users WHERE id = $id";

        if($conn->query($sql) === TRUE){
            echo "Registro excluido com sucesso!";
        } else {
            echo "Erro ao excluir registro: " . $conn->error;
        }

        $conn->close();
        header("Location: adm.php");

    }
?>