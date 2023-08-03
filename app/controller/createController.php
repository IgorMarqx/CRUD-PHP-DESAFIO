<?php
session_start();
require_once '../model/DB.php';

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

function validate($name, $email, $cpf, $telephone, $birthdate)
{
    global $con;

    $_SESSION['name_input'] = $name;
    $_SESSION['email_input'] = $email;
    $_SESSION['cpf_input'] = $cpf;
    $_SESSION['telephone_input'] = $telephone;
    $_SESSION['bithdate_input'] = $birthdate;

    $emailValidate = $con->prepare('SELECT * FROM clientes WHERE email =  :email');
    $emailValidate->bindValue(':email', $email);
    $emailValidate->execute();

    if ($emailValidate->rowCount() > 0) {
        $_SESSION['errors']['email_exist'] = 'E-mail já existente.';
        header('location: ../../');
        return;
    }

    $cpfValidate = $con->prepare('SELECT * FROM clientes WHERE cpf = :cpf');
    $cpfValidate->bindValue(':cpf', $cpf);
    $cpfValidate->execute();

    if ($cpfValidate->rowCount() > 0) {
        $_SESSION['errors']['cpf_exist'] = 'CPF já existente.';
        header('location: ../../');
        return;
    }

    $validate = [
        'name' => $name,
        'email' => $email,
        'cpf' => $cpf,
        'telephone' => $telephone,
    ];

    $errors = [];

    foreach ($validate as $key => $value) {
        if (empty($value)) {
            $errors[$key] = 'Campo obrigatório.';
        }
    }

    $_SESSION['errors'] = $errors;

    if (strlen($telephone) < 14) {
        $_SESSION['errors']['telephone'] = 'Número inválido.';
        return false;
    }

    if (strlen($cpf) < 14) {
        $_SESSION['errors']['cpf'] = 'CPF inválido.';
        return false;
    }

    $oldBirth = explode('/', $birthdate);

    if ($birthdate < 10) {
        $_SESSION['errors']['birthdate'] = 'Data inválida.';
        return false;
    } else {
        $day = $oldBirth[0];
        $month = $oldBirth[1];
        $year = $oldBirth[2];

        $validateDate = checkdate($month, $day, $year);

        if ($validateDate == false) {
            $_SESSION['errors']['birthdate'] = 'Data inválida.';
            return false;
        }
    }

    return count($errors) === 0;
}


create();
