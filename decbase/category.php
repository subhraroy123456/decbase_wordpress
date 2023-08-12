
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
						<div class="col-12 col-md-6 m-auto">
							<div class="blog-content">
								<a href="">
									<div class="img">
										<img src="<?php echo $img_path[0]; ?>" alt="" class="img-fluid">
									</div>
									<div class="info">
										<?php $category_detail=get_the_category( $post->ID ); 
                                            
                                            foreach($category_detail as $cat_detail) {
                                            
                                           ?>
                                             <span><?php echo $cat_detail->name;  ?></span>
                                             
                                             <?php 
                                          } ?>
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