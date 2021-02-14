<?php
    include 'Assets/navbar.php';

    include("../../../backend/slider.php");

  $id = $_GET['id'];
  $sliderData = Sliders::getSliderData($id);
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
              <h3 class="card-title">Update Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
           
           
            <form method = "POST" action = "../../../backend/slider.php" enctype = "multipart/form-data">

                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="hidden" name="slider_id" value = "<?= $id;?>">
                    <input type="file"  name= "image" class="custom-file-input" id="exampleInputFile" value="<?= $sliderData->image;?>">
                </div>
              <div class="card-footer">
                <button type="submit"  name = "update-submit" class="btn btn-primary">Submit</button>
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