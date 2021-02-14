<?php
    include 'Assets/navbar.php';
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
              <h3 class="card-title">Add Course</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method = "POST" action = "../../../backend/course.php" enctype = "multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                </div>

                <div class="form-group">
                  <label for="price">Course Price</label>
                  <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file"  name= "image" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                  </div>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Body</span>
                  </div>
                  <textarea name="body" id="" aria-label="With textarea" class="form-control"></textarea>
                </div>

                <br>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label for="inputGroupSelectB1" class = "input-group-text">Options</label>
                    </div>
                    <select class="custom-select" id="" name = "cat_id">
                      <option selected>Choose....</option>
                      <?php
                        require_once "../../../backend/category.php";
                        $categories = Categories:: getCategory();

                        while($row = $categories->fetch()) {
                      ?>
                        <option value="<?= $row['id']; ?>"><?= $row['name'];?></option>
                      <?php } ?>
                      
                      <input type="hidden" name="script">
                    </select>
                </div>

              <div class="card-footer">
                <button type="submit" name = "add-submit" class="btn btn-primary">Submit</button>
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