<?php 
    if(!empty($_SESSION['message']))
    {?>
        <div class = "alert alert-success" role = "alert">
            <?= $_SESSION['message'] ;?>
            <?php unset($_SESSION['message'])?>
        </div>
        <!--   -->
    <?php }
?>