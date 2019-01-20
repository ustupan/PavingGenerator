<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html') ?>
<?php include(dirname(__DIR__) . '/navbar.html') ?>

<body>


<div class="container">
    <h1 class="form-heading"></h1>
        <div class="main-div">
            <div class="panel">
                <h2>Aktualizacja danych osobowych</h2>
            </div>
            <form id="update" action="?page=update" method="POST">
                <div class="form-group">
                    <input name="imie" type="imie" class="form-control" id="inputName" placeholder="imie" required/>
                </div>
                <div class="form-group">
                    <input name="nazwisko" type="nazwisko" class="form-control" id="inputSurname" placeholder="nazwisko" required/>
                </div>
                <div class="form-group">
                    <input name="numerTel" type="numerTel" class="form-control" id="inputPhoneNumber" placeholder="numer telefonu" required/>
                </div>
                <button type="submit" class="btn btn-primary">Zaktualizuj</button>
            </form>
        </div>
    </div>

</body>
</html>