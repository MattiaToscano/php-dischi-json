<?php

$cd = file_get_contents('todos.json');
$todos = json_decode($cd, true);

// Controllo se la decodifica JSON è andata a buon fine
if ($todos === null) {
    $todos = [];
}

// Filtro per assicurarmi che ci siano solo oggetti validi
$todos = array_filter($todos, function($todo) {
    return is_array($todo) && isset($todo['title']) && isset($todo['author']) && isset($todo['year']) && isset($todo['genre']);
});

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <h1>
            Elenco dischi
        </h1>

        <hr>

        <div class="mb-3 py-3">
            <ul class="list-group mb-2">
                 <?php
                   foreach ($todos as $todo) {
                 ?>
                <li class="list-group-item">
                    <strong>Titolo:</strong> <?php echo $todo['title']; ?><br>
                    <strong>Autore:</strong> <?php echo $todo['author']; ?><br>
                    <strong>Anno:</strong> <?php echo $todo['year']; ?><br>
                    <strong>Genere:</strong> <?php echo $todo['genre']; ?>
                </li>
                <?php
                   }
                ?>
            </ul>
            
            <h3>Aggiungi nuovo disco</h3>
            <form action="server.php" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Autore:</label>
                    <input type="text" id="author" name="author" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Anno:</label>
                    <input type="text" id="year" name="year" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genere:</label>
                    <input type="text" id="genre" name="genre" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Aggiungi Disco</button>
            </form>


        </div>

    </div>
</body>
</html>