<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imobiliaria";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql = "SELECT * FROM imoveis";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imóveis Cadastrados - Imobiliária SENAC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Imóveis Cadastrados</h1>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cadastrar.php">Cadastrar Imóvel</a></li>
                <li><a href="mostrar.php">Mostrar Imóveis</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="featured">
            <h2>Imóveis Cadastrados</h2>
            <div class="featured-properties">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="property">';
                        echo '<img src="uploads/' . $row['imagem'] . '" alt="Imagem do Imóvel">';
                        echo '<h3>' . $row['titulo'] . '</h3>';
                        echo '<h3>' . $row['bairro'] . ', ' . $row['cidade'] . ' - ' . $row['uf'] . '</h3>';
                        echo '<p>' . $row['descricao'] . '</p>';
                        echo '<h3>' . ' R$ ' . $row['preco'] . ' | ' . $row['tipo'] . '</h3>';
                        echo '</div>';
                    }
                } else {
                    echo "Nenhum imóvel cadastrado.";
                }
                ?>
            </div>
        </section>
    </main>
</body>
</html>