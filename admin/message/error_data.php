<?php if(isset($_SESSION['error_data'])) {?>
    <div class="alert alert-danger">
        <?= $_SESSION['error_data'];?>
        <?php unset($_SESSION['error_data']);?>
    </div>

<?php } ?>