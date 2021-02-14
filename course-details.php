<?php
include("includes/header.php");
    $id = $_GET['course_id'];
    include("backend/course.php");
    $courseData = Courses::getCourseData($id);
?>

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3><?=$courseData->title?></h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
        </div>
        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single_courses">
                                            <div class="thumb">
                                                <img src="admin/pages/upload/courses/<?= $courseData->image;?>" alt="">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <h3><?= $courseData->catName; ?></h3>
                                                <span><?= $courseData->body; ?></span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <?php 
                            include("admin/message/success.php");?>
                            <form method = "POST" action = "backend/requests.php">
                                <div class="card-body">
                                    <div class="form-group">
                                    <label for="location">Name</label>
                                    <input type="text" name="name" class="form-control" id="location" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                                    </div>
                                    <input type="hidden" name="course_id" value = "<?=$id?>">

                                <div class="card-footer">
                                    <button type="submit" name="add-submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
 
        </div>
    </div>


    <!-- popular_courses_end-->
    
<?php
include("includes/footer.php");
?>