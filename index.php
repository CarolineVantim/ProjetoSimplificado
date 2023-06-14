<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Simplificado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="atividades">
        <h1>Atividades</h1>
    </div>
    <div class="container">
        <a class="btn btn-primary" href="criarTarefa.php" role="button">Criar tarefa</a>
    </div>
    <main>                                                                                                                            
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Nome</th>
                <th>Descricao</th>
                </tr>
            </thead>
            <tbody>
            <?php
                require_once ('Tarefa.php');
                    $tarefa = new Tarefa();
                    $tarefas = $tarefa->getAll();
                    foreach ($tarefas as $key){
                    $titulo = $key['titulo'];
                    $descricao = $key['descricao'];
                    echo "<tr>
                    <td>$titulo</td>
                    <td>$descricao</td>
                    </tr>";
                }
            ?>
            </tbody>
            </table>
    </main>
</body>
</html>