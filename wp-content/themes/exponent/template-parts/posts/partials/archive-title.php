<?php
$title_tag = 'h1';
if( !empty( $be_related_post_loop ) && $be_related_post_loop == 'in_related_post_loop'){
    $title_tag = apply_filters('be_exp_related_posts_htag','h3');
}
?>
<div class="<?php echo be_themes_get_class( 'post-title-meta' ); ?>">
    <?php get_template_part( 'template-parts/posts/partials/archive-primary', 'meta' ); ?>
    <<?php echo $title_tag; ?>  class="<?php echo be_themes_get_class( 'post-title' ); ?>">
        <a href="<?php the_permalink(); ?>">
            <?php echo the_title(); ?>
        </a>
    </<?php echo $title_tag; ?>>
    <?php get_template_part( 'template-parts/posts/partials/archive-secondary', 'meta' ); ?>
</div>