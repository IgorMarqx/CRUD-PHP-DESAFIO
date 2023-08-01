<?php
session_start();
require_once '../model/DB.php';


function create()
{
    global $con;

    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_VALIDATE_INT);
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_VALIDATE_INT);

    if (!validate()) {
        header('location: ../view/create.php');
        return;
    } else {
        $sql = "INSERT INTO clientes (name, email, cpf, telephone, birthdate) VALUES (?,?,?,?,?)";
        $insert = $con->prepare($sql);
        $insert->bindParam(1, $name);
        $insert->bindParam(2, $email);
        $insert->bindParam(3, $cpf);
        $insert->bindParam(4, $telephone);
        $insert->bindParam(5, $birthdate);
        $insert->execute();

        $_SESSION['success'] = true;
        header('location: ../../');
    }
}

function validate()
{
    global $con;

    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_VALIDATE_INT);
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_VALIDATE_INT);

    $_SESSION['name_input'] = $name;
    $_SESSION['email_input'] = $email;
    $_SESSION['cpf_input'] = $cpf;
    $_SESSION['telephone_input'] = $telephone;
    $_SESSION['bithdate_input'] = $birthdate;

    if (empty($name) || empty($email) || empty($cpf) || empty($telephone) || empty($birthdate)) {
        if (empty($name)) {
            $_SESSION['name'] = 'Preencha esse campo.';
        }

        if (empty($email)) {
            $sql = "SELECT email FROM  clientes";

            $_SESSION['email'] = 'Campo vazio ou inválido.';
        }

        if (empty($cpf)) {
            $_SESSION['cpf'] = 'Campo vazio ou inválido.';
        }

        if (empty($telephone)) {
            $_SESSION['telephone'] = 'Campo vazio ou inválido.';
        }

        if (empty($birthdate)) {
            $_SESSION['birthdate'] = 'Campo vazio ou inválido.';
        }

        return false;
    }

    return true;
}


create();
