<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

 <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-12 top-heading text-center">
                        <span>latest blogs</span>
                        <h2>From our blog</h2>
                    </div>
                </div>

                <div class="row mt-3 mt-md-5 g-5">
					 <?php 
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array(
							'posts_per_page' => 1, /* how many post you need to display */
							'offset' => 0,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'post', /* your post type name */
							'post_status' => 'publish',
							'paged' => $paged
						);
						$query = new WP_Query($args);
						if ($query->have_posts()) :
							while ($query->have_posts()) : $query->the_post();
							$img_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
							//$cat_name = get_categories(['taxonomy' => 'category']);
							$article_data = substr(get_the_content(), 0, 300 );
        				?>
						<div class="col-12 col-lg-5 col-md-6 m-auto">
							<div class="blog-content">
								<a href="">
									<div class="img">
										<img src="<?php echo $img_path[0]; ?>" alt="" class="img-fluid">
									</div>
									<div class="info">
										<h4><?php echo get_the_title(); ?></h4>
										<p><?php echo $article_data; ?>....</p>
										<a href="<?php echo get_the_permalink(); ?>" class="btnn">continue reading</a>
									</div>
								</a>
							</div>
						</div>
					
						<?php endwhile; endif; ?>
                </div>
             </div>
        </section>

<div>
	<?php wp_pagenavi(array('query' => $query)) ?>
</div>

<?php get_footer(); ?>