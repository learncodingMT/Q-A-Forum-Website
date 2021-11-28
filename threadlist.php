<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MT-Discuss-threadlist</title>
</head>

<body>
    <?php require 'parts/_conn.php'; ?>
    <?php require 'parts/_navbar.php'; ?>
    <?php
        $sql = "SELECT * FROM categories3658 WHERE cat_no = ?";

        $result = $conn->prepare($sql);
        
        $result->bindParam(1,$id);
        $id = $_GET['cat_id'];
        
        $result->execute();
    
        $row = $result->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container customClass">

        <!-- Start = There is all about forum -->
        <div class="jumbotron my-2">
            <h1 class="display-6">Welcome to <?php echo $row['Catagories']; ?> Forum</h1>
            <p class="lead"><?php echo $row['Discription'] ?></p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            <hr class="my-4">
            <h5 class="mt-4">Rules for this Forum: </h5>
            <p>No Spam / Advertising / Self-promote in this forum.<br>
                Do not post copyright-infringing material in this forum <br>
                Do not cross post questions.... <br>
                Remain respectful of other members at all times.
            </p>
        </div>
        <!-- end -->
    </div>
    <!-- Start = Question Field -->
    <?php
    try{
        $alert = false;
        $alert2 = false;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(($_REQUEST['title']=="") || ($_REQUEST['problemDiscription']=="")){
                $alert = true;
            }else{
           if(!isset($_SESSION['LoggedIn']) || (isset($_SESSION['LoggedIn'])!=true)){
            $alert2 = true;
            echo '<script>
             function redirectIndex() {
              location.href = "login.php";
             }
            
             setTimeout(redirectIndex, 1000);  
             </script>';
           }else{
             try{
                // Pull user ka naam from user table
            $sql2 = "SELECT * FROM user3658 WHERE Email = :email";
    
            $result2 = $conn->prepare($sql2);
    
            $result2->bindParam(':email', $email, PDO::PARAM_STR);
    
            $email = $_SESSION['email'];
            
            $result2->execute();
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
             }
             catch(PDOException $e){
                echo "404 error not found";
             }
            
    
            // end
               try{
                $sql = "INSERT INTO threads3658 (thread_title, thread_discription, thread_user,thread_cat_id) VALUES (:title, :discrip, :user, :cat_id)";
                $result = $conn->prepare($sql);
                
              //   $result->bindParam(':id',$id);
                $result->bindParam(':title',$title);
                $result->bindParam(':discrip',$desc);
                $result->bindParam(':user',$user);
                $result->bindParam(':cat_id',$threadid);
                $title = $_REQUEST['title'];
                $title = str_replace('<','&lt',$title);
                $title = str_replace('>','&gt',$title);
                $desc = $_REQUEST['problemDiscription'];
                $desc = str_replace('<','&lt',$desc);
                $desc = str_replace('>','&gt',$desc);
                $user = $row2['Name'];
                $threadid = $_GET['cat_id'];
    
                $result->execute();
               }
               catch(PDOException $e){
                   echo "404 error not found";
               }
               
                 }  
            }
        }
    }catch(PDOException $e){
        echo "404 Error not found";
    }
    
    if($alert){
        echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Wrong!</strong> All Field Required.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
       }
    if($alert2){
        echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Wrong!</strong> Please Login First !!!!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
       }
    ?>
    <div class="container">
        <section class="col-sm-6">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                <div class="form-group">
                    <h3>Drop a Question !</h3>
                    <label for="text">Problem tittle</label>
                    <input type="text" name="title" class="form-control" placeholder="Ask a question ??"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="text" class="form-text text-muted">Write Short and crisp tittle</small>

                    <label for="exampleFormControlTextarea1">Elaborate your problem! (optional)</label>
                    <textarea class="form-control" name="problemDiscription" id="exampleFormControlTextarea1"
                        placeholder="Describe!"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Post Question</button>
            </form>
        </section>
    </div>
    <!-- End -->
    <!-- Start = Pull Question from database -->
    <div class="container custommargin">
        <h3 class="text-center">Browse Questions</h3>
        <?php
        $sql = "SELECT * FROM threads3658 WHERE thread_cat_id = ?";

        $result = $conn->prepare($sql);
        
        $result->bindParam(1,$id);
        $id = $_GET['cat_id'];
        
        $result->execute();
    
        $noResult = true;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $noResult = false;
            echo '<div class="media my-4">
            <img src="img/user_login2.png" width="40px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"><a href="threads.php?Ques_No='.$row['thread_id'].'">'.$row['thread_title'].'</a></h5>'.
                substr($row['thread_discription'],0,50).'.....
            </div>
        </div>';
        }
        if($noResult){
            echo '<div class="container col-sm-8">
            <div class="jumbotron jumbotron-fluid">
            <h2 class="text-center">No Question Found</h2>
            <p class="lead text-center">Be the first person to Post a Question.</p>
          </div>
        </div>';
        }
      
    ?>

    </div>
    <!-- end -->
</body>

</html>