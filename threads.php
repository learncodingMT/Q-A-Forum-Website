<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MT-Discuss-threads</title>
    <link rel="stylesheet" href="style.css">
    <style>
    /* .margincustom{
        margin-top: 200px;
    } */
    </style>
</head>

<body>
    <?php  require 'parts/_conn.php';  ?>
    <?php  require 'parts/_navbar.php';  ?>


    <div>
        <div class="container margincustom">
     <?php
     try{
        $sql = "SELECT * FROM threads3658 WHERE thread_id = ?";

        $result = $conn->prepare($sql);
        
        $result->bindParam(1,$id);
        $id = $_GET['Ques_No'];
        
        $result->execute();
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="jumbotron my-2">
        <h1 class="display-6">'.$row['thread_title'].'</h1>
        <p class="lead">'.$row['thread_discription'].'</p>
        <h5 class="mt-4">Rules for this Forum: </h5>
        <p>No Spam / Advertising / Self-promote in this forum.<br>
            Do not post copyright-infringing material in this forum <br>
            Do not cross post questions.... <br>
            Remain respectful of other members at all times.
        </p>
       </div>';
    } 
  }catch(PDOException $e){
         echo "404 Error not found";
  }
         
    ?>
    <!-- Insert user answer in database -->
 <?php
    try{
        $alert = false;
        $alert2 = false;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty ( trim($_POST['userAnswer']))){
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
                $sql = "INSERT INTO answer3658 (answer_content, answer_by, Ques_id) VALUES (:content, :user, :ques_id)";
                $result = $conn->prepare($sql);
                
              //   $result->bindParam(':id',$id);
                $result->bindParam(':content',$content);
                $result->bindParam(':user',$user);
                $result->bindParam(':ques_id',$quesid);
                $content = $_REQUEST['userAnswer'];
                $content = str_replace('<','&lt',$content);
                $content = str_replace('>','&gt',$content);
                // $content =  htmlspecialchars($content);
                // $content = urlencode($content);
                $user = $row2['Name'];
                $quesid = $_GET['Ques_No'];
        
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
    <!-- end -->
        <h3 class="text-center">Discussion</h3>
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                <div class="form-group col-sm-8">
                    <label for="exampleFormControlTextarea1">
                        <h5>Please drop Your Answer !!!</h5>
                    </label>
                    <textarea class="form-control" name="userAnswer" id="exampleFormControlTextarea1"placeholder="Drop Answer!" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Drop Answer</button>
            </form>



        <!-- Pull Answer from database -->
        <?php
        try{
            $sql = "SELECT * FROM answer3658 WHERE Ques_id = :ques_id";

            $result = $conn->prepare($sql);
            
            $result->bindParam(':ques_id',$id);
            $id = $_GET['Ques_No'];
            
            $result->execute();
        
            $noResult = true;
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $noResult = false;
                echo '<div class="media my-4">
                <img src="img/user_login2.png" width="40px" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">'.$row['answer_by'].'</h5>'.
                    $row['answer_content'].'
                </div>
            </div>';
            }
        }catch(PDOException $e){
            echo "404 Error not found";
        }

        if($noResult){
            echo '<div class="container col-sm-8">
            <div class="jumbotron jumbotron-fluid">
            <h2 class="text-center">No Answer Found</h2>
            <p class="lead text-center">Be the first person to Drop a Answer.</p>
          </div>
        </div>';
        }
        
       ?>
        </div>
    </div>
</body>

</html>