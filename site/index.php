<?php
    session_start();
    include "conexao.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $conn->query("SELECT * FROM tb_users WHERE email = '$email'");

        if($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            if($password == $row['password'])
            {
                if($row['id'] == 1){
                    session_start();
                    $_SESSION['user'] = $row['nome'];
                    header("Location: adm.php");
                    exit();
                } else{
                    session_start();
                    $_SESSION['user'] = $row['nome'];
                    header("Location: /user.php");
                    exit();
                }
            } else{
                header("Location: index.php?error=" . urlencode("Senha Incorreta!"));
                exit();
            }
        } else {
            header("Location: index.php?error=" . urlencode("Usuário não encontrado com este email!"));
            exit();
        }
    $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login - LOJA</title>
    <link rel="stylesheet" href="style.css">

    <script>
        window.onload = function() {
            var message = "<?php echo isset($_GET['message']) ? $_GET['message'] : ''; ?>";
            if (message) {
                alert(message);
            }
        };
    </script>
    
</head>
<body>
    <div class="mainContent">
        <div class="beautySpace">
            <h1>Bem-Vindo!</h1>
            <h3>Realize log-in para entrar no nosso site.</h3>
            <pre>Caso ainda não tenha seu cadastro em nosso site,
clique no botão abaixo, preencha os campos com
seus dados e "SALVE" para que você possa 
realizar seu log-in.</pre>
            <a href="cadUser.php"><button id="btnCadastrar">Cadastrar-Se</button></a>
        </div>

        <div class="content">
            <h1>Log-In</h1>
            <form action="index.php" method="post">
                <h3>E-Mail:</h3><input type="text" name="email" id="entEmail">
                <h3>Senha:</h3><input type="password" name="password" id="entPassword">
                <input type="submit" value="Entrar" id="btnSubmit">
            </form>
        </div>
    </div>
</body>
</html>