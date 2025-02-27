<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['titulo']) && isset($_POST['texto'])) {
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=todo_list","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $pdo->prepare("INSERT INTO tarefas (id, titulo, texto) VALUES (null, :titulo, :texto)");
                $sql->execute(['titulo' => $titulo, 'texto'=>$texto]);
                $sql = null;
                
                 // Redirecionar para a mesma página via GET(Impede o reenvio de dados repetidos apos recarregamento de pag)
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;

            }catch (PDOException $e) {
                echo 'Erro: '.$e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar anotação</title>
    <link rel="stylesheet" href="./../styles/criar.css" type="text/css">
</head>
<body>
    <div class="body">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form" method="post">
            <input class="form-titulo" name="titulo" type="text" required><br>
            <input class="form-texto" name="texto" type="text" required><br>
            <input class="form-button" name="button" type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>