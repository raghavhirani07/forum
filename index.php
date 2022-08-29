



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
    <div class="continer">
        <?php include'partials/_header.php'; ?>
        <!-- Slider star  -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 " src="image/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 " src="image/2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="image/1.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- slider End Here -->





        <div class="container">
            <center>
                <h3 class="mt-3">i-Discuss Category</h3>
            </center>


            <div class="row">
                <!-- user a for loop for iteration -->
                <?php
                $sql="SELECT * FROM  `category`";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                    //
                    echo'  <div class="card m-4  " style="width: 18rem;">
                            <img class="card-img-top " src="https://source.unsplash.com/50x50/?code,language,'.$row['category_name'].'" alt="Card image cap">
                            <div class="card-body d-flex flex-column justify-content-between  ">
                                <div>
                                    <h5 class="card-title">'.$row['category_name'].'</h5>
                                    <p class="card-text "  >'.substr($row['category_desc'],0,90).'...</p>
                                </div>
                                <div>
                                    <a href="   thread_list.php?catid='.$row['category_id'].'" class="   btn btn-primary ">view Thread </a>
                                </div>
                            </div>
                        </div>';
                }
            ?>
            </div>
        </div>









        <!-- <?php include'partials/_footer.php'; ?> -->

    </div>
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