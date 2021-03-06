<?php
/*
	Template name: ACE Form - Form submissions
*/
?>
<?php get_header(); ?>

<?php
$form    = GFFormsModel::get_form_meta( 16 );
$entries = array();
$values  = array();

$paging = array( 'offset' => 0, 'page_size' => 200 );

foreach ( GFAPI::get_entries( 16, null, null, $paging ) as $entry ) {
    foreach ( $form['fields'] as $field ) {

        if ( $field['id'] === 1 ) {

            $values[ $field['id'] ] = array(
                'id'    => $field['id'],
                'label' => "Nominator's Name",
                'value' => $entry['1.3'] . ' ' . $entry['1.6'],
            );

        } elseif ( $field['id'] === 5 ) {

            $values[ $field['id'] ] = array(
                'id'    => $field['id'],
                'label' => "Nominee's Name",
                'value' => $entry["5.3"] . " " . $entry["5.6"],
            );

        } else {

            $values[ $field['id'] ] = array(
                'id'    => $field['id'],
                'label' => $field['label'],
                'value' => $entry[ $field['id'] ],
            );

        }

        $values[ $field['id'] ]['type'] = $field['type'];

    }

    $entries[] = array(
        'id'     => $entry['id'],
        'values' => $values
    );

}
?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php if ( post_password_required( $post ) ) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php get_template_part( 'partials/content', get_post_type() ); ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php $categories = array(
//                                'INDIVIDUAL AWARDS',
//                                'STUDENT AWARD',
//                                'RESOURCES / TOOLS / PRACTICES AWARDS'
                            'OPEN EDUCATIONAL RESOURCES (OER)',
                            'TOOLS & PRACTICES',
                        );
                        ?>

                        <?php foreach ( $categories as $category ) : ?>
                            <h1><?php echo $category; ?></h1>

                            <?php foreach ( $entries as $entry ) : ?>

                                <?php if ( $entry['values'][46]['value'] === $category ) : ?>
                                    <h2 id="<?php echo 'form-' . $entry['id']; ?>"><a
                                            href="#<?php echo 'form-' . $entry['id']; ?>">Submission
                                            #<?php echo $entry['id']; ?> (<?php echo $category; ?>)</a></h2>

                                    <dl>
                                        <?php foreach ( $entry['values'] as $field ) : ?>
                                            <?php if ( $field['type'] == 'section' ) : ?>
                                                <h3><?php echo $field['label'] ?></h3>
                                            <?php elseif ( $field['type'] == 'fileupload' ) : ?>
                                                <dt><?php echo $field['label'] ?></dt>
                                                <dd>
                                                    <?php $link = trim( stripcslashes( $field['value'] ), '[]"' ); ?>
                                                    <a href="<?php echo $link; ?>"><?php echo $link; ?></a>
                                                </dd>
                                            <?php else : ?>
                                                <?php if ( $field['value'] ) : ?>
                                                    <dt><?php echo $field['label'] ?></dt>
                                                    <dd><?php echo $field['value'] ?></dd>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </dl>
                                    <hr/>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
