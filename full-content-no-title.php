<?php
/**
 * Flexible Posts Widget: Full content template, no title.
 * For use with https://wordpress.org/plugins/flexible-posts-widget/
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo $before_title . $title . $after_title;

if( $flexible_posts->have_posts() ):
?>
	<ul class="dpe-flexible-posts">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
                if ( $thumbnail == true ) {
                    // If the post has a feature image, show it
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( $thumbsize );
                    // Else if the post has a mime type that starts with "image/" then show the image directly.
                    } elseif ( 'image/' == substr( $post->post_mime_type, 0, 6 ) ) {
                        echo wp_get_attachment_image( $post->ID, $thumbsize );
                    }
                }
            ?>
			<div class="content"><?php the_content(); ?></div>
		</li>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
<?php	
endif; // End have_posts()
	
echo $after_widget;
