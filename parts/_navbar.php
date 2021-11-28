<?php
if(!isset($_SESSION['email']) && isset($_SESSION['LoggedIn'])!=true){
  $logout = false;
}else{
  $logout = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    .loginsignupcustom {
        color: green;
    }

    .loginsignupcustom:hover {
        color: white;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <?php
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
<a class="navbar-brand" href="index.php">MT Discuss</a>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>';
    if($logout == true){
      // Select user ka name for welcome of user on index page
      include 'parts/_conn.php';
      $sql = "SELECT * FROM user3658 WHERE Email = :email";

        $result = $conn->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);

        $email = $_SESSION['email'];
        
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
      echo '<li class="nav-item">
      <a class="nav-link" href="student/stuDashboard.php">Welcome '.$row['Name'].'</a>
    </li>';
    }
    echo '<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
  </ul>';
  
  echo '<form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
    <input class="form-control mr-sm-2" name= "query" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>';

  
if($logout == false){
   echo '<button type="button" class="btn btn-outline-success ml-1">
   <a class="loginsignupcustom" href="login.php">Login</a>
 </button>
 <button type="button" class="btn btn-outline-success ml-1">
 <a class="loginsignupcustom" href="signup.php">Sign Up</a>
 </button>';
}
  
if($logout == true){
   echo '<button type="button" class="btn btn-outline-success ml-1">
   <a class="loginsignupcustom" href="logout.php">Logout</a>
   </button>';
}

echo '</div>
</nav>';
?>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>