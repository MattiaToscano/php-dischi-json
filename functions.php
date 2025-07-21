<?php

$todos = file_get_contents('./todos.json');
$todo = json_decode($todos, true);
?>