<?php

$user_name = '';
$password  = '';

#validacion del formulario
if ( ! empty( $_POST ) ) {

    if ( ! empty( trim( $_POST['user_name'] ) ) && is_string( $_POST['user_name'] ) ) {
        $user_name = trim( $_POST['user_name'] );
    }

    if(  ! empty( trim( $_POST['password'] ) ) && is_string( $_POST['password'] ) ) {
        $password = trim( $_POST['password'] );
    }

} else {    
    echo 'Formulario vacío';
}

if ( $user_name !== '' && $password  !== ''  ) { 

    $hashed_password = md5( $password );

    #conexión con base de datos
    $connection = new mysqli( 'localhost', 'root', '', 'ejercicio_php' );

    $result = $connection->query( ' SELECT id FROM users
        WHERE user_name = "' . $connection->real_escape_string( $user_name ) . '"
        AND password = "' . $connection->real_escape_string( $hashed_password ) . '" ');

    
    if (  $fila = $result->fetch_assoc() ) {
        #iniciar la sesion
        session_start();    
        $_SESSION['logged_in'] = true;
        $_SESSION[ 'user_id' ] =  $fila[ 'id' ];

        #redirección en caso de éxito
        header( 'Location: logged-in.php' );

    } else {
        #redirección en caso de error
        header( 'Location: login.php?logged_in=false' );
    }
    
} else {
    #redirección en caso de error
    header( 'Location: login.php?logged_in=false' );
}
