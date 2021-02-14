<?php
ob_start();
include("includes/header.php");

if (isset($_SESSION['email']))
{
?>
    
    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
                            <img src="assets/img/banner/edu_ilastration.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        
                        <div class="slider_info">
                            <h3>Learn your <br>
                                Favorite Course <br>
                                From Online</h3>
                            <a href="#" class="boxed_btn">Browse Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php
        include("backend/course.php");
        $course = Courses::countCourse();
        $showCourse = Courses::getCoursesLimit();
        include("backend/category.php");
        $category = Categories::countCategory();
        
    ?>
    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h3>Over 7000 Tutorials <br>
                            from <?=$course;?> Courses</h3>
                        <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god
                            moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness open
                            place day great wherein heaven sixth lesser subdue fowl </p>
                    </div>
                </div>

                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Latest Courses</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                            <?php foreach($showCourse as $courses) {?>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single_courses">
                                            <div class="thumb">
                                                <a href="course-details.php?course_id=<?=$courses['courseId']?>">
                                                    <img src="admin/pages/upload/courses/<?= $courses['image'];?>" alt="">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <span><?= $courses['catName']; ?></span>
                                                <h3><a href="#"><?= $courses['title']; ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <div class="col-xl-12">
                                        <div class="more_courses text-center">
                                            <a href="all-courses.php" class="boxed_btn_rev">More Courses</a>
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
    }
    else
    {
        header("location:login.php");

    }


?>