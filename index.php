<?php 

require_once 'template-parts/header.php';

?>

	<main>
		<h2>Bienvenide a mi primera aplicación con PHP</h2>
		
		<section>
			<?php 
				if ( $user_logged_in ) {
				?>	
					<p>Ya iniciaste sesión!</p>
					<a href="logged-in.php" class="button-link">Ir a mi perfil</a>
					<a href="logout.php" class="button-link">Cerrar sesión</a>
				<?php 	
				} else {
				?>
					<p>Si tenés usuarie</p>
					<a href="login.php" class="button-link">Iniciá sesión</a>

					<p>Y si aún no tenés usuarie</p>
					<a href="signin.php" class="button-link">Creá tu cuenta</a>
				<?php 	
				}
			?>
		</section>

	</main>


<?php 

require_once 'template-parts/footer.php'; 

?>