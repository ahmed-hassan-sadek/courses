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
              <h3 class="card-title">Add Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="../../../backend/slider.php" enctype = "multipart/form-data" method="POST">

                <div class="form-group">
                  <label for="exampleInputFile">Image input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                      <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                    </div>

                  </div>
                </div>

              <div class="card-footer">
                <button type="submit" name="add-submit" class="btn btn-primary">Submit</button>
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