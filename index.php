<?php
session_start();

// if you do not want to access home page without login
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
    <title>iLearning</title>
</head>

<body>
    <?php require 'parts/_conn.php'; ?>
    <?php require 'parts/_navbar.php'; ?>

    <!-- start =  Slide start from here -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide-1.jpg" class="d-block w-100" alt="...">
                <!-- If you want to write something on slider then write here -->
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img src="img/slide-2.jpg" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img src="img/slide-3.jpg" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div> -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end -->

    <div class="container">
        <h2 class="text-center my-4">Browse Catagories</h2>
        <div class="row">

        <!-- start = generate all thread here -->
        <?php
           $sql = "SELECT * FROM categories3658";
           $result = $conn->prepare($sql);
           $result->execute();
           $result->bindColumn(1,$id);
           $result->bindColumn(2,$catagory);
           $result->bindColumn(3,$cat_desc);
           while($result->fetch(PDO::FETCH_ASSOC)){
            //    echo $catagory;
            echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                   <a href="threadlist.php?cat_id='.$id.'"> <img src="img/card-1.jpg" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?cat_id='.$id.'">'.$catagory.'</a></h5>
                        <p class="card-text">'.substr($cat_desc,0,50).'....</p>
                        <a href="threadlist.php?cat_id='.$id.'" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>';
           }
        ?>
        <!-- end -->


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
