<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin| Admins</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../dist/css/table.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="../../../index.php" class="nav-link">Home</a>
            </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">


      </ul>
  </nav>
  <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index.php" class="brand-link">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Categories</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                    <li class="nav-item">
                        <a href="Courses.php" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Courses
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="Categories.php" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>

                    

                    <li class="nav-item">
                        <a href="Sliders.php" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Slider
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="About_us.php" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>

                    <?php if($_SESSION['role'] == 1 ){
                    ?>
                    <li class="nav-item">
                        <a href="Admins.php" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Admins
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Requests.php" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Requests
                            </p>
                        </a>
                    </li>
                    <?php } ?>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Requests</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Requests</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>course Name</th>
                    <th>Accept</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                        include("../../../backend/requests.php");


                        $request =Requests::getRequest();
                        
                       $counter = 0;

                        while($row = $request->fetch()){
                          $counter++;
                      ?>
                  <tr>
                    <td><?= $counter ;?></td>
                    <td><?= $row['name'];?></td>
                    <td><?= $row['email'];?></td>
                    <td><?= $row['phone'];?></td>
                    <td><?= $row['title'];?></td>
                    <?php if($row['status'] == 0) {?>
                    <td>
                      <h6 style="display:none" id ="accepted<?=$row['id']?>"> Accepted</h6>
                      <button onclick="showFilterItem()" class="id btn btn-primary" value="<?= $row['id'] ?>" id ="update<?=$row['id']?>">Accept</button>
                    </td>
                    <?php }
                    else{?>
                      <td><h6>Accepted</h6></td>
                    <?php }?>
                    <td>
                      <form action="../../../backend/requests.php" method = "POST">
                        <input type="hidden" name="delete_id" value = "<?= $row['id'];?>">
                        <input type="hidden" name="script">
                        <button type="submit" name="delete-submit" class = " id btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                  
                  </tbody>
                  <?php } ?>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>course Name</th>
                    <th>Accept</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
Copyright &copy; 2020 <a href="#">SoftwareTeam</a>. All rights reserved.


</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>



  
<script>

$(".id").click(function(){

    var id = $(this).val();

    $.ajax({
        url:'../../../backend/Requests.php',
        data: {'id':id},
        type: 'POST',
        success: function (){
            $("#update" + id).css('display', 'none');
            $("#accepted" + id).css('display', 'block');
        }
    })

});


</script>
</body>
</html>
