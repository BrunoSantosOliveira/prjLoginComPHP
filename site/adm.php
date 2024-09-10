<?php
include 'conexao.php';
$sql = "SELECT id, username, name, email, createdAt FROM tb_users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="adm.css">
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>

    <?php
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["createdAt"] . "</td>
                        <td>" .
                            "<a href='update.php?id=" . $row["id"] . "'>Editar </a>" .
                            "<a href='delete.php?id=" . $row["id"] . "'>Excluir</a>" .
                        "</td>
                    </tr>";
            }
        }else{
            echo "<tr><td colspan='6' id='ifNoRegister'>Nenhum registro encontrado</td></tr>";
        }
    ?>

    </table>
</body>
</html>