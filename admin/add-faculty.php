<?php require_once '../functions/initialize.php' ?>

<?php require_login(); ?>
<?php $get_data = display();

if (is_post_request()){
    $faculty_data['firstname'] = $_POST['f_name'];
    $faculty_data['lastname'] = $_POST['l_name'];
    $faculty_data['mi'] = $_POST['mi'];
    $faculty_data['gender'] = $_POST['gender'];
    $faculty_data['email'] = $_POST['email'];
    $faculty_data['contact'] = $_POST['contact'];

    if ($_FILES['image']['name'] == ''){
        $faculty_data['fileName'] = 'noimage.png';
        $faculty_data['fileType'] = "image/png";
    }else{
        $faculty_data['fileName'] = $_FILES['image']['name'];
        $faculty_data['fileType'] = $_FILES['image']['type'];
    }

    $faculty_data['fileTmpName'] = $_FILES['image']['tmp_name'];
    $faculty_data['fileSize'] = $_FILES['image']['size'];
    $faculty_data['fileError'] = $_FILES['image']['error'];


    $faculty_data['civil_status'] = $_POST['civil_status'];
    $faculty_data['address'] = $_POST['address'];
    $faculty_data['dept'] = $_POST['dept'];
    $faculty_data['curr_rank'] = $_POST['curr_rank'];
    $faculty_data['curr_pos'] = $_POST['curr_pos'];
//    $faculty_data['deg_earned'] = $_POST['degree'];
    $faculty_data['granting'] = $_POST['granting'];
    $faculty_data['date_grad'] = $_POST['date_grad'];
    add_product ($faculty_data);

}
?>
<?php $title = 'Faculty Profile System' ?>
<?php include '../layouts/admin-layouts/header.php' ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Faculty</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo url_for('admin/')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo url_for('admin/profile.php')?>">Profile</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <form action="#" method="post" id="add_faculty" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                        <legend>Personal Information</legend>
                        <div class="text-center mb-2"  >
                            <label for="image"  >
                                <img id="display" class="profile-user-img img-circle" src="<?php echo url_for('assets/img/noimage.png')?>" width="100px" height="100px" style="background-size: cover" alt="User profile picture">
                                <input type="file" class="btn-block" onchange="loadFile(event)" name="image" id="image_input" style="" accept="image/png, image/jpeg"/>
                            </label>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-md-5 mb-2">
                                    <input class="form-control" type="text" name="f_name" placeholder="Firstname">
                                </div>
                                <div class="col-md-5 mb-2">
                                    <input name="l_name" class="form-control" type="text" placeholder="Lastname">
                                </div>
                                <div class="col-md-2">
                                    <input name="mi" class="form-control" type="text" placeholder="M.I">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <input name="email" class="form-control" type="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <select name="gender" class="form-control select-gender" style="width: 100%;">
                                <option value=""></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="civil_status" class="form-control select-c-status" style="width: 100%;">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="separated">Separated</option>
                                <option value="widow">Widow/er</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="address" class="form-control" type="text" placeholder="Permanent Address">
                        </div>

                        <div class="form-group">
<!--                            <input name="contact" class="form-control" type="number" placeholder="Contact">-->
                            <input id="phone" type="text" name="contact" class="form-control"  />
                        </div>
                        <legend>Affiliation</legend>
                        <div class="form-group">
                            <input name="dept" class="form-control" type="text" placeholder="College Department/Division">
                        </div>
                        <div class="form-group">
                            <input name="curr_rank" class="form-control" type="text" placeholder="Current Rank">
                        </div>
                        <div class="form-group">
                            <input name="curr_pos" class="form-control" type="text" placeholder="Current Position">
                        </div>
                        <legend>Educational Background</legend>
                        <div class="form-group">
                            <input name="granting" class="form-control" type="text" placeholder="Highest Degree Earned Granting">
                        </div>
                        <div class="form-group">
                            <div class="input-group date" id="datepick" data-target-input="nearest">
                                <input name="date_grad" type="text" class="form-control datetimepicker-input" data-target="#datepick" placeholder="Date of Graduation"/>
                                <div class="input-group-append" data-target="#datepick" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class=" form-control btn btn-success text-white" style="font-size: 18px; font-weight: bold" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include '../layouts/admin-layouts/footer.php' ?>

