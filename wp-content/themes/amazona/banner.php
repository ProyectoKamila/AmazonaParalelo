    <?php
        $var = query_posts(array('post_type' => "banner", 'posts_per_page' => 4));
//        debug($query);
        ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 slider">
            <?php if (!empty($var)) { ?>
                <ul id="slider1">
                    <?php
                    while (have_posts()) {
                        the_post();
                        ?>
                        <li data-animate="rotateInUpLeft, rotateOutUpRight"><?php the_content(); ?></li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p>Aun no se han cargado Sliders. Muy pronto! espera lo nuevo.</p>
            <?php } wp_reset_query(); ?>
        </div>