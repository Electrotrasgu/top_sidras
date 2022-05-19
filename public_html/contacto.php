<?php
include '../controller/mail.php';
$controller = new FormularioViewController();
extract($_POST);
?>
<?php require '../templates/header.php'; ?>
        <div id='contact'>
            <div class="formCont">
                <h2>Contacta</h2> 
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post' enctype="multipart/form-data">
                    <input type='text' name='name' id="con" placeholder='nombre'>
                    <input type='text' name='apellidos' id="con_1" placeholder='apellidos'>
                    <input type='text' name='email' id="con_2" placeholder='email'>
                    <textarea name='mensaje' id="con_3"  required=""></textarea>
                    <div class="cont"><input type='submit' value='contacta'></div>
                </form>
                <p class="txt_error">Debes rellenar datos</p>
                <p class="txt_ok">Gracias por contactar</p> 
            </div>
            <div id="text">
                <p>En Top Sidras nos interesa tu opinión. ¿Tienes alguna sugerencia? ¿Conoces alguna sidra que no esté en nuestro listado? ponte en contacto con nosotros. Búscanos también en las redes sociales.</p>
            </div>
        </div>
        <div class="chincheta"></div>
        <?php require '../templates/footer.php'; ?>
        <div class="chincheta"></div>
        <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/codigo.js" type="text/javascript"></script>
    </body>

</html>
