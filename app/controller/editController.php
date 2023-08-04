<?php
require_once '../model/DB.php';
require_once '../repositorys/updateRepository.php';

function edit()
{
    global $con;

    $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_DEFAULT);
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_DEFAULT);

    $oldBirth = explode('/',   $birthdate);
    $newBirth = implode('-', array_reverse($oldBirth));

    if (!validate($name, $email, $cpf, $telephone, $birthdate)) {
        header('Location: ../view/update.php?=' . $id);
        return;
    } else {
        $sql = "UPDATE clientes SET  name = :name, email = :email, cpf = :cpf, telephone = :telephone, birthdate = :birthdate";
        $update = $con->prepare($sql);
        $update->bindValue('name', $name);
        $update->bindValue('email', $email);
        $update->bindValue('cpf', $cpf);
        $update->bindValue('telephone', $telephone);
        $update->bindValue('birthdate', $newBirth);
        $update->execute();

        header('location: ../../index.php');
    }
}

edit();
