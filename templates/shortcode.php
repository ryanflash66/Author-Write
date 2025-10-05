<?php
/**
 * Shortcode template for Author Write.
 *
 * @package Author_Write
 */

?>
<div class="author-write" data-author-write-version="<?php echo esc_attr( AUTHOR_WRITE_VERSION ); ?>">
    <div class="author-write__modes" role="group" aria-label="<?php echo esc_attr__( 'Author Write modes', 'author-write' ); ?>">
        <button type="button" class="author-write__mode-button is-active" data-mode="review">
            <?php echo esc_html__( 'Review', 'author-write' ); ?>
        </button>
        <button type="button" class="author-write__mode-button" data-mode="character">
            <?php echo esc_html__( 'Character', 'author-write' ); ?>
        </button>
        <button type="button" class="author-write__mode-button" data-mode="plot">
            <?php echo esc_html__( 'Plot', 'author-write' ); ?>
        </button>
    </div>
    <div class="author-write__placeholder" role="status">
        <p><?php echo esc_html__( 'The Author Write assistant placeholder will be replaced with chat functionality in upcoming steps.', 'author-write' ); ?></p>
    </div>
</div>
