<?php
require 'Produto.php';
session_start();


if (!isset($_SESSION['Produtos'])) {
    $produtos = array(
        new Produto("Produto 1", 10.99, "Descrição do Produto 1", "imagem1.jpg"),
        new Produto("Produto 2", 20.99, "Descrição do Produto 2", "imagem2.jpg"),
        new Produto("Produto 3", 30.99, "Descrição do Produto 3", "imagem3.jpg"),
        new Produto("Produto 4", 40.99, "Descrição do Produto 4", "imagem4.jpg")
    );


    $_SESSION['Produtos'] = $produtos;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        if (isset($_POST['selecionado']) && is_array($_POST['selecionado'])) {
            $_SESSION['Carrinho'] = array_merge($_SESSION['Carrinho'], $_POST['selecionado']);
        }
    } elseif (isset($_POST['enviar_carrinho'])) {
        header("Location: Carrinho.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <form method="post">
        <div>
            <?php
            $produtos = $_SESSION['Produtos'];
            foreach ($produtos as $key => $produto) {
                echo "<div>";
                echo "<h2>" . $produto->nome . "</h2>";
                echo "<p>Descrição: " . $produto->descricao . "</p>";
                echo "<p>Preço: R$" . $produto->preco . "</p>";
                echo "<img src='" . $produto->caminhoImagem . "' alt='Imagem do Produto'>";
                echo "<input type='checkbox' name='selecionado[]' value='$key'> Selecionar";
                echo "<button type='submit' name='adicionar'>Adicionar ao Carrinho</button>";
                echo "</div>";
            }
            ?>
        </div>
        <button type="submit" name="enviar_carrinho">Enviar Carrinho</button>
    </form>
</body>
</html>
