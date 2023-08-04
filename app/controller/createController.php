<?php
session_start();
require_once '../model/DB.php';
require_once '../repositorys/createRepository.php';

function create()
{
    global $con;

    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_DEFAULT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_DEFAULT);
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_DEFAULT);

    $oldBirth = explode('/', $birthdate);
    $newBirth = implode('-', array_reverse($oldBirth));

    if (!validate($name, $email, $cpf, $telephone, $birthdate)) {
        header('location: ../view/create.php');
        return;
    } else {
        $sql = "INSERT INTO clientes (name, email, cpf, telephone, birthdate) VALUES (?,?,?,?,?)";
        $insert = $con->prepare($sql);
        $insert->bindParam(1, $name);
        $insert->bindParam(2, $email);
        $insert->bindParam(3, $cpf);
        $insert->bindParam(4, $telephone);
        $insert->bindParam(5, $newBirth);
        $insert->execute();

        $_SESSION['success'] = true;
        header('location: ../../');
    }

    unset($_SESSION['name_input']);
    unset($_SESSION['email_input']);
    unset($_SESSION['cpf_input']);
    unset($_SESSION['telephone_input']);
    unset($_SESSION['bithdate_input']);
}

create();
