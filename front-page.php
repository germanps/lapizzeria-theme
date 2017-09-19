<?php get_header() ?>
	
	<?php while(have_posts()): the_post();  ?>


		<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<h1><?php echo esc_html(get_option( 'blogdescription')); ?></h1>
					<?php the_content(); ?>
					<?php $url = get_page_by_title('Sobre Nosotros'); ?>
					<a class="button naranja" href="<?php echo get_permalink( $url->ID ); ?>">Leer más</a>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

		<div class="principal contenedor">
			<main class="contenedor-grid">
				<h2 class="texto-rojo">Nuestras Especialidades</h2>
				<?php 
					$args = array(
						'post_per_page' => 3,
						'orderby' => 'rand',
						'post_type' => 'especialidades',
						'category_name' => 'pizzas'
					);

					$especialidades = new WP_Query($args);
					while($especialidades->have_posts()): $especialidades->the_post();

				 ?>

				<div class="especialidad col-grid-1-3">
					<?php the_title() ?>
				</div>


				<?php endwhile; wp_reset_postdata(); ?>
			</main>
		</div>

<?php get_footer() ?>