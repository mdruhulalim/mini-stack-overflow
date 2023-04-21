<?php
include('inc/header.php');
// start Sign in
if(isset($_POST['submit'])){
    include('core/user.php');
    $user = new Users();
    $login = $user->login($_POST['username'], $_POST['password']);
    if($login > 0){
        session_start();
        $_SESSION['ID']=$login['ID'];
        $_SESSION['username']=$login['username'];
        $_SESSION['email']=$login['email'];
        header('Location: index.php');
    } else {
        $error = "<p class='text-danger';>Invalid login credentials.</p>";
    }
}
?>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
        <!-- start Sign in -->
        <div class="card">
            <div class="card-header">
                <h4>Sign In</h4>
                <?php
                if(isset($error)){
                    print_r($error);
                }
                ?>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
<?php
include('inc/footer.php');