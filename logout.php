<?php require 'parts/_navbar.php'   ?>
<?php
session_start();

session_unset();
session_destroy();

echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> You are logout !!!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
echo '<script>
            function redirectIndex() {
              location.href = "login.php";
            }
            
            setTimeout(redirectIndex, 1500);  
            </script>';

?>