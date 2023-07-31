<?php
session_start();
include_once('../partials/app.php');
?>

<div class="container mt-2 mb-4">
    <a class="btn btn-danger" href="../" role="button">Voltar</a>
</div>

<div class="outForm">
    <div class="container">
        <form class="row" method="POST" action="./controller/createController.php">
            <div class="col-md-4">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="ex: Igor Marques" name="name">

                <?php if (isset($_SESSION['name'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['name'];
                        unset($_SESSION['name']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" placeholder="ex: fulano@gmail.com" name="email">

                <?php if (isset($_SESSION['email'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['email'];
                        unset($_SESSION['email']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-4">
                <label for="cpf" class="form-label">Cpf</label>
                <input type="text" class="form-control" id="cpf" placeholder="ex: 000.000.000-00" name="cpf">

                <?php if (isset($_SESSION['cpf'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['cpf'];
                        unset($_SESSION['cpf']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-6">
                <label for="telephone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telephone" placeholder="ex: 90000-0000" name="telephone">

                <?php if (isset($_SESSION['telephone'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['telephone'];
                        unset($_SESSION['telephone']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-6">
                <label for="birthdate" class="form-label">Data de Nascimento</label>
                <input type="text" class="form-control" id="birthdate" placeholder="ex: 10/10/2010" name="birthdate">

                <?php if (isset($_SESSION['bithdate'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['bithdate'];
                        unset($_SESSION['bithdate']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </form>
    </div>
</div>