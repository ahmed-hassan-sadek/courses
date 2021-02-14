<?php
  include 'Assets/navbar.php';
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          
          <div class="card card-primary">
            <div class="card-header">
            
              <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            
            <!-- form start -->
            <form method="POST" action="../../../backend/category.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name ="name" class="form-control" >
                </div>

              <div class="card-footer">
                <button type="submit" name ="add-submit" class="btn btn-primary">Submit</button>
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