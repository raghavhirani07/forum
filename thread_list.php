<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>iDisscuss</title>
</head>

<body>

    <?php include'partials/_header.php'; ?>
    <?php include'partials/_dbconnect.php'; ?>
    <?php
        $succesenterdata=false;
    if(array_key_exists('title',$_POST)){
        $threadtitle=$_POST['title'];
        $threaddesc=$_POST['desc'];
        $threaddesc=str_replace('<','&lt;',$threaddesc);
        $threaddesc=str_replace('>','&gt;',$threaddesc);
        $id=$_GET['catid'];
        $userid=$_SESSION['userid'];

        $sql="INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`,`thread_user_id`) VALUES ( '$threadtitle', '$threaddesc', '$id','$userid')";
       $result=mysqli_query($conn,$sql);
       if($result){
        $succesenterdata=true;
       }

    }
    ?>


    <!-- ALert  -->
    <?php
        if($succesenterdata){
        echo'     <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Holy User</strong> Succesfully add the question in thread
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
            ';
        }
    ?>


    <!-- Title  -->
    <?php
     $id=$_GET['catid'];
     $sql="SELECT * FROM  `category` WHERE `category_id`='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result)
    ?>
    <div class="continer m-3">
        <div class="jumbotron p-4">
            <h1 class="display-5"><?php echo "Hello  ".$row['category_name']."  Devloper" ; ?> </h1>
            <p class="lead"><?php echo $row['category_desc']; ?> </p>
            <hr class="my-2">
            <p>
            <ul>
                <li>No Spam / Advertising / Self-promote in the forums. ...</li>
                <li>Do not post copyright-infringing material. ...</li>
                <li>Do not cross post questions. ...</li>
                <li>Do not post “offensive” posts, links or images. ...</li>
            </ul>
            </p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>


    <div class="container">
        <?php
         if(array_key_exists('loggedin',$_SESSION)){
        echo '<div>
            <h3 class="py-3"> Browse Your Question</h3>
            <form action="'. $_SERVER['REQUEST_URI'].'" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Thread title </label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp"
                        placeholder="Enter Thread title " required>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Enter Thread discription</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
        }
        else{
            echo '<div ><h3 class="py-3"> Browse Your Answer</h3>
            <p> You have to login to post a comment
            </p></div>';
        }
    ?>
        <h3 class="py-3"> Browse Your component </h3>
        <?php

            $id=$_GET['catid'];
            $sql="SELECT * FROM `thread` WHERE `thread_cat_id`='$id'";
            $result=mysqli_query($conn,$sql);
            $noresult=true;


                while($row=mysqli_fetch_assoc($result))
                    {
                        $user_thread_id=$row['thread_user_id'];
                        $sql1="SELECT * FROM `users` WHERE `user_id`='$user_thread_id'";
                        $result1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($result1);
                        // echo var_dump($row1);
                            $noresult=false;
                            echo'
                                    <div class="media my-3">
                                        <img src="image/download_1.png" class="mr-3 " alt="..." width="50px" height="50px">
                                        <div class="media-body">
                                                <h5 class="mt-0"><a href="comment.php?catid='.$id.'&&threadid='.$row['thread_id'].'" >'.$row['thread_title'].' </a></h5>
                                                <p>'.$row['thread_desc'].'</p>
                                        </div>
                                        <div>
                                       <b> <p>'.$row1['user_name'].'</p></b>

                                        </div>
                                    </div>';

                    }
                if($noresult)
                {
                    echo'
                                    <div class="media my-3">
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