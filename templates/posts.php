<div class="poster_live_posts_cat poster_live_posts_cat_<?php echo esc_attr($cat->term_id) ; ?>">
    <div class="poster_live_post_cart">
        <?php
            if(has_post_thumbnail()){  
        ?>
        
        <div class="poster_live_post_thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)"></div>
        <?php
            }
        ?>
        <h2> <?php echo the_title(); ?></h2>
        <p><?php
            $excerpt=substr(the_excerpt(),0,100);
            echo esc_html($excerpt);
        ?></p>
        <div class="poster_live_link-container">
            <a class="poster_live_post_link" href="<?php echo get_permalink(); ?>" >Read More ></a>
        </div>
        <div class="poster_live_meta_info">
            <div class="poster_live_post_date">
            <img class="poster_live_post_icon" src="<?php echo plugins_url( '../images/time.png', __FILE__)?>">
                <?php the_date(); ?>
            </div>
            <div class="poster_live_post_author">
                <img class="poster_live_post_icon" src="<?php echo plugins_url( '../images/user.png', __FILE__)?>"> 
                <?php echo get_the_author_meta( 'display_name' ); ?>
            </div>
        </div>
    </div>
</div>

