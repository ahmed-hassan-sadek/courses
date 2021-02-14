<?php
include("includes/header.php");
$id = $_GET['id'];
include("backend/course.php");

$catcourses = Courses::showCourses($id);

include("backend/category.php");
$catName = Categories::showCategory($id);
$cats = $catName->fetch();

?>

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3><?=$cats['name']?></h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3><?=$cats['name']?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <?php foreach($catcourses as $course) {?>
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="single_courses">
                                                <div class="thumb">
                                                    <a href="#">
                                                        <img src="admin/pages/upload/courses/<?= $course['image'];?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="courses_info">
                                                    <span><?= $course['catName']; ?></span>
                                                    <h3><a href="#"><?= $course['title']; ?></a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>

                                
                            </div>
                            </div>
                                    
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->
    
    
    <?php
include("includes/footer.php");
?>