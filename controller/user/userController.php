<?php

/* creamos el array que almacenan los datos que genera el user */

$query = array(
    'feedback_code' => null, //codigo del mensaje
    'feedback_message' => null, //mensaje
    'query' => null, //datos procedentes de la consulta
    'action' => null, // Recoge la acción que se corresponde a la página solicitada
    'template' => null, // Vista que quieres mostrar por pantalla
    'logged' => null, // muestra si el usuario está logeado o no
);

//Controla el guardado de usuarios en la base de datos
function register_user() {

    global $query;

    //controlamos si llegan datos
    if (!isset($_POST['email'])) {
        return $query;
    }

    //convertimos los datos
    $email = $_POST['email'];

    //controlamos que los datos no estén vacíos o sean incorrectos
    if (empty($email)) {
        $query['feedback_code'] = 1000;
        $query['feedback_message'] = 'introduce tu email';
        return $query;
    }

    //controlamos que el email es válido

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query['feedback_code'] = 1001;
        $query['feedback_message'] = 'email no válido';
        return $query;
    }

    //Nos conectamos a la base de datos

    $link = connect_db();

    //saneamos el SQL pasando real_escape_strig que requiere la conexión y el dato a sanear

    $email = mysqli_real_escape_string($link, $email);

    //comprobamos que el usuario no exista

    $query['query'] = read_user_by_email($link, $email);
    if ($query['query'] > 0) {
        $query['feedback_code'] = 1007;
        $query['feedback_message'] = 'el usuario ya existe';
        return $query;
    }
//Insertamos los datos  

    $query['query'] = create_user($link, $email);
    if (!$query['query']) {
        $query['feedback_code'] = 1003;
        $query['feedback_message'] = 'error en la base de datos. Intentalo más tarde';
        return $query;
    }
    $query['feedback_code'] = 1;
    $query['feedback_message'] = 'gracias por registrate, ahora debes logearte para empezar';
    return $query;
}

/* comprobación del login */

function check_login() {
    session_start();
    global $query;

    // comprobamos si llegan los datos

    if (!isset($_POST['email'])) {
        $query['feedback_code'] = 1000;
        $query['feedback_message'] = 'el email es obligatorio';
        return false;
    }

    //$email= $_POST['email'];
    //$email = strtolower(trim($email));
    //$caracteres_a_sustituir=".,:;?¿¡!ºª$&%()=+*/\\_-'\"\n\t\r";
    //comprobamos si son los datos que quiero

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $query['feedback_code'] = 1001;
        $query['feedback_message'] = 'email no válido';
        return $query;
    }


    //conexion a la base de datos

    $link = connect_db();

    $email = $_POST['email'];
    $email = strtolower(trim($email));

    //consulta

    $sql = "SELECT * FROM 1814_users  WHERE email = '$email'";


    $query['query'] = mysqli_query($link, $sql);

    if (!$query['query']) {
        $query['feedback_code'] = 1002;
        $query['feedback_message'] = 'Error en la base de datos. Intentalo más tarde';
        return $query;
    }

    //si el número es menor a 1 quiere decir que ese usuario no existe

    if (mysqli_num_rows($query['query']) < 1) {
        $query['feedback_code'] = 1003;
        $query['feedback_message'] = 'El nombre es incorrecto o no estas registrado';
        return $query;
    } else {
        $query['feedback_code'] = 1005;
        /* $query['feedback_message']='le redirigimos a su perfil'; */
        $query['logged'] = true;
    }


    //si llegó hasta aqui es que el usuario existe y recuperamos los datos de la tabla
    $user = mysqli_fetch_assoc($query['query']);



    //abrimos sesión. Comprobamos si existe y si está o no abierta

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // usamos la global $_SESSION para ir almacenando los datos

    $_SESSION['email'] = $email; // lo que recibo del usuario
    $_SESSION['id'] = $user['id'];
    $_SESSION['session_id'] = session_id(); // la id de la sesión
    $query['logged'] = true;

    return $query;
}

//comprobamos si es usuario esta logeado. Si no lo está destruimos la sesión 

function is_logged() {
    //preguntamos siempre si está abierta la sesión
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    //compruebo si hay algo en la sesión
    if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
        session_destroy(); // si no hay nada, destruimos la sesión
        return false;
    }

    $user = array(
        'username' => $_SESSION['email'],
    );

    return $user;
}

//función para destruir sesión.
function logout() {
    //preguntamos si está abierta
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start(); // abrimos sesión
    }

    session_destroy(); // destruimos la sesión
    return true;
}
