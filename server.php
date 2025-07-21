<?php

// leggere il file .json in modo da mostrare
// i to do in pagina

// dobbiamo poter leggere un file presente sul server
$json_text = file_get_contents('./todos.json');
// var_dump($file);

// Salvo la struttura dati presente nel file tradotta dal json in un array
$todos = json_decode($json_text);

// var_dump($todos);

?>