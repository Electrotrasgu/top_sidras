<?php
require '../config.php';
require '../model/db.php';
require '../controller/user/userController.php';
$query = check_login();
if ($query['logged'] === true) {
    header('Location: perfil.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Entra</title>
        <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="form">
             <div class="foto_reg">
             <a href="perfil.php" >
             <img src="img/logo10.png" alt="" class="cab"/>
            </a>
              <h3>Participa</h3>
        </div>
            
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="reg_form">
                <input type="text" name="email" id="log"  placeholder="tu email" class="email">

                <input type="submit" value="login">
                <?php if ($query['feedback_message'] != null): ?>
                    <p class="message"><?php echo $query['feedback_message'] ?></p>
                <?php else: ?>
                <?php endif; ?>
                <a href="register_form.php">Si no estás registrado, pincha aquí</a>
            </form>
        </div>
    </body>
</html>
