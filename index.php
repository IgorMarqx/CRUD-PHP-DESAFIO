<?php
session_start();
require_once './app/model/DB.php';
require_once './partials/app.php';
require_once './app/controller/readController.php';


$clients = read();
include_once './partials/modal.php';
?>

<div class="container mt-2 mb-4">
    <a class="btn btn-success" href="./app/view/create.php" role="button">Criar cliente</a>
</div>


<div class="container">
    <table class="table table-hover caption-top table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($clients as $row) { ?>
                <tr>
                    <th class="p-4"><?= $row['id'] ?></th>
                    <th><?= $row['name'] ?></th>
                    <th><?= $row['email'] ?></th>
                    <th><?= $row['cpf'] ?></th>
                    <th><?= $row['telephone'] ?></th>
                    <th><?= implode('/', array_reverse(explode('-', $row['birthdate']))) ?></th>
                    <th>
                        <a href="./app/view/update.php?id=<?php echo $row['id'] ?> " class="me-2">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $row['id'] ?>">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('a[data-bs-toggle="modal"]').on('click', function() {
            var clientId = $(this).data('id');
            var deleteLink = './app/controller/deleteController.php?id=' + clientId;

            $('#deleteBtn').attr('href', deleteLink);
        });
    });
</script>