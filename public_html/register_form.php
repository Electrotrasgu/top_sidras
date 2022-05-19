<?php
include '../config.php';
include '../model/db.php';
include '../model/user.php';
include '../controller/user/userController.php';
$link = connect_db();
$query = register_user();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrate</title>
        <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
      <div class="form">
             <div class="foto_reg">
             <a href="perfil.php" >
             <img src="img/logo10.png" alt="" class="cab"/>
            </a>
        </div>
            <h3>registrate</h3>
            <form method="post" class="reg_form" action="<?= $_SERVER["PHP_SELF"] ?>">
                <input type="text" name="email" placeholder="tu email" id="reg">
                <input type="submit" name="registrate" id="participa" value="registrar"> 
                <?php if ($query['feedback_message'] != null): ?>
                    <p class="message">
                        <?php echo $query['feedback_message'] ?>
                    <p>
                    <?php else: ?>
                    <?php endif; ?>
                    <a href="login_form.php">Si ya estás registrado, pincha aquí</a>
            </form>
        </div>
        <div class="text">
        </div>
    </body>
</html>
