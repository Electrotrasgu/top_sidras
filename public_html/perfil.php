<?php
require '../config.php';
require '../model/db.php';
require '../controller/user/userController.php';
require '../controller/rate/rate_controller.php';
if (isset($_GET['a']) && $_GET['a'] == 'logout') {
    logout();
    header('Location:index.php');
    exit;
}
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$link = connect_db();
$id = $_SESSION[id];


$sql = "SELECT *  FROM 1814_rating INNER JOIN 1814_sidras ON id=id_cider AND id_user='$id'";
$result = mysqli_query($link, $sql) or die("Error en consulta");



?>
<?php include '../templates/header.php' ?>

<section class="perfil_container">
    
    <article class="wrap_3">
        <div class="foto">
        
           <a href="perfil.php" >
    <img src="img/logo10.png" alt="" class="cab"/>
    
    </a>
    </div>
        <div id="perfil">
     
        <h2>Bienvenid@ <?php echo $_SESSION['email'] ?></h2>
            <?php if (mysqli_num_rows($result) < 1): ?>
                <p class="message">No se han encontrado resultados</p>
            <?php else: ?>
                <h3>Este es tu ranking de sidras</h3>
                <?php foreach ($result as $sidra): ?>
                    <div class="perfil_cider">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <a href="inter.php" class="delete">X</a> 
                        </form>
                     
                        <img src="img/iconoBotella.png" alt="" width="80" height="80"/>
                        <p> <?php echo $sidra['name'] ?>-<?php echo $sidra['rate'] ?></p>
                        <a href="<?php echo $sidra['email'] ?>" target="_blank">+info sobre el llagar</a>
                    </div>   
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <div class="btn_perfil">  
            <a href="votaciones.php"> ir al listado </a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?a=logout">cerrar sesión</a>
        </div>
        <?php require '../templates/footer.php'; ?>
    </article>
</section>
<script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/codigo.js" type="text/javascript"></script>
</body>
</html>
