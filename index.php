<?php get_header() ?>
	<!-- Esta será la página del blog -->
		
		<?php 
			$pagina_blog = get_option('page_for_posts');
			$imagen = get_post_thumbnail_id($pagina_blog);
			$imagen = wp_get_attachment_image_src($imagen, 'full');

		?>

		<div class="hero" style="background-image: url(<?php echo $imagen[0] ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<h1><?php echo get_the_title( $pagina_blog ); ?></h1>
				</div>
			</div>
		</div>

		
		<!-- Entradas del Blog -->
		<div class="principal contenedor">
			<main class="texto-centrado contenido-paginas">
				<?php while(have_posts()): the_post();  ?>
					<article>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('especialidades'); ?>
						</a>
						<header class="informacion-entrada clearfix">
							<div class="fecha">
								<time>
									<?php echo the_time('d'); ?>
									<span><?php the_time('M'); ?></span>
								</time>
							</div>
							<div class="titulo-entrada">
								<?php the_title('<h2>', '</h2>' ); ?>
								<p class="autor">
									<i class="fa fa-user" aria-hidden="true">
										<?php the_author(); ?>
									</i>
								</p>
							</div>
						</header>
						<section class="contenido-entrada">
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="button rojo">Leer más...</a>
						</section>
					</article>
				<?php endwhile; ?>
			</main>
		</div>

	

<?php get_footer() ?>