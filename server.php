<?php

//leggere il file dei todo e salviamoli in una variabile
$json_text = file_get_contents('./todos.json');
//echo $json_text;


//convertiamo la stringa da formato json a struttura dati php

$todos = json_decode($json_text, true);
//var_dump($todos);

//modifichiamo questa struttura dati
//Inserire il nuovo todo nel file
if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['year']) && isset($_POST['genre'])) {
    $todos[] =  [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'year' => $_POST['year'],
        'genre' => $_POST['genre'],
    ];
}
//var_dump($todos);


//riconvertiamo la struttura dati php in stringa json
$json_text_updated = json_encode($todos);
//var_dump($json_text_updated);


//sovrascriviamo il contenuto del file .json
file_put_contents('./todos.json', $json_text_updated);


// reindirizzare l'utente alla index
header('Location: ./index.php');

?>