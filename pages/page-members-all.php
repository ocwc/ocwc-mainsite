<?php
/*
    Template name: Page Members All
*/

    $member_list = get_member_list();
    // var_dump($member_list);
?>
<?php get_header(); ?>
    <div class="container main-wrapper">
        <div class="col-sm-3">
            <?php get_template_part('partials/members-sidebar'); ?>
        </div>
        <div class="col-sm-9">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part('partials/content', get_post_type()); ?>
            <?php endwhile; ?>

            <p><i class="fa fa-star"></i> = Sustaining Member</p>

            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled">
                        <h2>Institutions of Higher Education</h2>
                    <?php foreach ($member_list->{'Institutions of Higher Education'} as $member) : ?>
                        <li>
                            <a href="/members/view/<?php echo $member->id; ?>/">
                                <?php if ($member->membership_status === 'Sustaining' ) : ?><i class="fa fa-star"></i><?php endif; ?>
                                <?php echo $member->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <?php foreach (array('Associate Consortia', 'Organizational Members', 'Corporate Members', 'Sustaining Members') as $key) : ?>
                        <ul class="list-unstyled">
                        <h2><?php echo $key; ?></h2>
                        <?php foreach ($member_list->$key as $member) : ?>
                            <li>
                                <a href="/members/view/<?php echo $member->id; ?>/">
                                    <?php if ($member->membership_status === 'Sustaining' ) : ?><i class="fa fa-star"></i><?php endif; ?>
                                    <?php echo $member->name; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
