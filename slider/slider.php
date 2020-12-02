<div id="slider-area">
    <div id="slides" class="slides">
        <div id="slides-inner" class="slides-inner">
            <?php $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'order' => 'ASC',
            );
            $my_query = new WP_Query($args); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                <article <?php post_class('slidekiji'); ?>>

                    <div class="top-case-list">
                        <a href="<?php the_permalink(); ?>" class="slider-link">
                            <object data="" type="">
                                <div class="top-case-image">
                                    <?php if (get_the_post_thumbnail_url()) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                    <?php else : ?>
                                    <?php endif; ?>
                                </div>

                                <ul class="top-case-items">
                                    <li><?php if (get_field('case_logo')) : ?>
                                            <img src="<?php the_field('case_logo'); ?>" />
                                        <?php endif; ?></li>
                                    <li><?php the_field('company_name'); ?></li>
                                    <li><?php the_title(); ?></li>
                                    <li> <?php the_tags(''); ?></li>
                                    <li> <?php the_field('service_name'); ?></li>
                                </ul>
                            </object>
                        </a>
                    </div>
                </article>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
    <!-- <div id="slides-nav" class="slides-nav"></div> -->
</div>