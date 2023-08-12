<?php
get_header();
?>


<section class="single-custom-blog">
    <div class="container">
        <div class="row">
            <?php 
if (have_posts()) :
    while (have_posts()) : the_post();
    $img_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    $article_data = substr(get_the_content(), 0, 200 );
        ?>
        
        <div class="row">
            <div class="col-12 col-lg-8 col-md-12 m-auto">
                        <div class="blog-content">
                            <a href="">
                                <div class="img">
                                    <img src="<?php echo $img_path[0]; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="info">
                                    <h4><?php echo get_the_title(); ?></h4>
										<p><?php echo get_the_content(); ?></p>
                                    <!--<a href="<?php echo get_the_permalink(); ?>" class="btnn">continue reading</a>-->
                                </div>
                            </a>
                        </div>
                    </div>
        </div>
        <!--<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>-->
        <!--    <header class="entry-header">-->
        <!--        <h1><?php the_title(); ?></h1>-->
        <!--    </header>-->
        <!--    <div class="entry-content">-->
        <!--        <?php the_content(); ?>-->
        <!--    </div>-->
        <!--</article>-->
        <?php
    endwhile;
endif;

?>
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
// Get the current post's ID
$current_post_id = get_the_ID();

// Get the terms (categories) of the current post in the "portfolio_category" taxonomy
$terms = get_the_terms($current_post_id, 'news_category');

if ($terms && !is_wp_error($terms)) {
    $term_ids = wp_list_pluck($terms, 'term_id');

    $related_args = array(
        'post_type' => 'news',          // Your custom post type
        'posts_per_page' => -1,               // Number of related posts to display
        'post__not_in' => array($current_post_id), // Exclude the current post
        'tax_query' => array(
            array(
                'taxonomy' => 'news_category', // Your taxonomy name
                'field' => 'term_id',
                'terms' => $term_ids,               // Related terms
            ),
        ),
    );

    $related_query = new WP_Query($related_args);

    if ($related_query->have_posts()) :
        while ($related_query->have_posts()) : $related_query->the_post();
            // Display related post content
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

            <?php
        endwhile;
        wp_reset_postdata();
    endif;
}
?>
                </div>
            </div>
        </section>




<?php 
get_footer();
?>