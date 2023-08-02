<?php
function read()
{
    global $con;

    $sql = "SELECT * FROM clientes";
    $read = $con->prepare($sql);
    $read->execute();
    return $read->fetchAll(PDO::FETCH_ASSOC);
}

