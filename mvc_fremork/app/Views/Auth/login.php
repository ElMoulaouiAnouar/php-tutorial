<div class="container">
    <div class="row mt-4">
        <div class="col col-sm-10 col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center" >
                        <?php 
                            if(isset($_COOKIE['faild'])){
                                echo $_COOKIE['faild'];
                            }
                        ?>
                        <h4>LOGIN</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                       <form action="login" method="post">
                        <div class="m-3">
                                <input type="text" name="username" placeholder="UserName" class="form-control" value="<?php echo $data['username']?>">
                                <span class="text-danger m-1"><?php echo $data['usernameError']?></span>
                         </div>
                            <div class="m-3">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                                <span class="text-danger m-1"><?php echo $data['passwordError']?></span>
                            </div>
                            <div class="m-3">
                                <button name="btn_login" type="submit" class="form-control btn btn-outline-primary">Login</button>
                            </div>
                       </form>
                    </div>
                </div>
                <div class="card-footer">
                    <h5>Or<a href="register" class="ms-2">Register</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>