<!DOCTYPE html>
<html>
<head>
    <title>Excluir Contato</title>
</head>
<body>
    <h1>Excluir Contato</h1>

    <?php
    include 'banco_de_dados.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        // Excluir o contato
        if (isset($bancoDeDados[$id])) {
            unset($bancoDeDados[$id]);
            header('Location: index.php');
        } else {
            echo 'Contato não encontrado.';
            exit;
        }
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

    <p>Tem certeza de que deseja excluir o contato: <?php echo $contato['nome']; ?>?</p>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Sim, Excluir">
    </form>
    <a href="index.php">Cancelar</a>
</body>
</html>
