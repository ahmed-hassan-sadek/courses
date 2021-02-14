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
              <h3 class="card-title">Add About</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method = "POST" action = "../../../backend/about.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" name="location" class="form-control" id="location" placeholder="Enter Location">
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                </div>

                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
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