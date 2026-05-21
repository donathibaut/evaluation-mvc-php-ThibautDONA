<?php if(isset($_SESSION['successMess'])) : ?>

    <!-- SUCCESS MESSAGE -->
    <p class="successMsg"><?php echo $_SESSION['successMess'] ?></p>

    <?php unset($_SESSION['successMess']) ?>

    <?php
        // Allow to show the message before destroying $_SESSION
        if(!isset($_SESSION['ID_USER'])) : 
    ?>
        <?php         
        /** Delete the session cookie */
        session_destroy(); 
        ?>
    <?php endif; ?>
<?php endif; ?>