<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__).'/navbar.html'); ?>
<div class="container">
    <div class="row">
        <h4 class="mt-4">Twoje dane:</h4>
        <table class="table table-hover">
            <tr>
                <th>Login</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Numer Telefonu</th>
            </tr>
            <tbody>
            <tr>
                <td><?= $userDetails[0]['login']; ?></td>
                <td><?= $userDetails[0]['name']; ?></td>
                <td><?= $userDetails[0]['surname']; ?></td>
                <td><?= $userDetails[0]['phone']; ?></td>

            </tr>
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a class="btn btn-outline-success btn-lg" href="?page=update">Aktualizacja danych</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
