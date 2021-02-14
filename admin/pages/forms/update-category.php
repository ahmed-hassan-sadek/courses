<?php
    include 'Assets/navbar.php';
    include("../../../backend/category.php");

    $id = $_GET['id'];
    $categoryData = Categories::getCategoryData($id);
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
              <h3 class="card-title">Update Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
           
            <form method = "POST" action = "../../../backend/category.php">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="hidden" name="cat_id" value = "<?= $id;?>">
                    <input type="text" name ="cat_name" class="form-control" id= "name" value = "<?= $categoryData->name;?>">
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