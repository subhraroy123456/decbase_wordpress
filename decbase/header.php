<!DOCTYPE html>
<lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
           <?php wp_head(); ?>
    </head>

    <body class="<?php body_class(); ?>">
        <div class="scrollToTopBtn">
            <i class="fa-solid fa-angle-up"></i>
        </div>

        <header>
            <nav>
                <div class="container container-flex">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>">
                            <img src="<?php echo get_field('logo', 'options')['url']; ?>" />
                        </a>
                    </div>
                    <div class="bars">
                        <iconify-icon icon="heroicons:bars-3-center-left"></iconify-icon>
                    </div>
                    <div class="nav-right">
                        <div class="times">
                            <iconify-icon icon="prime:times"></iconify-icon>
                        </div>
<!--                         <ul class="list-unstyled p-0 m-0">
                            <li><a href="index.html">home</a></li>
                            <li><a href="">project</a></li>
                            <li><a href="">services</a></li>
                            <li><a href="">about</a></li>
                            <li><a href="">blog</a></li>
                            <li><a href="">shop</a></li>
                            <li><a href="">contact</a></li>
                            <li><a href="" class="signup-btn">sign up</a></li>
                        </ul> -->
						<?php main_nav(); ?>
						<div class="search">
							<form action="<?php echo esc_url(home_url()); ?>" method="get" >
								<input type="text" id="search" placeholder="search posts" name="s"/>
								<button type="submit">
									search
								</button>
							</form>
						</div>
                    </div>
                </div>
            </nav>
        </header>