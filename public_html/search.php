<?php
include '../config.php';
include '../model/cider.php';
include '../model/db.php';
include '../controller/cider/ciderController.php';
$link = connect_db();
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
if (!$search) {
    header('Location:buscador.php');
    exit;
}
$search = '%' . $search . '%';
$sql = "SELECT * from 1814_sidras WHERE name LIKE '$search'";
$result = mysqli_query($link, $sql) or die("Error en consulta");
?>
<?php include '../templates/header.php' ?>
        <section id="sm">
              <div class="foto_search">
             <a href="perfil.php" >
             <img src="img/logo10.png" alt="" class="cab"/>
            </a>
                
        </div>
            <?php if (mysqli_num_rows($result) < 1): ?>
                <p>No se han encontrado resultados</p>
            <?php else: ?>
                <article class="search_mo">
                    <h2>Aquí tienes</h2>
                    <ul>
                        <?php foreach ($result as $sidra): ?>   <li>
                                <a href="cider.php?id=<?php echo $sidra['id'] ?>"><?php echo $sidra['name'] ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </article>
        </section> 
        <div class="chincheta"></div>
        <?php require '../templates/footer.php'; ?>
        <div class="chincheta"></div>
        <script src="js/codigo.js" type="text/javascript"></script>
    </body>
</html>
