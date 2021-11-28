<?php
session_start();
// if(!isset($_SESSION['LoggedIn']) || (isset($_SESSION['LoggedIn'])!=true)){
//     header("Location: login.php");
// }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>MT-Discuss</title>
</head>

<body>
    <?php require 'parts/_conn.php'; ?>
    <?php require 'parts/_navbar.php'; ?>
    <div class="searchResult">
    <div class="container col-sm-6 my-4">
    <h3>Search result for '<em><?php echo $_GET['query']; ?></em>'</h3>
        <?php
      $sql = "SELECT * FROM threads3658 WHERE MATCH (thread_title, thread_discription) against (:query)";
      $result = $conn->prepare($sql);
      $result->bindParam(':query', $query);

      $query = $_GET['query'];

    //   $url = 'FullProject/threads.php?Ques_No='.$row['thread_cat_id'];

      $result->execute();
      $noResult = true;
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
          $noResult = false;
          echo '<div class="my-4">
            <b><a href="threads.php?Ques_No='.$row['thread_id'].'">'.$row['thread_title'].'</a></b>
            <p>'.substr($row['thread_discription'],0,50).'......</p>
        </div>';
    }

    if($noResult){
        echo '<div class="container my-4">
        <div class="jumbotron jumbotron-fluid">
        <h2 class="text-center">No Result Found.</h2>
        <p class="lead text-center">Suggestions:
        <ul>
        <li>Make sure that all words are spelled correctly.</li>
        <li>Try different keywords.</li>
        <li>Try more general keywords.</li>
        </ul>
        </p>
      </div>
    </div>';
    }
    ?>
    </div>
    </div>



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