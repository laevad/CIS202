<?php
function find_user_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user;
}
function display() {
    global $db;
    $sql = "SELECT * from users ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function add_product($faculty_data){
    global $db;
    $fileExt = explode('.', $faculty_data['fileName']);
    $faculty_data['fileActualExt'] = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($faculty_data['fileActualExt'], $allowed)){
        if ($faculty_data['fileError'] === 0 || $faculty_data['fileError'] === 4){
            if ($faculty_data['fileSize'] < 5000000){
                if ($faculty_data['fileName'] == "noimage.png"){
                    $fileNameNew = $faculty_data['fileName'];
                }else{
                    $fileNameNew = uniqid().rand(1,10000000).$_SESSION['user_id'].".".$faculty_data['fileActualExt'];
                }

                $destination_path = dirname(getcwd().DIRECTORY_SEPARATOR)."\uploads\\";
                $fileDestination = $destination_path.$fileNameNew;
//                move_uploaded_file($faculty_data['fileTmpName'], $fileDestination);
                if ($faculty_data['fileName'] != "noimage.png" && $faculty_data['fileTmpName'] != ""){
                    move_uploaded_file($faculty_data['fileTmpName'], $fileDestination);
                }

                $sql = "INSERT INTO users ";
                $sql .= "(firstname, lastname, mi, gender, email, contact, image_path, civil_status, address, dept, curr_rank, curr_pos, deg_earned, granting, date_grad ) ";
                $sql .= "VALUES (";
                $sql .= "'" . db_escape($db, $faculty_data['firstname']) ."',";
                $sql .= "'" . db_escape($db, $faculty_data['lastname']) ."',";
                $sql .= "'" . db_escape($db, $faculty_data['mi']) ."',";
                $sql .= "'" . db_escape($db, $faculty_data['gender']) ."',";
                $sql .= "'" . db_escape($db, $faculty_data['email']) ."',";
                $sql .= "'" . db_escape($db, $faculty_data['contact']) ."',";
                $sql .= "'" . db_escape($db, $fileNameNew) ."',";
                $sql .= "'" . db_escape($db, $faculty_data['civil_status']) . "',";
                $sql .= "'" . db_escape($db, $faculty_data['address']) . "',";
                $sql .= "'" . db_escape($db, $faculty_data['dept']) . "',";
                $sql .= "'" . db_escape($db, $faculty_data['curr_rank']) . "',";
                $sql .= "'" . db_escape($db, $faculty_data['curr_pos']) . "',";
                $sql .= "'" . db_escape($db, $faculty_data['deg_earned']) . "',";
                $sql .= "'" . db_escape($db, $faculty_data['granting']) . "',";
                $sql .= "'" . db_escape($db, $faculty_data['date_grad']) . "'";
                $sql .= ")";
                $result = mysqli_query($db, $sql);
            }
        }else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }
}

function update_user($faculty_data) {
    global $db;

    if ($faculty_data['fileError'] === 0 || $faculty_data['fileError'] === 4){
        if ($faculty_data['fileSize'] < 5000000){
            $fileNameNew = "";
            if ($faculty_data['fileName'] != ""){
                $fileExt = explode('.', $faculty_data['fileName']);
                $faculty_data['fileActualExt'] = strtolower(end($fileExt));
                $fileNameNew = uniqid().rand(1,10000000).$_SESSION['user_id'].".".$faculty_data['fileActualExt'];
            }

            $destination_path = dirname(getcwd().DIRECTORY_SEPARATOR)."\uploads\\";
            $fileDestination = $destination_path.$fileNameNew;
            if ($faculty_data['fileName'] != "noimage.png" && $faculty_data['fileTmpName'] != ""){
                move_uploaded_file($faculty_data['fileTmpName'], $fileDestination);
            }

            $sql = "UPDATE users SET ";
            $sql .= "firstname='" . db_escape($db, $faculty_data['firstname']) ."', ";
            $sql .= "lastname='" . db_escape($db, $faculty_data['lastname']) ."', ";
            $sql .= "mi='" . db_escape($db, $faculty_data['mi']) ."', ";
            $sql .= "gender='" . db_escape($db, $faculty_data['gender']) ."', ";
            $sql .= "email='" . db_escape($db, $faculty_data['email']) ."', ";
            $sql .= "contact='" . db_escape($db, $faculty_data['contact']) ."', ";
            if ($faculty_data['fileName'] != ""){
                $sql .= "image_path='" . db_escape($db, $fileNameNew) ."', ";
            }
            $sql .= "civil_status='" . db_escape($db, $faculty_data['civil_status']) . "', ";
            $sql .= "address='" . db_escape($db, $faculty_data['address']) . "', ";
            $sql .= "dept='" . db_escape($db, $faculty_data['dept']) . "', ";
            $sql .= "curr_rank='" . db_escape($db, $faculty_data['curr_rank']) . "', ";
            $sql .= "curr_pos='" . db_escape($db, $faculty_data['curr_pos']) . "', ";
            $sql .= "deg_earned='" . db_escape($db, $faculty_data['deg_earned']) . "', ";
            $sql .= "granting='" . db_escape($db, $faculty_data['granting']) . "', ";
            $sql .= "date_grad='" . db_escape($db, $faculty_data['date_grad']) . "' ";
            $sql .= "WHERE id='" . db_escape($db, $faculty_data['id']) . "' ";
            $sql .= "LIMIT 1";

            $result = mysqli_query($db, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db), E_USER_ERROR);
        }
    }else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }



}


function find_user_by_id($id) {
    global $db;
    $sql = "SELECT * FROM users ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $users = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $users;
}
