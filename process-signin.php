<?php


$first_name    = '';
$last_name     = '';
$email         = '';
$date_of_birth = '';
$user_name     = '';
$password      = '';


if ( ! empty($_POST) ) {

    #validación de datos del formulario

    $first_name    = is_string( $_POST['first_name'] ) ? trim( $_POST['first_name'] ) : ''; 

    $last_name     = is_string( $_POST['last_name'] ) ? trim( $_POST['last_name'] ) : ''; 

    $email         = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : '';

    if ( !empty( $_POST['date_of_birth'] ) && is_string( $_POST['date_of_birth'] ) ) {

        $timestamp = strtotime( $_POST['date_of_birth'] );

        $time_converted = date( 'Y-m-d', $timestamp );

        if( $time_converted === $_POST['date_of_birth'] ) {
            $date_of_birth = $_POST['date_of_birth'];
        } else {
            $date_of_birth = '';
        }
        
    }

    $user_name     = is_string( $_POST['user_name'] ) ? trim( $_POST['user_name'] ) : ''; 

    $password      = is_string( $_POST['password'] ) ? md5( trim( $_POST['password'] ) ) : ''; 


    if( $first_name !== '' &&
        $last_name !== '' &&
        $email !== '' &&
        $date_of_birth !== '' &&
        $user_name !== '' &&
        $password !== '' ) {

        #conexión con base de datos
        
        $connection = new mysqli( 'localhost', 'root', '', 'ejercicio_php' );

        $result = $connection->query( 'INSERT INTO users(first_name, last_name, email, date_of_birth,user_name , password)  
                                        VALUES ("' . $connection->real_escape_string($first_name) . '","' . 
                                        $connection->real_escape_string( $last_name ) . '","' .
                                        $connection->real_escape_string( $email )  . '","' .
                                        $connection->real_escape_string( $date_of_birth )  . '","' .
                                        $connection->real_escape_string( $user_name )  . '","' .
                                        $connection->real_escape_string( $password ) . '")' );
                        
        if ( ! $result ) {
            #redirección en caso de error
            header( 'Location: signin.php?singin_failed=true' );
        }  else {
             #redirección en caso de éxito
            header( 'Location: login.php?new_user=true' );
        }                         

    } else {
         #redirección en caso de error
        header( 'Location: signin.php?singin_failed=true' );
    }
                               
} else {
     #redirección en caso de error    
    header( 'Location: signin.php?singin_failed=true' );
}

