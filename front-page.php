<?php 
get_header();
?>
<div class="article-center">

<?php 
    if(have_posts()){
        while(have_posts()){
            the_post();
            the_content();  
        }
    }
    ?>
</div>

<div class="centered;">

    <div class="homepage;" id="load-more-container"></div>
    <div class="load-button">
    <button class="pink-load-button" type="button" class="btn btn-primary" id="load-more-btn"> <?php echo esc_html__('Load More','text-domain');?> </button>
    </div>


    
</div>

<?php 
get_footer();


