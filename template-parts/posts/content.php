<?php 

/*
@package wthree

    ==================================
        STANDARD POST FORMAT
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
	<div class="post-row">
		<div class="featured-image col">
			<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', 'style=width: 100%, height: 100%;' ); ?></a>
		</div>
		<div class="user-content col">
			<?php 
			$excerpt = get_the_excerpt();
			$excerpt = wp_trim_words( $excerpt, 50, '...' );
			echo '<p>'.$excerpt.'</p>';
			?>
			<br />
		</div>
	</div> <br />
	
	<div class="read-more">
        <a href="<?php echo get_the_permalink(); ?>" class="read-more">READ MORE  ❯❯</a>
	</div>
</div>
