<?php
    require 'header.php';
?>

    <main>
        <div class="container">
        <?php
            if (isset($_SESSION['uid'])) {
                echo '<p>Hello, ' .$_SESSION['username'].'</p>';
            }
            else {
                echo '<p>You are logged out!</p>';
            }
        ?>
            
        </div>
    </main>

<?php
    require 'footer.php';
?>