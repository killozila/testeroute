<?php
    // Verifica se os dados do formulário foram enviados
    if(isset($_POST['nome'], $_POST['cpf'], $_POST['celular'], $_POST['nascimento'])) {
        // Obtém os dados do formulário
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $celular = $_POST['celular'];
        $nascimento = $_POST['nascimento'];

        // Conexão com o banco de dados
        $conn = new mysqli('localhost', 'root', '', 'routeform');
        // Verifica a conexão
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            // Prepara a consulta SQL para inserir os dados no banco de dados
            $stmt = $conn->prepare("INSERT INTO registration (nome, cpf, celular, nascimento) VALUES (?, ?, ?, ?)");
            // Verifica se a consulta foi preparada com sucesso
            if($stmt) {
                // Liga os parâmetros da consulta aos valores das variáveis
                $stmt->bind_param("ssss", $nome, $cpf, $celular, $nascimento);
                // Executa a consulta
                if($stmt->execute()) {
                    echo "Registration successful!";
                } else {
                    echo "Error: " . $stmt->error;
                }
                // Fecha a consulta
                $stmt->close();
            } else {
                echo "Error: Unable to prepare statement.";
            }
            // Fecha a conexão com o banco de dados
            $conn->close();
        }
    } else {
        echo "Error: Form data not received.";
    }
?>
