<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imobiliaria";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
    die("Conexão falhou:".mysqli_connect_erro());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);
$categoria = mysqli_real_escape_string($conn,$_POST['categoria']);
$tipo = mysqli_real_escape_string($conn,$_POST['tipo']);
$preco = floatval($_POST['preco']);
$cep = mysqli_real_escape_string($conn, $_POST['cep']);
$uf = mysqli_real_escape_string($conn, $_POST['uf']);
$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
$logradouro = mysqli_real_escape_string($conn, $_POST['logradouro']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);
$complemento = mysqli_real_escape_string($conn, $_POST['complemento']);

$imagem = $_FILES['imagem']['name'];
$imagem_temp = $_FILES['imagem']['tmp_name'];
$imagem_destino = 'uploads/' . $imagem;

move_uploaded_file($imagem_temp, $imagem_destino);

$preco_formatado = number_format($preco, 2, '.', '');

$sql = "INSERT INTO imoveis (titulo, descricao, categoria, tipo, preco, cep, uf, cidade, bairro, logradouro, numero, complemento, imagem) 
VALUES ('$titulo', '$descricao', '$categoria', '$tipo', '$preco_formatado', '$cep', '$uf', '$cidade', '$bairro', '$logradouro', '$numero', '$complemento', '$imagem')";

if (mysqli_query($conn, $sql)) {
    echo "Imóvel cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
}
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Imóvel - Imobiliária SENAC</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Cadastrar Imóvel</h1>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="cadastrar.php">Cadastrar Imóvel</a></li>
                <li><a href="mostrar.php">Mostrar Imóveis</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form method="POST" enctype="multipart/form-data">

                <label for="titulo">Título do Anúncio:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="descricao">Descrição do Imóvel:</label>
                <textarea id="descricao" name="descricao" required></textarea>

                <label for="categoria">Tipo de Imóvel:</label>

                    <select id="categoria" name="categoria" required>
                        <option value="Casa">Casa</option>
                        <option value="Apartamento">Apartamento</option>
                        <option value="Terreno">Terreno</option>
                    </select>

                <label for="tipo">Tipo de Negócio:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="Venda">Venda</option>
                        <option value="Aluguel">Aluguel</option>
                    </select>

                <label for="preco">Preço do Imóvel:</label>
                <input type="number" id="preco" name="preco" min="0" step="0.01" required>

                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required>

                <label for="uf">UF:</label>
<select id="uf" name="uf" required>
    <option value="AC">AC</option>
    <option value="AL">AL</option>
    <option value="AP">AP</option>
    <option value="AM">AM</option>
    <option value="BA">BA</option>
    <option value="CE">CE</option>
    <option value="DF">DF</option>
    <option value="ES">ES</option>
    <option value="GO">GO</option>
    <option value="MA">MA</option>
    <option value="MT">MT</option>
    <option value="MS">MS</option>
    <option value="MG">MG</option>
    <option value="PA">PA</option>
    <option value="PB">PB</option>
    <option value="PR">PR</option>
    <option value="PE">PE</option>
    <option value="PI">PI</option>
    <option value="RJ">RJ</option>
    <option value="RN">RN</option>
    <option value="RS">RS</option>
    <option value="RO">RO</option>
    <option value="RR">RR</option>
    <option value="SC">SC</option>
    <option value="SP">SP</option>
    <option value="SE">SE</option>
    <option value="TO">TO</option>
</select>

                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required>

                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required>

                <label for="logradouro">Logradouro:</label>
                <input type="text" id="logradouro" name="logradouro" required>

                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required>

                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento">

                <label for="imagem">Imagem do Imóvel:</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">

                <button type="submit">Cadastrar Imóvel</button>

            </form>
        </section>
    </main>
</body>
</html>