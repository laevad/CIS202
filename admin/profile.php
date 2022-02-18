<?php require_once '../functions/initialize.php' ?>

<?php require_login(); ?>
<?php $get_data = display();
?>
<?php $title = 'Faculty Profile System' ?>
<?php include '../layouts/admin-layouts/header.php' ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo url_for('admin/profile.php')?>">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Faculty Records</h3>
        </div>
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center-row">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(mysqli_num_rows($get_data) > 0){ ?>
                    <?php while($data = mysqli_fetch_assoc($get_data)) { ?>
                        <?php $filename = $data['image_path']; ?>
                        <tr class="">
                            <td><?php echo $data['id'] ?></td>
                            <td>

                                <?php
                                if ($data['image_path'] == null) { ?>
                                    <img src="<?php echo url_for('assets/img/noimage.png')?>" alt="" class="img-circle img-size-50">
                                <?php }else{ ?>
                                    <img src="<?php echo url_for('uploads/'). $filename; ?>" alt="" class="img-circle mr-2" style="width: 45px; height: 45px">
                                <?php } ?>
                                <?php echo ucfirst($data['firstname']) ." ". ucfirst($data['mi']) . ". " . ucfirst($data['lastname']) ?>
                            </td>
                            <td ><?php echo $data['gender'] ?></td>
                            <td><?php echo $data['email'] ?></td>
                            <td><?php echo $data['contact'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu bg-warning" role="menu">
                                        <a class="dropdown-item" href="<?php echo url_for('admin/edit-faculty.php?id='.$data['id'])?>"><i class="fa fa-edit text-secondary mr-2"></i>Edit</a>
<!--                                        <a class="dropdown-item"  href=""><i class="fa fa-eye text-danger mr-2"></i>Delete</a>-->
                                    </div>
                                </div>

                            </td>
                        </tr>
                    <?php } ?>
                <?php }else{ ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../layouts/admin-layouts/footer.php' ?>

