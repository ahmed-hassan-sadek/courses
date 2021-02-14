<?php
session_start();
?>

<html>
   <head>
    <link rel="stylesheet" href="admin/dist/css/sign_up.css">
    </head>
    <body>
        <div>
      <form action="backend/auther.php" method="POST">
      <h2>sign up </h2>
        <input id="in1" type="text" name="name" placeholder="Name *"><br><br>
        <input type="email" name="email" placeholder="your Email *"><br><br>
        <input type="password" name="password" placeholder="Password *"><br><br>
        <button type="submit" name="sign-submit">Sign Up</button>


      </form>
      </div>
    </body>
</html>