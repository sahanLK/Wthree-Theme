<?php 

/*
@package wthree

    ==================================
        IMAGE POST FORMAT
    ==================================

*/

?>

<div class="single-post-container">
    
	<a href="<?php echo get_the_permalink(); ?>" class="post-title">
		<?php echo the_title(); ?> 
	</a>
    
	<small>
        <?php wthree_get_categories(); ?>
		<?php wthree_get_tags(); ?>
        <?php wthree_get_date_archive(); ?>
	</small>
    
	<div class="image-post-container">
        
        <div class="image-post-image">
            <a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'full', 'style=width: 100%; height: auto;' ); ?></a>
        </div>
        
		<div class="image-post-text">
			<?php 
			$excerpt = get_the_excerpt();
			$excerpt = wp_trim_words( $excerpt, 30, '...' );
			echo '<p>'.$excerpt.'</p>';
			?>
		</div>
        
	</div> <br />
    
	<div class="read-more">
		<a href="<?php echo get_the_permalink(); ?>" class="read-more">READ MORE  ❯❯</a>
	</div>
    
</div>
