<?php
/**
 * Shortcode template for Author Write.
 *
 * @package Author_Write
 */

?>
<div class="author-write" data-author-write-version="<?php echo esc_attr( AUTHOR_WRITE_VERSION ); ?>">
    <div class="author-write__modes" role="group" aria-label="<?php echo esc_attr__( 'Author Write modes', 'author_write' ); ?>">
        <button type="button" class="author-write__mode-button is-active" data-mode="review" aria-pressed="true">
            <?php echo esc_html__( 'Review', 'author_write' ); ?>
        </button>
        <button type="button" class="author-write__mode-button" data-mode="character" aria-pressed="false">
            <?php echo esc_html__( 'Character', 'author_write' ); ?>
        </button>
        <button type="button" class="author-write__mode-button" data-mode="plot" aria-pressed="false">
            <?php echo esc_html__( 'Plot', 'author_write' ); ?>
        </button>
    </div>
    <button type="button" class="author-write__reset" hidden>
        <?php echo esc_html__( 'Reset modes', 'author_write' ); ?>
    </button>
    <div class="author-write__placeholder" role="status">
        <p><?php echo esc_html__( 'The Author Write assistant placeholder will be replaced with chat functionality in upcoming steps.', 'author_write' ); ?></p>
    </div>
</div>
