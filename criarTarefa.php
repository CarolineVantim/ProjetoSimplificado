<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['titulo'] != "" && $_POST['descricao'] != "" && $_POST['data_finish'] != "" && $_POST['usuarioId'] !="")  { 
       require_once('Tarefa.php');
       $tarefas = new Tarefa();
       $tarefas->cadastrarTarefa($_POST['titulo'], $_POST['descricao'], $_POST['data_finish'], $_POST['usuarioId']);
       header("location: index.php");
    }
}

require_once ('Usuario.php');
$usuario = new Usuario();
$usuarios = $usuario->getUsuario();
  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="atividades">
        <h1>Criar tarefa</h1>
    </div>
    <main class="formulario">
        <form action="criarTarefa.php" method="post">
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control">
            </div>
            <div class="mb-6">
                <label for="" class="form-label">Descrição</label>
                <input type="text" id="descricao" name="descricao" class="form-control">
            </div>
            <div class="mb-9">
                <label for="" class="form-label">Data fim</label>
                <input type="date" id="data_finish"  name="data_finish" class="form-control">
            </div>
            <div class="mb-12">
                <label for="disabledSelect" class="form-label">Selecione o usuário</label>
                <select class="form-select" name="usuarioId" aria-label="Default select example">
                    <?php foreach ($usuarios as $user): ?>
                        <option value="<?php echo $user['id']; ?>"><?php echo $user['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </main>
</body>
</html>