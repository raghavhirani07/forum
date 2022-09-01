<?php

include 'partials/_handleSignup.php';
include 'partials/_handleLogin.php';
require'partials/_dbconnect.php';

if(!isset($_SESSION)){
  session_start();
}

echo'   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum">I Disscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="contact.php">Contact </a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Top category
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">';


    $sql="SELECT category_name,category_id FROM `category` LIMIT 7";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      echo'<a class="dropdown-item" href="thread_list.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
    }



echo'

        </li>
        <li class="nav-item">
    <a class="nav-link " href="about.php">About us </a>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="mx-2">';

    if(!array_key_exists('loggedin',$_SESSION))
    { echo'
    <button class="btn btn-outline-success"  data-toggle="modal" data-target="#loginModal" >Login</button>
    <button class="btn btn-outline-success" data-toggle="modal" data-target="#signModal" `>Singup</button>
    ';
  }
  else
  {
    echo '<a href="_logout.php"><button class="btn btn-outline-success" data-toggle="modal" `>Log out </button></a>';
  }
  echo '</div>
  </div>
  </nav>';
  if($userdublicate){
    echo'     <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Holy User</strong> This username already exits please select another name
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ';
}
if($passname){
  echo'     <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Holy User</strong> Please chaeck password with confirm password
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  ';
}
if($signup){
  echo'     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Holy User</strong> Succesfully Signup in IDisscuss
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
';
}
if($login1){
  echo'     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Holy User</strong> Succesfully login in IDisscuss
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  ';
}
if($notlogin){
  echo'     <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Holy User</strong> Please enter valid cadientcle
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  ';
}
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';




?>
