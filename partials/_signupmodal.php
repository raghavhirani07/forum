<!-- Button trigger modal -->


<!-- Modal -->
<!-- <?php print_r($_SERVER);?> -->

<div class="modal fade" id="signModal" tabindex="-1" role="dialog" aria-labelledby="signModalLabel" aria-hidden="true">
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signModalLabel">signup For i-Discuss</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputuser">Enter Username</label>
                        <input type="type" class="form-control" id="signupname" name="signupname" aria-describedby="emailHelp"
                            placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control" id="signuppass" name="signuppass" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputcPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcpass" name="signupcpass" placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Sign up</button>

                </div>

            </div>
        </div>
    </form>
</div>