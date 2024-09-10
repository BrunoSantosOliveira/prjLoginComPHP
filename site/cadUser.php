<?php
    session_start();
    include "conexao.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $vUsername = $_POST['vUsername'];
        $password = $_POST['password'];

        $sql = "INSERT INTO tb_users(username, name, lastName, password, email) VALUES('$vUsername', '$name', '$lastName', '$password', '$email')";

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro - LOJA</title>
    <link rel="stylesheet" href="cadStyle.css">
</head>
<body>
    <div class="mainContent">
        <div class="beautySpace">
            <h1>&starf; GalaxyStars &starf;</h1>
            <pre>Venha conhecer as melhores coisas
presentes na galáxia entre sóis,
planetas, galáxias, estrelas e
etc.</pre>
            <div class="msgPhpSuccesfully">
                <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if ($conn->query($sql) === TRUE) {
                        echo "Novo registro criado com sucesso";
                    }else {
                        echo "Erro! " . $sql . "<br>" . $conn->error;
                    }
                }
                $conn->close();
                ?>
            </div>
            <div class="btnVoltarIndex">
                <a href="index.php"><input type="button" value="VOLTAR" id="btnVoltarIndex"></a>
            </div>
        </div>

        <div class="content">
            <h1>Cadastre-Se</h1>
            <form action="cadUser.php" method="post">
                <div class="divForm">
                    <div class="alinhamento2">
                        <div class="alinhamento1">Nome: <input type="text" name="name" id="entNome"></div> 
                        <div class="alinhamento1">Sobrenome: <input type="text" name="lastName" id="entLastName"></div>
                    </div>

                    E-Mail: <input type="text" name="email" id="entEmail">

                    <div class="alinhamento2">
                        <div class="alinhamento1">Nome de usuário: <input type="text" name="vUsername" id="entUsername"></div> 
                        <div class="alinhamento1" id="divPassword">Senha: <input type="password" name="password" id="entPassword"></div>
                    </div>
                </div>

                <input type="submit" value="CADASTRAR" id="btnSubmit">
            </form>
        </div>
    </div>
</body>
</html>