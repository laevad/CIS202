<?php require_once '../functions/initialize.php' ?>
<?php require_login();
$id = $_GET['id'];
?>
<?php
if (is_post_request()){
    $faculty_data['id'] = $id;
    $faculty_data['firstname'] = $_POST['f_name'];
    $faculty_data['lastname'] = $_POST['l_name'];
    $faculty_data['mi'] = $_POST['mi'];
    $faculty_data['gender'] = $_POST['gender'];
    $faculty_data['email'] = $_POST['email'];
    $faculty_data['contact'] = $_POST['contact'];


    $faculty_data['fileName'] = $_FILES['image']['name'];
    $faculty_data['fileType'] = $_FILES['image']['type'];
    $faculty_data['fileTmpName'] = $_FILES['image']['tmp_name'];
    $faculty_data['fileSize'] = $_FILES['image']['size'];
    $faculty_data['fileError'] = $_FILES['image']['error'];


    $faculty_data['civil_status'] = $_POST['civil_status'];
    $faculty_data['address'] = $_POST['address'];
    $faculty_data['college'] = $_POST['college'];
    $faculty_data['dept'] = $_POST['dept'];
    $faculty_data['curr_rank'] = $_POST['curr_rank'];
    $faculty_data['curr_pos'] = $_POST['curr_pos'];
    $faculty_data['deg_earned'] = $_POST['degree'];
    $faculty_data['granting'] = $_POST['granting'];
    $faculty_data['date_grad'] = $_POST['date_grad'];
    update_user($faculty_data);
}
?>
<?php
$user = find_user_by_id($id);
?>
<?php $title = 'Faculty Profile System' ?>
<?php include '../layouts/admin-layouts/header.php' ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Faculty</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo url_for('admin/')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo url_for('admin/profile.php')?>">Profile</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form action="<?php echo url_for('admin/edit-faculty.php?id='.$id)?>" method="post" id="add_faculty" enctype="multipart/form-data">
        <div class="">
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                        <legend>Personal Information</legend>
                        <div class="text-center mb-2"  >
                            <label for="image"  >
                                <img id="display" class="profile-user-img img-circle" src="<?php echo url_for('uploads/'.$user['image_path'])?>" width="100px" height="100px" style="background-size: cover" alt="User profile picture">
                                <input type="file" class="btn-block" onchange="loadFile(event)" name="image" id="image_input" style="" accept="image/png, image/jpeg"/>
                            </label>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-md-5 mb-2">
                                    <label for="f_name">First Name</label>
                                    <input id="f_name" class="form-control" type="text" name="f_name" value="<?php echo $user['firstname']; ?>" placeholder="Firstname">
                                </div>
                                <div class="col-md-5 mb-2">
                                    <label for="l_name">Last Name</label>
                                    <input name="l_name" class="form-control" type="text" value="<?php echo $user['lastname']; ?>" placeholder="Lastname">
                                </div>
                                <div class="col-md-2">
                                    <label for="mi">M.I</label>
                                    <input id="mi" name="mi" class="form-control" type="text" value="<?php echo $user['mi']; ?>" placeholder="M.I">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email">Email</label>
                            <input name="email" id="email" class="form-control" type="email" value="<?php echo $user['email']; ?>" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control select-gender" style="width: 100%;">
                                <option value=""></option>
                                <option value="male" <?php echo $user['gender'] == 'male' ? 'selected': ''?>>Male</option>
                                <option value="female" <?php echo $user['gender'] == 'female' ? 'selected': ''?>>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="civil_status">Civil Status</label>
                            <select id="civil_status" name="civil_status" class="form-control select-c-status" style="width: 100%;">
                                <option value=""></option>
                                <option value="single" <?php echo $user['civil_status'] == 'single' ? 'selected': ''?>>Single</option>
                                <option value="married" <?php echo $user['civil_status'] == 'married' ? 'selected': ''?>>Married</option>
                                <option value="separated" <?php echo $user['civil_status'] == 'separated' ? 'selected': ''?>>Separated</option>
                                <option value="widow" <?php echo $user['civil_status'] == 'widow' ? 'selected': ''?>>Widow/er</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Permanent Address</label>
                            <input id="address" name="address" class="form-control" type="text" value="<?php echo $user['address']; ?>" placeholder="Permanent Address">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input id="contact" name="contact" class="form-control" type="number" value="<?php echo $user['contact']; ?>" placeholder="Contact">
                        </div>
                        <legend>Affiliation</legend>
                        <div class="form-group">
                            <label for="dept">Department/Division</label>
                            <input id="dept" name="dept" class="form-control" type="text" value="<?php echo $user['dept']; ?>" placeholder="Department/Division">
                        </div>
                        <div class="form-group">
                            <label for="curr_rank">Current Rank</label>
                            <input id="curr_rank" name="curr_rank" class="form-control" type="text" value="<?php echo $user['curr_rank']; ?>" placeholder="Current Rank">
                        </div>
                        <div class="form-group">
                            <label for="curr_pos">Current Position</label>
                            <input id="curr_pos" name="curr_pos" class="form-control" type="text" value="<?php echo $user['curr_pos']; ?>" placeholder="Current Position">
                        </div>
                        <legend>Educational Background</legend>
                        <div class="form-group">
                            <label for="degree">Highest Degree Earned</label>
                            <select id="degree" name="degree" class="form-control select-degree" style="width: 100%;">
                                <option value=""></option>
                                <option value="doctor" <?php echo $user['deg_earned'] == 'doctor' ? 'selected': ''?>>Doctor</option>
                                <option value="masters" <?php echo $user['deg_earned'] == 'masters' ? 'selected': ''?>>Masters</option>
                                <option value="bachelor" <?php echo $user['deg_earned'] == 'bachelor' ? 'selected': ''?>>Bachelor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="granting">Granting</label>
                            <input id="granting" name="granting" class="form-control" type="text" value="<?php echo $user['granting']; ?>" placeholder="Granting">
                        </div>
                        <div class="form-group">
                            <label for="date_grad">Date of Graduation</label>
                            <div class="input-group date" id="datepick" data-target-input="nearest">
                                <input name="date_grad" id="date_grad" value="<?php echo $user['date_grad']; ?>" type="text" class="form-control datetimepicker-input" data-target="#datepick" placeholder="Date of Graduation"/>
                                <div class="input-group-append" data-target="#datepick" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class=" form-control btn btn-success text-white" style="font-size: 18px; font-weight: bold" type="submit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include '../layouts/admin-layouts/footer.php' ?>

