<!DOCTYPE html>
<html>
<head>
    <title>Pesquisar Contatos</title>
</head>
<body>
    <h1>Pesquisar Contatos</h1>

    <?php
    include 'banco_de_dados.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $termo = $_POST['termo'];
        $resultados = [];

        // Pesquisar contatos que contenham o termo
        foreach ($bancoDeDados as $id => $contato) {
            if (stripos($contato['nome'], $termo) !== false || stripos($contato['email'], $termo) !== false) {
                $resultados[$id] = $contato;
            }
        }

        if (empty($resultados)) {
            echo 'Nenhum resultado encontrado.';
        } else {
            echo '<h2>Resultados da pesquisa:</h2>';
            echo '<ul>';
            foreach ($resultados as $id => $contato) {
                echo '<li>' . $contato['nome'] . ' - ' . $contato['email'] . '</li>';
            }
            echo '</ul>';
        }
    }
    ?>

    <h2>Realizar Pesquisa:</h2>
    <form method="post">
        Pesquisar: <input type="text" name="termo">
        <input type="submit" value="Pesquisar">
    </form>
    <a href="index.php">Voltar para a página inicial</a>
</body>
</html>
