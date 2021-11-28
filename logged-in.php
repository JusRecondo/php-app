<?php

require_once 'template-parts/header.php';

#chequear si el usuario esta logueado
if( ! $user_logged_in ) {
    header('Location: login.php');
    die();
}


#traer información de usuarie
$user_id    = $_SESSION[ 'user_id' ];

$connection = new mysqli( 'localhost', 'root', '', 'ejercicio_php' );

$result = $connection->query( 'SELECT * FROM users 
            WHERE id = "' . $user_id . '"' );

while ( $fila = $result->fetch_assoc() ) {
        
    $user = array();

    $user['Nombre'] = $fila['first_name'];
    $user['Apellido'] = $fila['last_name'];
    $user['Email'] = $fila['email'];
    $user['Fecha de nacimiento'] = $fila['date_of_birth'];
    $user['Nombre de Usuarie'] = $fila[ 'user_name' ];

}
        

?>

    <main>
        <h2>Bienvenide! <?php echo $user[ 'Nombre' ]?></h2>

        <section>
            <h3>Datos del perfil</h3>
            <ul class="user-data">
            <?php
                foreach( $user as $key => $value ) {
                    ?>
                    <li><strong><?php echo $key ?>:</strong> <?php echo $value ?></li> 
                    <?php
                }
            ?>
            </ul>
            <a href="logout.php" class="button-link">Logout</a>
        </section>


    </main>


<?php 

require_once 'template-parts/footer.php'; 

?>
