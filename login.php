<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - view</title>
        <link href="admin/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                    
                        <div class="row justify-content-center">
                            <div class="col-lg-5">

                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <?php include("admin/message/success.php") ?>
                                <?php include("admin/message/errors.php") ?>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">تسجيل الدخول</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action = "backend/auther.php">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">البريد الاكنروني</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name = "email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputPassword">كلمة السر</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name= "password"/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                                <a href="signUp.php" class="btn btn-primary">signUp</a>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <a href="#"> SofrwareTeam</a> 2020</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
    </body>
</html>
