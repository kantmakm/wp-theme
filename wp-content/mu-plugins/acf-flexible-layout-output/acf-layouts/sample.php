<?php /* An example of a simple layout */
$title = get_sub_field( 'title' );
if ( $title ) : ?>
<section class="acf-layout sample">
    <h2><?php echo apply_filters( 'the_title', $title ); ?></h2>
</section><!--/.sample-->
<?php endif; ?>

<?php /* An example of a repeater layout, the "acf_the_content" filter should be applied to WSIWYG fields */
if ( have_rows( 'layout_slug' ) ) : ?>
<section class="acf-layout sample">
<?php while ( have_rows( 'layout_slug' ) ) : the_row();
    $title = get_sub_field( 'title' );
    $copy = get_sub_field( 'content' ); ?>
    <div class="teaser-block">
    <?php if ( $title ) { ?>
        <h2><?php echo apply_filters( 'the_title', $title ); ?></h2>
    <?php } ?>

    <?php if ( $copy ) {
        echo apply_filters( 'acf_the_content', $copy );
    } ?>
    </div>
<?php endwhile; ?>

</section><!--/.sample-->
<?php endif;
