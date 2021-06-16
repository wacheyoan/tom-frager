<main id="primary" class="site-main">
    <?php if( have_rows('logos') ):?>
        <div class="logos-container">
            <?php
            while ( have_rows('logos') ) : the_row(); ?>
                <img src="<?= get_sub_field('images') ?>" alt="">
            <?php
            endwhile;?>
        </div>
    <?php
    endif;
    ?>
</main>

