<?php

$cd = file_get_contents('todos.json');
$todos = json_decode($cd, true);

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
            <ul class="mb-2">
                 <?php
                   foreach ($todos as $todo) {
                       echo "<li class='list-group-item'>Titolo: {$todo['title']}, Autore: {$todo['author']}, Anno: {$todo['year']}, Genere: {$todo['genre']}</li>";
                   }
                ?>
            </ul>
            <form action="server.php" method="POST">
                <div class="form-control">
                    <input type="text" id="new-todo" name="new-todo">
                    <button type="submit"> Aggiungi Titolo </button>
                    <br>
                    <button type="submit"> Aggiungi Autore </button>
                    <br>
                    <button type="submit"> Aggiungi Anno </button>
                    <br>
                    <button type="submit"> Aggiungi Genere </button>
                </div>
            </form>


        </div>

    </div>
</body>
</html>