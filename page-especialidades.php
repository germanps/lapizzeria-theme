<?php 
/*
* Template Name: Especialidades
*/
get_header() ?>
	
	<?php while(have_posts()): the_post();  ?>


		<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<?php the_title('<h1>', '</h1>') ?>
				</div>
			</div>
		</div>

		

		<div class="principal contenedor">
			<main class="texto-centrado contenido-paginas">
				<?php the_content(); ?>
			</main>
		</div>

	<?php endwhile; ?>

	<div class="nuestras-especialidades contenedor">
		<!-- Pizzas -->
		<h3 class="especialidades-titulo">Pizzas</h3>
		<div class="contenedor-grid">

			<?php 
				//WP_QUERY
				$args = array(
					'post_type' => 'especialidades',
					'post_per_page' => -1,
					'order_by' => 'title',
					'order' => 'ASC',
					'category_name' => 'pizzas'
				);

				$pizzas = new WP_Query($args);
				while($pizzas->have_posts()): $pizzas->the_post();
			?>

			<div class="col-grid-2-4">
				<?php the_post_thumbnail('especialidades'); ?>

				<div class="texto-especialidad">
					<h4><?php the_title(); ?> <span><?php the_field('precio'); ?></span></h4>
					<?php the_content(); ?>
				</div>
			</div> <!-- .col-grid- -->


			<?php endwhile; wp_reset_postdata(); ?>

		</div> <!-- .contenedor-grid -->

		<!-- Otros -->
		<h3 class="especialidades-titulo">Otros</h3>
		<div class="contenedor-grid">

			<?php 
				//WP_QUERY
				$args = array(
					'post_type' => 'especialidades',
					'post_per_page' => -1,
					'order_by' => 'title',
					'order' => 'ASC',
					'category_name' => 'otros'
				);

				$otros = new WP_Query($args);
				while($otros->have_posts()): $otros->the_post();
			?>

			<div class="col-grid-2-4">
				<?php the_post_thumbnail('especialidades'); ?>

				<div class="texto-especialidad">
					<h4><?php the_title(); ?> <span><?php the_field('precio'); ?></span></h4>
					<?php the_content(); ?>
				</div>
			</div> <!-- .col-grid- -->


			<?php endwhile; wp_reset_postdata(); ?>

		</div> <!-- .contenedor-grid -->

	</div> <!-- nuestras especialidades -->

<?php get_footer() ?>