<?php
include '../config.php';
include '../model/db.php';
$link = connect_db();
if (isset($_GET['cider']) && isset($_GET['rating']) && $_GET['rating'] <= 5 && $_GET['rating'] >= 1) {
    $cider = (int) $_GET['cider'];
    $rating = (int) $_GET['rating'];
    // Comprobar que la id de la sidra existe
    // Comprobar que el usuario está logueado
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
        session_destroy();
        header('Location:index.php');
        exit;
    }
    $user_id = (int) $_SESSION['id'];
    $rating = (int) $_GET['rating'];
    $cider = (int) $_GET['cider'];
    $sql = "INSERT INTO 1814_rating(id_user,id_cider,rate) VALUES($user_id,$cider,$rating)";
    $result = mysqli_query($link, $sql);
}
?>
<?php include '../templates/header.php'; ?>
<section class='container_rate'>
    <div class="foto_rat">
             <a href="perfil.php" >
             <img src="img/logo10.png" alt="" class="cab"/>
            </a>
                
        </div>
    <article>
        <div id="rated">
            <p>gracias por votar</p>
        </div>
        <div class="btn_rated">  
            <a href="votaciones.php"> ir al listado </a>
            <a href="perfil.php"> ver tu perfil</a>
        </div>
    </article>
</section>
<script src="js/codigo.js" type="text/javascript"></script>
</body>
</html>
