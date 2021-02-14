<?php
include("includes/header.php");
?>
   <!-- bradcam_area_start -->
     <div class="courses_details_banner">
         <div class="container">
             <div class="row">
                 <div class="col-xl-6">
                     <div class="course_text">
                            <h3><?= $courses['name'];?></h3>
                            <?php if($found){?>
                            <div class="rating">
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <i class="flaticon-mark-as-favorite-star"></i>
                                <span>(5)</span>
                            </div>
                            <?php }?> 
                     </div>
                 </div>
             </div>
         </div>
    </div>
    <!-- bradcam_area_end -->

    <?php if($found) { ?>
    <div class="courses_details_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="single_courses">
                        <h3>Desription</h3>
                        <p><?= $courses['desc'];?> </p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="courses_sidebar">
                        <div class="video_thumb">
                            <img src="uploads/courses/<?= $courses['img'];?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

<?php
include("includes/footer.php");
?>