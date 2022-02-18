<?php require_once 'functions/initialize.php' ?>
<?php include 'layouts/profile-header.php' ?>
<?php $get_data = display(); ?>
    <div class="container">
        <div class="card-body">
            <div class="pBox col-md-12">
                <?php if(mysqli_num_rows($get_data) > 0){ ?>
                    <?php while($data = mysqli_fetch_assoc($get_data)) { ?>
                        <div class="content col-md-3" style="background-color: #f8f9fa">
                            <?php $filename = "uploads/". $data['image_path']; ?>
                            <img class="img" src="<?php echo $filename; ?>" alt="faculty">
                            <h5><?php echo $data['firstname'] . " ". $data['mi'] . " " . $data['lastname']  ?></h5>
                            <div class="mb-2">
                                <p class="mb-0 text-left "><i class="fa fa-envelope info mr-2"></i><?php echo $data['email']; ?></p>
                                <p class="mb-0 text-left "><i class="fa fa-phone mr-2 "></i><?php echo $data['contact']; ?></p>
                                <p class="mb-0 text-left "><i class="fas fa-chart-bar mr-2"></i><?php echo $data['curr_rank']; ?></p>
                                <p class="mb-0 text-left "><i class="fa fa-briefcase mr-2"></i><?php echo $data['curr_pos']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php }else{ ?>
                    <div class="container">
                        <img class="blank" src="<?php echo url_for('assets/img/a.svg')?>" alt="No product added">
                        <h5 class="text-center mt-3">No Faculty added yet</h5>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="" style="margin-bottom: 100px">&nbsp;</div>
    </div>
<?php include 'layouts/footer.php' ?>