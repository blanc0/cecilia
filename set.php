<?php
ini_set('display_errors','On');
$db_name='doesnt_exist';
$m = new Mongo();
$db = $m->$db_name;

// database "doesnt_exist" is created.


var_dump($db);