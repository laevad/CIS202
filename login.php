<?php require_once 'functions/initialize.php' ?>
<?php
$username = '';
$password = '';
if(is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if(empty($errors)) {
        $login_failure_msg = "Invalid username/password.";
        $user = find_user_by_username($username);
        if($user) {
            if(password_verify($password, $user['password'])) {
                // password matches
                log_in_user($user);
                redirect_to(url_for('admin/index.php'));
            } else {
                // username found, but password does not match
                $errors[] = $login_failure_msg;
            }

        } else {
            // no username found
            $errors[] = $login_failure_msg;
        }

    }
}
?>
<?php include 'layouts/login-header.php' ?>
    <div class="section-b">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">
                        <?php echo display_errors($errors); ?>
                        <form id="submitForm" action="#" method="post" >
                            <div class="form-group required">
                                <label for="username" class="d-flex">Username </label>
                                <input type="text" class="form-control" required id="username" value="<?php echo ($username) ?>"  name="username">
                            </div>
                            <div class="form-group required">
                                <label class="d-flex" for="password">Password</label>
                                <input type="password" class="form-control" required id="password" name="password" value="">
                            </div>
                            <div class="form-group pt-1">
                                <button class="btn btn-warning btn-block" type="submit"> Log In </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'layouts/footer.php' ?>