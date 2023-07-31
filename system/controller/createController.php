<?php
session_start();

function create()
{
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_VALIDATE_INT);
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_VALIDATE_INT);

    if(empty($name)){
        $_SESSION['name'] = 'Preencha esse campo.';

        header('location: ../create.php');
    }
    if(empty($email)){
        $_SESSION['email'] = 'Preencha esse campo.';

        header('location: ../create.php');
    }
}


create();
