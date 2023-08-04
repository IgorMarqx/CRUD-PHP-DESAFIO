<?php
require_once '../model/DB.php';
require_once '../repositorys/updateRepository.php';

function update($id)
{
    global $con;

    if (!$id) {
        $_SESSION['notFound_id'];

        header('location: ../../../');
    }

    $sql = 'SELECT * FROM clientes WHERE id = :id';
    $find = $con->prepare($sql);
    $find->bindValue(':id', $id);
    $find->execute();

    $data = $find->fetch(PDO::FETCH_ASSOC);

    return $data;
}
