<?php 

require_once 'template-parts/header.php';

#chequear si el usuario esta logueado
if( $user_logged_in ) {
	header('Location: logged-in.php');
    die();
}


?>
	<main>

		<h2>Iniciar sesión</h2>

		<?php 
			if( ! empty( $_GET[ 'new_user'] ) ) { 

				if( $_GET[ 'new_user' ] === 'true' ) {
				?>
					<h3 class="welcome">Bienvenide! Ahora podes iniciar sesión en tu cuenta.</h3>
				<?php

				}
			}
		?>

		<form action="process-login.php" method="post">

		<?php 
			if( ! empty( $_GET[ 'logged_in'] ) ) { 

				if( $_GET[ 'logged_in' ] === 'false' ) {
				?>
					<p class="warning">Usuario o contraseña incorrectos</p>
				<?php

				}
			}
		?>

			<label>Nombre de usuarie
				<input type="text" name="user_name" placeholder="Escribí tu numbre de usuarie" required>
			</label>
			<label>Contraseña
				<input type="password" name="password" placeholder="Escribí tu contraseña" required>
			</label>

			<input type="submit" value="Iniciar sesión">

			<a href="signin.php" class="button-link">Creá tu cuenta</a>
		</form>

	</main>

<?php 

require_once 'template-parts/footer.php'; 

?>