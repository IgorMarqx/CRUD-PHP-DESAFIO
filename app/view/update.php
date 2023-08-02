<?php
session_start();
include_once('../../partials/app.php');
include_once('../controller/updateController.php');

$id = intval($_GET['id']);

$updateId = update($id);
?>

<div class="container mt-2 mb-4">
    <a class="btn btn-danger" href="../../../" role="button">Voltar</a>
</div>

<div class="outForm">
    <div class="container">
        <form class="row" method="POST" action="../controller/updateController.php">
            <div class="col-md-4">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="ex: Igor Marques" name="name">
            </div>

            <div class="col-md-4">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" placeholder="ex: fulano@gmail.com" name="email">
            </div>

            <div class="col-md-4">
                <label for="cpf" class="form-label">Cpf</label>
                <input type="text" class="form-control" id="cpf" placeholder="ex: 000.000.000-00" name="cpf">
            </div>

            <div class="col-md-6">
                <label for="telephone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telephone" placeholder="ex: 90000-0000" name="telephone">
            </div>

            <div class="col-md-6">
                <label for="birthdate" class="form-label">Data de Nascimento</label>
                <input type="text" class="form-control" id="birthdate" placeholder="ex: 10/10/2010" name="birthdate">
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });

    $('#telephone').mask('(00) 0000-0000');

    $('#birthdate').mask('00/00/0000');
</script>