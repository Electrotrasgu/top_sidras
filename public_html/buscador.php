<?php
include '../config.php';
include '../model/cider.php';
include '../model/db.php';
include '../controller/cider/ciderController.php';
$link = connect_db();
$search = "";
if ((isset($_POST['buscar']) && !empty($_POST['search'])) || isset($_GET['search'])) {
    $search = $_REQUEST['search'];
}
$sidra = '%' . $search . '%';
$sql = "SELECT id, name from 1814_sidras WHERE name LIKE '$sidra'";
$result = mysqli_query($link, $sql) or die("Error en consulta");
?>

        <?php include '../templates/header.php'; ?>
        <div class="buscador">
            <div class="foto_bus">
             <a href="perfil.php" >
             <img src="img/logo10.png" alt="" class="cab"/>
            </a>
                <h3>buscador de sidras</h3>
        </div>
            
            <form action="search.php" method="GET">       
                <input type="text" name="search" id="search" placeholder="busca sidras" autocomplete="off">
                <input type="submit" name="buscar" class="buscar" value='buscar'>
                <input type="reset" name="borrar" class="buscar" value='borrar'>
            </form>
        </div>
        <script src="js/codigo.js" type="text/javascript"></script>

    </body>
</html>
