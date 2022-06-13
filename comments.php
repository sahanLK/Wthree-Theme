<?php

/**
 * @package : Wthree
 *
 *      ======================================
 *           COMMENTS TEMPLATE        
 *      ======================================
 *
 * This file is responsible for displaying comments
 * in this theme.
 */

 /*
 * if the POST is password protected and user has not 
 * entered the password, return safely.
 */

if ( post_password_required() ) {
    return;
}

?>

<div id="comments" class="comment-area">
	<?php if ( have_comments() ) : ?>
        <h2 class="comment-title">
            <?php 
            printf(
                esc_html(
                    esc_html( _nx('One Comment', '%1$s comments', get_comments_number(), 'comments title', 'wthree') )
                ),
                number_format_i18n( get_comments_number() ),
                '<span>'. get_the_title(). '<span>'
            );
            ?>
        </h2>
	<?php endif; ?>
	
	<?php wthree_comments_page_navigation(); ?>

	<ol class="comment-list">
		<?php
		$args = array(
			'walker' 				=> null,
			'max-depth' 			=> '',
			'style' 				=> 'ol',
			'callback' 				=> null,
			'end-callback' 			=> null,
			'type' 					=> 'all',
			'reply_text' 			=> 'reply',
			'page' 					=> '',
			'per_page' 				=> '',
			'avatar_size' 			=> 64,
			'reverse_top_level' 	=> null,
			'reverse_childern' 		=> '',
			'format'				=> 'html5',
			'short_ping' 			=> false,
			'echo'					=> true
		);

		wp_list_comments( $args );
        
		?>
	</ol>
	
	<?php wthree_comments_page_navigation(); ?>
	
	<?php if( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'comments are closed', 'wthree' ); ?></p>
	<?php endif; ?>

	<?php 
    
	$fields = array(
		'author'  => '<div class="row comment-section-rows">' .
						'<div class="col-xs-12 col-sm-2 no-padding">' .
							'<label for="author">' . esc_attr__( 'Name', 'wthree' ) . ( $req ? ' <span class="required">*</span>' : '' ). '</label>' .
						'</div>' .
                		'<div class="col-xs-12 col-sm-7 no-padding">' .
							'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ).'">' .
						'</div>' .
					'</div>',
		
		'email'  => '<div class="row comment-section-rows">' .
						'<div class="col-xs-12 col-sm-2 no-padding">' .
							'<label for="email">' . esc_attr__( 'Email', 'wthree' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' .
						'</div>' .
                		'<div class="col-xs-12 col-sm-7 no-padding">' .
							'<input id="email" class="form-control has-error" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '">' .
						'</div>' .
					'</div>',
		
		'url'=> '<div class="row comment-section-rows">
					<div class="col-xs-12 col-sm-2 no-padding">
						<label for="url">' . __( 'Website', 'wthree' ) . '</label>
					</div>' .
					'<div class="col-xs-12 col-sm-7 no-padding">
						<input id="url" class="form-control" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '">
					</div>
				</div>',
	);
	
	$args = array(
		'class_submit' 		=> 'btn btn-success comment-submit-button',
		'label_submit' 		=> __( 'Submit Comment', 'wthree' ),
		'comment_field' 	=> '<div class="row comment-section-rows">
									<div class="col-xs-12 col-sm-2 no-padding">
										<label for="comment">' .
										esc_attr__( 'Comment *', 'wthree' ) . '</label>
									</div>
									<div class="col-xs-12 col-sm-7 no-padding">
										<textarea id="comment" class="form-control comment-textarea" name="comment" rows="8" placeholder="' . esc_attr__( 'Type your comment...', 'wthree' ) . '">' . '</textarea>
									</div>
								</div>',
		
		'fields' 			=> apply_filters( 'comment_form_default_fields', $fields )
	);
	
	comment_form( $args );
		
	?>
</div><!-- #comments -->
