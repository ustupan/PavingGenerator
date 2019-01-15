<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>
<?php include(dirname(__DIR__).'/navbar.html') ?>

<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="form-group text-center""
        </div>
            <h1 class="panel-header">LOGIN</h1>
            <?php if(isset($message)): ?>
                <?php foreach($message as $item): ?>
                    <div><?= $item ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form action="?page=login" method="POST">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">email</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Wpisz swój email" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">vpn_key</i>
                    </label>
                    <div class="col-sm-11">
                        <input name="password" class="form-control" id="inputPassword" placeholder="Podaj hasło" type="password" required/>
                    </div>
                </div>
                <input type="submit" value="Zaloguj" class="btn btn-dark my-2 my-sm-0 float-right" />

            </form>
        </div>
    </div>
</body>
</html>
