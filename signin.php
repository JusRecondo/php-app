<?php 

require_once 'template-parts/header.php';

#chequear si el usuario esta logueado
if( $user_logged_in  ) {
	header('Location: logged-in.php');
    die();
}


?>
	<main>

		<h2>Registrate</h2>
		<?php 
			if( ! empty( $_GET[ 'singin_failed'] ) ) { 

				if( $_GET[ 'singin_failed' ] === 'true' ) {
				?>
					<p class="warning">El proceso de registro falló, por favor asegurarse de completar 
						todos los datos o intentar nuevamente más tarde.</p>
				<?php

				}
			}
		?>
		
		<form action="process-signin.php" method="post">
			<label>Nombre:
				<input type="text" name="first_name" placeholder="Escribí tu nombre.." required>
			</label>

			<label>Apellido:
				<input type="text" name="last_name" placeholder="Escribí tu apellido.." required>
			</label>

			<label>Email:
				<input type="email" name="email" placeholder="email@mail.com" required>
			</label>

			<label>Fecha de nacimiento:
				<input type="date" name="date_of_birth" required>
			</label>

			<label>Nombre de Usuarie:
				<input type="text" name="user_name" placeholder="Escribí el nombre de usuario que usarás.." required>
			</label>

			<label>Contraseña
				<input type="password" name="password" placeholder="Escribí una contraseña" required>
			</label>

			<input type="submit" value="Crear Cuenta">
			<a href="login.php" class="button-link">Ya tengo cuenta</a>
		</form>
	
	</main>

<?php 

require_once 'template-parts/footer.php'; 

?>