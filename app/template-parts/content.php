<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package juliaday
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        
        <?php if ( has_post_thumbnail() ) { ?>
            <figure class="featured-image">
                <?php the_post_thumbnail(); ?>
            </figure>
        <?php } ?>
        
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title index-excerpt"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
        
        if ( has_excerpt( $post->ID ) && is_single() ) {
            echo '<div class="deck">';
            echo '<p>' . get_the_excerpt() . '</p>';
            echo '</div><!-- .deck -->';
        }

		if ( 'post' === get_post_type() ) {
			if ( is_single() ) {
                echo '<div class="entry-meta">';
                juliaday_posted_on();
                echo '</div><!-- .entry-meta -->';
            }
            else {
                echo '<div class="index-entry-meta">';
                juliaday_index_posted_on();
                echo '</div><!-- .index-entry-meta -->';
            }
		} ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
            if ( is_single() ) {
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'juliaday' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
                
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'juliaday' ),
                    'after'  => '</div>',
                ) );
            }
            else {
                the_excerpt();
            }
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php juliaday_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
