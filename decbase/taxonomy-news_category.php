
<?php get_header(); $catData=get_queried_object(); //print_r($catData); ?>

 <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-12 top-heading text-center">
                        <span>latest news</span>
                        <h2>From our <?php echo $catData->name; ?> News</h2>
                    </div>
                </div>

                <div class="row mt-3 mt-md-5 g-5">
					 <?php 
						$args = array(
// 							'posts_per_page' => 1, how many post you need to display
							'post_type' => 'news', /* your post type name */
							'post_status' => 'publish',
							'tax_query' => array(
							  array(
							    'taxonomy'=>'news_category',
								 'field'=>'term_id',
								 'terms'=>$catData->term_id
							  )
							),
						);
						$query = new WP_Query($args);
						if ($query->have_posts()) :
							while ($query->have_posts()) : $query->the_post();
							$img_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
							
        				?>
						<div class="col-12 col-lg-6 m-auto">
							<div class="blog-content">
								<a href="">
									<div class="img">
										<img src="<?php echo $img_path[0]; ?>" alt="" class="img-fluid">
									</div>
									<div class="info">
										<span><?php echo $catData->name; ?></span>
										<h4><?php echo get_the_title(); ?></h4>
										<p><?php echo get_the_content(); ?></p>
 									<a href="<?php echo get_the_permalink(); ?>" class="btnn">continue reading</a> 
									</div>
								</a>
							</div>
						</div>
					
						<?php endwhile; endif; ?>
                </div>
             </div>
        </section>


<?php get_footer(); ?>