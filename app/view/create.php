<?php
session_start();
include_once('../../partials/app.php');
?>

<div class="container mt-2 mb-4">
    <a class="btn btn-danger" href="../../../" role="button">Voltar</a>
</div>

<div class="outForm">
    <div class="container">
        <form class="row" method="POST" action="../controller/createController.php">
            <div class="col-md-4">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="ex: Igor Marques" name="name" value="<?php if (isset($_SESSION['name_input'])) echo $_SESSION['name_input']; unset($_SESSION['name_input']); ?>">

                <?php if (isset($_SESSION['errors']['name'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['errors']['name'];
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" placeholder="ex: fulano@gmail.com" name="email" value="<?php if (isset($_SESSION['email_input'])) echo $_SESSION['email_input']; unset($_SESSION['email_input']); ?>">

                <?php if (isset($_SESSION['errors']['email'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['errors']['email'];
                        unset($_SESSION['errors']['email']);
                        ?>
                    </span>
                <?php } ?>

                <?php if (isset($_SESSION['errors']['email_exist'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['errors']['email_exist'];
                        unset($_SESSION['errors']['email_exist']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-4">
                <label for="cpf" class="form-label">Cpf</label>
                <input type="text" class="form-control" id="cpf" placeholder="ex: 000.000.000-00" name="cpf" value="<?php if (isset($_SESSION['cpf_input'])) echo $_SESSION['cpf_input']; unset($_SESSION['cpf_input']); ?>">

                <?php if (isset($_SESSION['errors']['cpf'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['errors']['cpf'];
                        unset($_SESSION['errors']['cpf']);
                        ?>
                    </span>
                <?php } ?>

                <?php if (isset($_SESSION['errors']['cpf_exist'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['errors']['cpf_exist'];
                        unset($_SESSION['errors']['cpf_exist']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-6">
                <label for="telephone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telephone" placeholder="ex: 90000-0000" name="telephone" value="<?php if (isset($_SESSION['telephone_input'])) echo $_SESSION['telephone_input']; unset($_SESSION['telephone_input']); ?>">

                <?php if (isset($_SESSION['errors']['telephone'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['errors']['telephone'];
                        unset($_SESSION['errors']['telephone']);
                        ?>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-6">
                <label for="birthdate" class="form-label">Data de Nascimento</label>
                <input type="text" class="form-control" id="birthdate" placeholder="ex: 10/10/2010" name="birthdate" value="<?php if (isset($_SESSION['bithdate_input'])) echo $_SESSION['bithdate_input']; unset($_SESSION['bithdate_input']); ?>">

                <?php if (isset($_SESSION['errors']['birthdate'])) { ?>
                    <span class="text-danger">
                        <?php
                        echo $_SESSION['errors']['birthdate'];
                        unset($_SESSION['errors']['birthdate']);
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

<script>
    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });

    $('#telephone').mask('(00) 0000-0000');

    $('#birthdate').mask('00/00/0000');
</script>