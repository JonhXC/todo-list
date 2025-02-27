<?php

    try {
        $id = 47;

        $pdo = new PDO ("mysql:host=localhost;dbname=todo_list","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $pdo->query("UPDATE `tarefas` SET `id`=null, `titulo`='Joao', `texto`='dsdsdsdsd' WHERE id=$id");
        $sql->execute();

    }catch (PDOException $e) {
        echo 'Erro: '.$e->getMessage();
    }


?>