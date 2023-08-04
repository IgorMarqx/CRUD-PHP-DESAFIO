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

function edit()
{
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_DEFAULT);
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_DEFAULT);

    if(validate($name, $email, $cpf, $telephone, $birthdate)){
    }else{
        header('location: ../view/update.php');
        return;
    }

}


