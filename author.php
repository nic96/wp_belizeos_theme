<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="<?php nomad_main_classes(); ?>" role="main">

<article class="block">
<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    <header>
            <div class="article-header">
                <h1 class="title">About: <?php echo $curauth->display_name; ?></h1>
            </div>
    </header>
    <dl>
<?php if($curauth->user_url) { ?>
        <dt>Website</dt>
        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
<?php } ?>
        <dt><h2>Profile</h2></dt>
        <dd><?php echo $curauth->user_description; ?></dd>
    </dl>

    <h2>Posts by <?php echo $curauth->display_name; ?></h2>

    <ul>
<!-- The Loop -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            <?php the_title(); ?></a>,
            <?php the_date(); ?> in <?php the_category('&');?>
        </li>

    <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>

    <?php endif; ?>

<!-- End Loop -->

    </ul>
    </article>
    </div>

    <?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
