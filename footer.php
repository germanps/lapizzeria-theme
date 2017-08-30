	






	<footer>
		<?php 
			$args = array(
				'theme-location' => 'header-menu',
				'container' => 'nav',
				'after' => '<span class="separador"> | </span>'
			);
			wp_nav_menu( $args );
		?>
		<div class="ubicacion">
			<p>Bay Avenue Mountain View, CA 94043</p>
			<p>Teléfono: +1-92-456-7890</p>
		</div>
	</footer>







	<?php wp_footer(); ?>
	</body>
</html>