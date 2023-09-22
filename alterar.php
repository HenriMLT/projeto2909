<!DOCTYPE html>
<html>
<head>
    <title>Alterar Contato</title>
</head>
<body>
    <h1>Alterar Contato</h1>

    <?php
    include 'banco_de_dados.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Atualizar os dados do contato
        $bancoDeDados[$id] = ['nome' => $nome, 'email' => $email];

        // Redirecionar para a página principal
        header('Location: index.php');
    } else {
        $id = $_GET['id'];
        if (isset($bancoDeDados[$id])) {
            $contato = $bancoDeDados[$id];
        } else {
            echo 'Contato não encontrado.';
            exit;
        }
    }
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $contato['nome']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $contato['email']; ?>"><br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
