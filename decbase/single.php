
<?php get_header(); ?>

 <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-12 top-heading text-center">
                        <span>latest news</span>
                        <h2>From our blog</h2>
                    </div>
                </div>

                <div class="row mt-3 mt-md-5 g-5">
					 <?php 
						
						//$query = new WP_Query($args);
						if (have_posts()) :
							while (have_posts()) : the_post();
							$img_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
							//$cat_name = get_categories(['taxonomy' => 'category']);
							//$article_data = substr(get_the_content(), 0, 300 );
        				?>
						<div class="col-12 col-ld-8 col-md-10 m-auto">
							<div class="blog-content">
								<a href="">
									<div class="img">
										<img src="<?php echo $img_path[0]; ?>" alt="" class="img-fluid">
									</div>
									<?php $category_detail=get_the_category( $post->ID ); 
                                            
                                            foreach($category_detail as $cat_detail) {
                                            
                                           ?>
                                             <span><?php echo $cat_detail->name;  ?></span>
                                             
                                             <?php 
                                          } ?>
									
									<?php $category_detail=get_the_terms( $post->ID, 'news_category' ); 
                                            
                                            foreach($category_detail as $cat_detail) {
                                            
                                           ?>
                                             <span><?php echo $cat_detail->name;  ?></span>
                                             
                                             <?php 
                                          } ?>
									<div class="info">
										<h4><?php echo get_the_title(); ?></h4>
										<p><?php echo get_the_content(); ?></p>
										<p>
											<?php echo get_field('custom_post_description2', get_the_id()); ?>
										</p>
										<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
<!-- 										<a href="<?php echo get_the_permalink(); ?>" class="btnn">continue reading</a> -->
									</div>
								</a>
							</div>
						</div>
					
						<?php endwhile; endif; ?>
                </div>
				
				<?php 
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
 		//comment_form();
?>
             </div>
        </section>


 <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-12 top-heading text-center">
                        <span>Related Blogs</span>
                        <h2>From our blog</h2>
                    </div>
                </div>

                <div class="row mt-3 mt-md-5 g-5">
						<?php
$current_post_id = get_the_ID();

$related_args = array(
    'posts_per_page' => 3, // Number of related posts to display
    'post__not_in' => array($current_post_id),
	'post_type' => 'post',
	
);
$img_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$related_query = new WP_Query($related_args);

if ($related_query->have_posts()) :
    while ($related_query->have_posts()) : $related_query->the_post();
        $article_data = substr(get_the_content(), 0, 200 );
        ?>
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="blog-content">
                            <a href="">
                                <div class="img">
                                    <img src="<?php echo $img_path[0]; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="info">
                                    <h4><?php echo get_the_title(); ?></h4>
										<p><?php echo $article_data; ?></p>
                                    <a href="<?php echo get_the_permalink(); ?>" class="btnn">continue reading</a>
                                </div>
                            </a>
                        </div>
                    </div>

                   <?php endwhile; wp_reset_postdata(); endif;
?>
                </div>
            </div>
        </section>


<?php get_footer(); ?>