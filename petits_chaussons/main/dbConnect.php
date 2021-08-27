<?php

$db_user = 'itsmehujo';
$db_pass = 'Zertzert112+';
$db_name = 'itsmehujo_kanban';
$db_host = 'postgresql-itsmehujo.alwaysdata.net';

$pdo = new PDO("pgsql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

?>