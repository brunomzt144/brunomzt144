<!DOCTYPE html>
<html>
<head>
    <title>Fechamento</title>
</head>
<body>
    <h1> Fchamento</h1>
    <ul>
        <?php
        require 'Produto.php'; 
        session_start();

        if (isset($_POST['fechar_carrinho'])) {
            $produtosNoCarrinho = $_SESSION['Carrinho'] ?? array();
            $produtos = $_SESSION['Produtos'] ?? array();

            foreach ($produtosNoCarrinho as $produtoIndex) {
                $produto = $produtos[$produtoIndex];
                echo "<li>";
                echo "<h2>" . $produto->nome . "</h2>";
                echo "<p>Descrição: " . $produto->descricao . "</p>";
                echo "<p>Preço: R$" . $produto->preco . "</p>";
                echo "<img src='" . $produto->caminhoImagem . "' alt='Imagem do Produto'>";
                echo "</li>";
            }
        } else {
            echo "<p>O carrinho está vazio.</p>";
        }
        ?>
    </ul>
</body>
</html>
