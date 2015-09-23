<?php get_header();
?>
<div id="page">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php the_post(); ?>
            <?php the_content(); ?>
        </div>
    </div>  
</div>
    </div>
<?php get_footer(); ?>