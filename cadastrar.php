<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imobiliaria";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
    die("Conexão falhou:".mysqli_connect_erro());
}

$titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
$descricao = mysqli_real_escape_string($conn,$_POST['descricao']);
$categoria = mysqli_real_escape_string($conn,$_POST['categoria']);
$tipo = mysqli_real_escape_string($conn,$_POST['tipo']);
$preco = mysqli_real_escape_string($conn,$_POST['preco']);

$sql = "INSERT INTO imoveis (titulo, descricao, categoria, tipo, preco) VALUES ('$titulo', '$descricao', '$categoria', '$tipo', '$preco')";

if (mysqli_query($conn,$sql)) {
    echo "Imóvel cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" .mysqli_error($conn);
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
            </ul>        
        </nav>
    </header>    
    <main>        
        <section>            
            <form method="POST">                
                <label for="titulo">Título do Anúncio:</label>                
                <input type="text" id="titulo" name="titulo" required>                                
                <label for="descricao">Descrição do Imóvel:</label>                
                <textarea id="descricao" name="descricao" required></textarea>                                
                <label for="categoria">Tipo de Imóvel:</label>                
                <select id="categoria" name="categoria" required>                    
                    <option value="casa">Casa</option>                    
                    <option value="apartamento">Apartamento</option>                    
                    <option value="terreno">Terreno</option>                
                </select>                                
                <label for="tipo">Tipo de Negócio:</label>                
                <select id="tipo" name="tipo" required>                    
                    <option value="venda">Venda</option>                    
                    <option value="aluguel">Aluguel</option>                
                </select>                                
                <label for="preco">Preço do Imóvel:</label>                
                <input type="number" id="preco" name="preco" required>                                
                <button type="submit">Cadastrar Imóvel</button>            
            </form>        
        </section>    
    </main>    
</body>
</html>