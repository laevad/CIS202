<?php
function log_in_user($user): bool{
    session_regenerate_id();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    return true;
}
function is_logged_in(): bool{
    return isset($_SESSION['user_id']);
}
function require_login() {
    if(!is_logged_in()) {
        redirect_to(url_for('index.php'));
    }
}
function log_out_user(): bool{
    unset($_SESSION['user_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username']);
    session_destroy();
    return true;
}