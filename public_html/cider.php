<?php
include '../config.php';
include '../model/db.php';
$link = connect_db();
if (isset($_GET['a']) && $_GET['a'] == 'logout') {
    logout();
    header('Location:index.php');
    exit;
}
$cider = null;
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $cider = $link->query("SELECT 1814_sidras.id, 1814_sidras.foto, 1814_sidras.email,1814_sidras.place, 1814_sidras.name, AVG(1814_rating.rate) AS rate FROM 1814_sidras LEFT JOIN 1814_rating ON 1814_sidras.id = 1814_rating.id_cider WHERE 1814_sidras.id = {$id}")->fetch_object();
}
?>

        <?php include '../templates/header.php'; ?>
        <section class='container'>
            <?php if ($cider): ?>
                <article class="wrap_2" >
                    <div id="one">
                        <h3><?php echo $cider->name; ?></h3>  
                        <h2><?php echo $cider->place; ?></h2>
                        <img src=" <?php echo $cider->foto ?>" width="250" height="250" alt=""/>
                      <!--<div class="cider_rating">Rating: <?php echo round($cider->rate); ?>/5</div>-->
                        <div class="cider_rate">
                            <p>vota esta sidra</p>
                            <ul>
                                <li class="list_star"><?php foreach (range(1, 5) as $rating): ?>
                                        <a class="stars" href="rate.php?cider=<?php echo $cider->id; ?>&rating=<?php echo $rating ?>"><?php echo $rating; ?></a>
                                    <?php endforeach; ?>
                                </li>
                            </ul>
                        </div>
                        <a id='llagar' href="<?php echo $cider->email ?>" target="_blank">
                            +más info sobre el llagar
                        </a>
                        <div class="btn">  
                            <a href="votaciones.php"> ir al listado </a>
                            <a href="perfil.php"> ver tu perfil</a> 
                        </div> 
                    </div>
                <?php endif; ?>
            </article>
        </section>
        <div class="chincheta"></div>
        <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/codigo.js" type="text/javascript"></script>
    </body>
</html>

