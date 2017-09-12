<?php 
/*
* Template Name: Especialidades
*/
get_header() ?>

<h1>Especialidades</h1>
	
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
		<h3 class="">Pizzas</h3>
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

			<div class="">
				<?php the_post_thumbnail('especialidades'); ?>
				<div class="text-especialidad">
					<h4><?php the_title(); ?> <span><?php the_field('precio'); ?></span></h4>
					<?php the_content(); ?>
				</div>
			</div>


			<?php endwhile; wp_reset_postdata(); ?>

		</div>

	</div>

<?php get_footer() ?>