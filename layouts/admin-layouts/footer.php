</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        CICT Faculty Profile
    </div>
    <!-- Default to the left -->
    <strong><a href="#" style="color: rgba(244, 129, 40, 0.8) !important;">CICT Faculty Profile</a>.</strong> All rights reserved.
</footer>

</body>
</html>
<script src="<?php echo url_for('assets/js/popper.min.js')?>"></script>

<script src="<?php echo url_for('assets/plugins/jquery/jquery.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?php echo url_for('assets/js/adminlte.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/chart.js/Chart.min.js')?>"></script>
<script src="<?php echo url_for('assets/js/dashboard.js')?>"></script>

<!-- Select2 -->
<script src="<?php echo url_for('assets/plugins/select2/js/select2.full.min.js')?>"></script>


<script src="<?php echo url_for('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo url_for('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>


<script src="<?php echo url_for('assets/plugins/toastr/toastr.min.js')?>"></script>

<script src="<?php echo url_for('assets/plugins/moment/moment.min.js')?>"></script>

<script src="<?php echo url_for('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>

<script src="<?php echo url_for('assets/js/bootstrap-filestyle.min.js')?>"></script>

<script>
    $(function () {
        $('#table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            dom: 'Bfrtip',
            "pageLength":5,
            "order": [[0, "desc" ]],
            "columnDefs": [
                { "orderable": false, "targets": [4,5] },
            ],
            buttons: [
                {
                    text: '<i class="fa fa-plus-circle mr-1"></i>Add New Faculty',
                    className: 'btn btn-warning text-white',
                    action: function ( e, dt, node, config ) {
                        window.location = '<?php echo url_for('admin/add-faculty.php')?>';
                    }
                }
            ]
        });
    });
    //Date picker
    $('#datepick').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('.select-c-status').select2({
        theme: 'bootstrap4',
        templateSelection: function (data) {
            if (data.id === '') {
                return '- Civil Status -';
            }
            return data.text;
        }
    });
    $('.select-gender').select2({
        theme: 'bootstrap4',
        templateSelection: function (data) {
            if (data.id === '') {
                return '- Gender -';
            }
            return data.text;
        }
    });

    let loadFile = function(event) {
        let output = document.getElementById('display');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };

    $('#image_input').filestyle({
        badge: true,
        input : false,
        btnClass : 'btn-warning text-white mt-2',
        text : '<i class="fa fa-upload"></i> Choose profile picture',
        dragdrop: false
    });
    $(function () {
        $('#add_faculty').validate({

            rules:{
                f_name:{
                    required:true,
                },
                l_name:{
                    required: true,
                },
                mi:{
                    required: true
                },
                email:{
                    required:true,
                    email: true,
                },
                gender:{
                    required: true,
                },
                civil_status:{
                    required: true,
                },
                address:{
                    required: true,
                },
                contact:{
                    required: true,
                },
                image:{
                    required: false
                }
            },
            messages:{
                f_name:{
                    required: 'First name is required',
                },
                l_name:{
                    required: 'Last name is required',
                },
                mi:{
                    required: 'M.I is required',
                },
                email:{
                    required: 'Enter email address',
                    email: 'Invalid email address'
                },
                gender:{
                    required: 'Gender is required',
                },
                civil_status:{
                    required: 'Civil status is required',
                },
                address:{
                    required: 'Permanent address is required',
                },
                contact:{
                    required: 'Contact is required'
                },
                image:{
                    required: 'Profile picture required'
                }
            },
            submitHandler:function (frm){
                toastr.remove();
                $.ajax({
                    url:$(frm).attr('action'),
                    method:$(frm).attr('method'),
                    data:new FormData(frm),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    complete:function(result) {
                       if (result.status === 0){
                       }else{
                           window.location.href = 'profile.php';
                           frm.reset();
                       }
                    }
                });
                return false;
            }
        });
    });
</script>
<?php db_disconnect($db); ?>