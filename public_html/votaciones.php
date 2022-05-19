<?php
include '../config.php';
include '../model/db.php';
$link = connect_db();
$query = $link->query("SELECT 1814_sidras.id,1814_sidras.foto,  1814_sidras.name,  AVG(1814_rating.rate) AS rate FROM 1814_sidras LEFT JOIN 1814_rating ON 1814_sidras.id = 1814_rating.id_cider GROUP BY 1814_sidras.id  ");
$ciders = [];
while ($row = $query->fetch_object()) {
    $ciders[] = $row;
}
?>
<?php include '../templates/header.php' ?>
<div class='foto'>
    <!--<img src='#' alt='slider' id='image'>-->
    
    <a href="perfil.php">
    <img src="img/logo10.png" alt=""/>
    <p>Listado de sidra natural de Asturias</p>
    </a>
</div>
<a href="#" class="btn_top">
    <img src="img/icons/sidra.png" alt="" width="50"/>
</a>
<section class="cider_container">
    <article class="wrap">
        <?php foreach ($ciders as $cider): ?>
            <div class="cider" >
                <a href='cider.php?id=<?php echo $cider->id; ?>'><img src=" <?php echo $cider->foto ?>" width="200" height="200" alt=""/><h2><?php echo $cider->name ?></h2></a>
                                 <!-- <p class="cider-rating">Rating: <?php echo round($cider->rate); ?>/5  </p>-->
            </div>
        <?php endforeach; ?>
        <div class="chincheta"></div>
    </article>
</section>
<div class="chincheta"></div>
<?php require '../templates/footer.php'; ?>
<div class="chincheta"></div>
<script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/codigo.js" type="text/javascript"></script>
</body>
</html>
