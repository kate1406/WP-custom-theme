<!-- HEADER -->
<?php 
get_header();
?>

<!-- todo:izbaci iz inline u style.css -->
<article style="width:50%; text-align:center; margin:auto;">

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
    <div class="centered;" id="load-more-container"></div>
</div> 

<!-- FOOTER -->
<?php 
get_footer();
?>

