<?php
    include 'Assets/navbar.php';

    include("../../../backend/about.php");

    $id = $_GET['id'];
    $aboutData = About::getAboutData($id);
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <?php include("../../message/success.php"); ?>
          <?php include("../../message/errors.php"); ?>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update About</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method = "POST" action = "../../../backend/about.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" name = "location" class="form-control" id="location" value="<?=$aboutData->location;?>">
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="text" name="phone" class="form-control" id="phone" value="<?=$aboutData->phone;?>">
                </div>

                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email" value="<?=$aboutData->email;?>">
                  </div>

              <div class="card-footer">
                <button type="submit" name="update-submit" class="btn btn-primary">Submit</button>
              </div>
              <input type="hidden" name="about_id" value = "<?=$aboutData->id;?>">
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