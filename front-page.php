<!-- HEADER -->
<?php 
get_header();
?>
<!-- todo:izbaci iz inline u style.css -->
<article style="Width:50%; text-align:justify; margin:auto;">

<!-- Ovdje radim loop i dohvacam sve postove -->
<?php 
    if(have_posts()){
        while(have_posts()){
            the_post();
            the_content();  
        }
    }
    ?>
</article>

<!-- LOAD MORE POSTS -->

<div class="centered;">

    <div class="homepage;" id="load-more-container"></div>

    <div class="load-button">
    <button class="pink-load-button" type="button" class="btn btn-primary" id="load-more-btn"> Load More </button>
    </div>

</div>


<!-- FOOTER -->
<?php 
get_footer();
?>

