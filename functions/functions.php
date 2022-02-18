<?php
function url_for($script_path): string{
    if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WEB . $script_path;
}
function getCurrentPage(){
    return substr($_SERVER['SCRIPT_NAME'], strlen(FOLDER_NAME)+1);

}
function is_post_request(): bool{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function redirect_to($location) {
    header("Location: " . $location);
    exit;
}
function display_errors($errors=array()): string{
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . $error . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
