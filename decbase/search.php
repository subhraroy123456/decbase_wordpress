<?php get_header(); ?>

<div class="container">
    <div class="row">
    <?php

 if (have_posts()) :
		while (have_posts()) : the_post();
		$img_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		
		$article_data = substr(get_the_content(), 0, 200 );
		
		$categories = get_the_terms( $post->ID, 'news_category' );
	
?>


<div class="col-12 col-lg-4 col-md-6 m-auto">
							<div class="blog-content">
								<a href="">
									<div class="img">
										<img src="<?php echo $img_path[0]; ?>" alt="" class="img-fluid">
									</div>
									<?php foreach($categories as $category) : $thumbnail = get_field( 'custom_taxonomy_image', $category->taxonomy . '_' . $category->term_id ); ?>
										<div class="cat-icon">
                  							<img src="<?php echo $thumbnail['url']; ?>" alt="">
                						</div>
										<span><?php echo $category->name; ?></span>
									<?php endforeach; ?>
									<div class="info">
										<h4><?php echo get_the_title(); ?></h4>
										<p><?php echo $article_data; ?></p>
										<a href="<?php echo get_the_permalink(); ?>" class="btnn">continue reading</a>
									</div>
								</a>
							</div>
						</div>

<?php endwhile; endif; ?>
</div>
</div>


<?php get_footer(); ?>