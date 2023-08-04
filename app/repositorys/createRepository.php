<?php

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
        'birthdate' => $birthdate,
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