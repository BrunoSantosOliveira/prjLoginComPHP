<?php
    include "conexao.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tb_users WHERE id = $id";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $lastName = $row['lastName'];
            $username = $row['username'];
        } else {
            echo "Usuário não encontrado!";
            exit();
        }
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];

    $sql = "UPDATE tb_users SET name='$name', email='$email', lastName='$lastName', username='$username' WHERE id=$id";

    if ($conn->query($sql) == TRUE){
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: adm.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar de Usuário</title>
    <link rel="stylesheet" href="update.css">-
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nome: <input type="text" name="name" value="<?php echo $name; ?>">
        Último Nome: <input type="text" name="lastName" value="<?php echo $lastName; ?>">
        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        Usuário: <input type="text" name="username" value="<?php echo $username; ?>">
        <input type="submit" value="Atualizar">
    </form>
    <a href="adm.php">Voltar</a>
</body>
</html>