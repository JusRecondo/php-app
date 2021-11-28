<?php

#chequear si el usuario esta logueado
session_start();

$user_logged_in = false;

if( ! empty ( $_SESSION ) && $_SESSION['logged_in'] ) {
    if($_SESSION['logged_in'] === TRUE ) {
        $user_logged_in = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ejercicio PHP</title>

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <header>
        <a href="index.php" class="site-logo">
            <h1>Ejercicio PHP App</h1>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php
                    if( ! $user_logged_in ) {
                    ?>
                    <li>
                        <a href="signin.php">Registro</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <?php   
                    } else {
                    ?>
                    <li>
                        <a href="logged-in.php">Mi perfil</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <?php 
                    }
                ?>
                
               
            </ul>
        </nav>
</header>