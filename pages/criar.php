<?php

    try {

        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];

        $pdo = new PDO("mysql:host=localhost;dbname=todo_list", "root", "");
        $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);

        $sql = $pdo->prepare("INSERT INTO `posts`('id', `titulo`, `texto`) VALUES (null, ':Barber', ':odkosdsjd')");
        
        $sql->bindValue(':Barber',$barber);
        $sql->bindValue('::odkosdsjd',$textarea);

        
        $sql->execute();
        
        // foreach ($sql as $key => $value) {
        //     echo $value['id']. $value['titulo'].' '.$value['texto'].'<br>';
        // }



    }catch(PDOException $e) {
        echo 'Erro: '.$e;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>criar lembrete</title>
    <link rel="stylesheet" href="../styles/criar.css" type="text/css">
</head>
<body>
    <form class="form" method="post">
        <h1>Preencha para salvar</h1>
        <label for="titulo">Título</label><br>
        <input class="titulo" name="titulo" type="text" required><br>
        <input class="texto" name="texto" type="text" required><br>
        <input class="button" type="submit">
    </form>
    
</body>
</html>