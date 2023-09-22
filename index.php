<!DOCTYPE html>
<html>
<head>
    <title>Gerenciador de Contatos</title>
</head>
<body>
    <h1>Gerenciador de Contatos</h1>

    <?php
    include 'banco_de_dados.php';

    // Função para listar todos os contatos
    function listarContatos() {
        global $bancoDeDados;
        echo '<h2>Contatos:</h2>';
        echo '<ul>';
        foreach ($bancoDeDados as $id => $contato) {
            echo '<li>' . $contato['nome'] . ' - ' . $contato['email'] . ' [<a href="alterar.php?id=' . $id . '">Alterar</a>] [<a href="excluir.php?id=' . $id . '">Excluir</a>]</li>';
        }
        echo '</ul>';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica se o formulário foi enviado
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Adicionar um novo contato
        $novoId = count($bancoDeDados) + 1;
        $bancoDeDados[$novoId] = ['nome' => $nome, 'email' => $email];

        // Redirecionar para a página principal
        header('Location: index.php');
    }
    ?>
<h2>Inserir Novo Contato:</h2>
    <form method="post">
        Nome: <input type="text" name="nome"><br>
        Email: <input type="email" name="email"><br>
        <input type="submit" value="Inserir">
    </form>

    <?php
    listarContatos();
    ?>

</body>
</html>
