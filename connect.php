<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verifica se o campo "nome" está presente no formulário
    if (isset($_POST["nome"])) {
        
        // Obtém o valor do campo "nome"
        $nome = $_POST["nome"];
        
        // Exibe o valor do campo "nome"
        echo "O nome inserido foi: " . $nome;
        
        // Aqui você pode fazer o que quiser com o valor do campo "nome", como inseri-lo no banco de dados
        
		// Configurações do banco de dados
		$host = "localhost"; // Host do banco de dados (geralmente localhost)
		$dbname = "routeform"; // Nome do banco de dados
		$username = "root"; // Nome de usuário do banco de dados
		$password = ""; // Senha do banco de dados
        
        try {
            // Conectando ao banco de dados utilizando PDO
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            
            // Definindo o modo de erro do PDO para exceções
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Definindo o charset para UTF-8
            $pdo->exec("SET NAMES utf8");
            
            // Aqui você pode inserir o valor do campo "nome" no banco de dados
            // Por exemplo:
            // $stmt = $pdo->prepare("INSERT INTO sua_tabela (nome) VALUES (:nome)");
            // $stmt->bindParam(':nome', $nome);
            // $stmt->execute();
            
            // Exibindo mensagem de sucesso
            echo "<br>Registro inserido no banco de dados com sucesso!";
            
        } catch (PDOException $e) {
            // Caso ocorra algum erro na conexão ou na inserção dos dados no banco de dados, exibe a mensagem de erro
            echo "<br>Erro de conexão ou inserção no banco de dados: " . $e->getMessage();
        }
    } else {
        // Caso o campo "nome" não esteja presente no formulário, exibe uma mensagem de erro
        echo "Campo 'nome' não encontrado no formulário!";
    }
} else {
    // Caso o formulário não tenha sido enviado, exibe uma mensagem de erro
    echo "O formulário não foi enviado!";
}
?>
