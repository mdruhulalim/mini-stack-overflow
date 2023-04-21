<?php
include('inc/header.php');
// sign up check and insert code
if(isset($_POST['submit'])) {
    $name = trim(htmlentities($_POST['username']));
    $email = trim(htmlentities($_POST['email']));
    $password = $_POST['password'];
    $passwordC = $_POST['passwordC'];
    
    // check empty
    if(empty($name)){
        $empty['nameEmpty'] = "<p class='text-danger';>Please Inter your name here</p>";
    }
    if(empty($email)){
        $empty['emailEmpty'] = "<p class='text-danger';>Please Inter your valid email here</p>";
    }
    if(empty($password)){
        $empty['passwordEmpty'] = "<p class='text-danger';>Please type a strong password here</p>";
    }
    if($password != $passwordC){
        $empty['passwordCEmpty'] = "<p class='text-danger';>Your password did not match</p>";
    }

    // insert
    if(empty($empty)){
        include('core/user.php');
        $addUsersInfo = new Users;
        $userCount = $addUsersInfo->userExists($_POST['username'], $_POST['email']);
        if($userCount > 0){
            $userCountMatch = "<p class='alert alert-warning'>User/Email alrady exist</p>";
        }else{
            $userInfo = $addUsersInfo->insert($name, $email, $password);
        }
    }
}
?>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
        <!-- sign up -->
        <div class="card">
            <div class="card-header">
                <h4>Sign Up</h4>
                <?php
                if(isset($userCountMatch)){
                    echo $userCountMatch;
                }
                ?>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                        <?php
                        if(isset($empty['nameEmpty'])){
                            echo $empty['nameEmpty'];
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" >
                        <?php
                        if(isset($empty['emailEmpty'])){
                            echo $empty['emailEmpty'];
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" >
                        <?php
                        if(isset($empty['passwordEmpty'])){
                            echo $empty['passwordEmpty'];
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="passwordC" placeholder="Enter password" >
                        <?php
                        if(isset($empty['passwordCEmpty'])){
                            echo $empty['passwordCEmpty'];
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');