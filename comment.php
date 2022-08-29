<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Comment page </title>
</head>

<body>
    <?php include'partials/_header.php'; ?>
    <?php include'partials/_dbconnect.php'; ?>

    <?php
     $id=$_GET['catid'];
     $threadis=$_GET['threadid'];
     $sql="SELECT * FROM  `thread` WHERE `thread_id`='$threadis' AND `thread_cat_id`='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    ?>
    <?php
     $sucesscomment=false;
        if(array_key_exists('desc',$_POST)){
            $des=$_POST['desc'];
            $des=str_replace('<','&lt;',$des);
            $des=str_replace('>','&gt;',$des);
            $user_id=$_SESSION['userid'];
            $sql="INSERT INTO `comment` ( `content`,  `thread_id`,`user_id`) VALUES ( '$des',  '$threadis','$user_id');";
            $result=mysqli_query($conn,$sql);
            if($result){
                $sucesscomment=true;
            }


        }
    ?>
    <?php
        if($sucesscomment){
        echo'     <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Holy User </strong> Succesfully add the Comment in thread
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
            ';
        }
    ?>



    <div class="continer mt-3 ml-4 mr-4">
        <div class="jumbotron p-4">
            <!-- <?php var_dump($row); ?> -->
            <h1 class="display-5"><?php echo "Hello  ".$row['thread_title']."  Devloper" ; ?> </h1>
            <p class="lead"><?php echo $row['thread_desc']; ?> </p>
            <?php
            $userid=$row['thread_user_id'];
            $sql="SELECT * FROM `users` WHERE `user_id`='$userid'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);


            ?>
            <p> Post by <?php echo $row['user_name']; ?> </p>
        </div>
    </div>



    <div class="container">
    <?php
        if(array_key_exists('loggedin',$_SESSION)){
        echo '<div>
            <h3 class="py-3"> Browse Your Answer</h3>
            <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
                <div class="form-group">

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Enter Your openion</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
        }
            else{
                echo '<div class="container"><h3 class="py-3"> Browse Your Answer</h3>
                <p> You have to login to post a comment
                </p></div>';
            }
    ?>




        <div class="container">
            <h3 class="py-3"> Discussions </h3>
            <?php

                $id=$_GET['catid'];
                $threadis=$_GET['threadid'];
                $sql="SELECT * FROM `comment` WHERE `thread_id`='$threadis'";
                $result=mysqli_query($conn,$sql);
                $nullalert=true;

                while($row=mysqli_fetch_assoc($result))
                        {
                            $userid=$row['user_id'];
                            $sql1="SELECT * FROM `users` WHERE `user_id`='$userid'";
                            $result1=mysqli_query($conn,$sql1);
                            $row1=mysqli_fetch_assoc($result1);

                            $nullalert=false;
                            echo'
                                    <div class="media my-3">
                                        <img src="image/download_1.png" class="mr-3 " alt="..." width="50px" height="100%">
                                        <div class="media-body">
                                                <h5 class="mt-0 mb-0"> <b><p class="m-0 text-left">'.$row1['user_name'].'</p></b></h5>
                                                <p class="p-0">'.$row['content'].'</p>
                                        </div>
                                        <div>
                                        <h5><p class="d-inline text-muted">'.substr($row1['timestamp'] , 0 , 10).'</p></h5>
                                        </div>
                                    </div>';

                        }
                        if($nullalert){
                           echo' <div class="media my-3">
                                        <div class="media-body">

                                                <h5 class="mt-0">You are the first Persone to enter commite </h5>

                                        </div>
                                </div>';
                        }
                ?>
        </div>
        <!-- <?php include'partials/_footer.php'; ?> -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
</body>

</html>