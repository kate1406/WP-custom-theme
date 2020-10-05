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
    <div class="centered;" id="load-more-container"></div>
</div> 

<?php 
get_footer();


