<?php
  include 'Assets/navbar.php';

  include("../../../backend/course.php");

  $id = $_GET['id'];
  $courseData = Courses::getCourseData($id);
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      

      <?php include("../../message/success.php")?>
      <?php include("../../message/errors.php")?>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Course</h3>
            </div>
            <!-- /.card-header -->
            
            <!-- form start -->
            <form method = "POST" action = "../../../backend/course.php" enctype = "multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?= $courseData->title;?>">
                </div>

                <div class="form-group">
                  <label for="price">Course Price</label>
                  <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price" value="<?= $courseData->price;?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file"  name= "image" class="custom-file-input" id="exampleInputFile" value="<?= $courseData->image;?>">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Body</span>
                  </div>
                  <textarea name="body" id="" aria-label="With textarea" class="form-control"><?= $courseData->body;?></textarea>
                </div>

                <br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label for="inputGroupSelectB1" class = "input-group-text">Options</label>
                    </div>
                    <select class="custom-select" id="" name ="cat_id" >
                    <option selected value="<?= $courseData->catId; ?>"><?=$courseData->catName ;?></option>
                    <?php
                      include ("../../../backend/category.php");
                      $categories = Categories:: getCategory();

                      while($row = $categories->fetch()){
                        if($row['name'] != $courseData->catName){
                    ?>
                      
                        <option value="<?= $row['id']; ?>"><?= $row['name'];?></option>
                      <?php }}?>
                      <input type="hidden" name="script">
                      <input type="hidden" name="old-image" value="<?=$courseData->image;?>">
                      

                    </select>
                    <input type="hidden" name="course_id" value="<?=$courseData->courseId;?>">
                </div>

              <div class="card-footer">
                <button type="submit" name = "update-submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>


      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    include 'Assets/footer.php';
?>