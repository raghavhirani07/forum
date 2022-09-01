


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login For i-Discuss</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputuser">Enter Username</label>
                        <input type="type" class="form-control" id="loginname"  name="loginname" aria-describedby="emailHelp"
                            placeholder="Enter username">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control" id="loginpass" name="loginpass" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login </button>

                </div>

            </div>
        </div>
    </form>
</div>