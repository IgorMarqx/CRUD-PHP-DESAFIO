<?php
session_start();
require_once '../model/DB.php';

function destroy()
{
    global $con;

    $id = $_GET['id'];

    if(!$id){
        header('location: ../../');

        $_SESSION['notFound_id'];
    }

    $sql = 'DELETE FROM clientes WHERE id = :id';
    $delete = $con->prepare($sql);
    $delete->bindValue(':id', $id);
    $delete->execute();


    $_SESSION['success_id'];
    header('location: ../../');
}

destroy();
