<?php if(isset($_SESSION['successMess'])) : ?>
    <p><?php echo $_SESSION['successMess'] ?></p>
    <?php unset($_SESSION['successMess']) ?>
    <?php if(!isset($_SESSION['ID_USER'])) : ?>
        <?php         
        /** Delete the session cookie */
        session_destroy(); 
        ?>
    <?php endif; ?>
<?php endif; ?>