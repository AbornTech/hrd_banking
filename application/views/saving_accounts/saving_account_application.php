<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>
<?php $this->load->view("front/vue-setup"); ?>



<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Saving Account Applications</h1>
        <div class="row">
            <div class="col-12">
                <p class="text-danger text-center"><?php echo $this->session->flashdata('session_message') ?></p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>savingaccount/manage_savingapplication">
                            <button class="btn btn-outline-primary"> <i class="fa fa-plus text-success"></i> Add New Application</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatables-buttons" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>APPLICATION NO</th>
                                    <th>APPLICATION DATE</th>
                                    <th>MEMBER ID</th>
                                    <th>MEMER NAME</th>
                                    <th>SCHEME NAME</th>
                                    <th>ASSOCIATE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                            <?php if($this->application){ foreach($this->application as $row){ ?>

                                <tr>
                                    <td><?= $row->application_no ?></td>
                                    <td><?= date('d-m-Y',strtotime($row->application_date)) ?></td>
                                    <td><?= $row->membership_no ?></td>
                                    <td><?= $row->member_name ?></td>
                                    <td><?= $row->scheme_name ?></td>
                                    <td></td>
                                    <td><?= $row->status==1?'Approved':'Pending'; ?></td>
                                    <td> <a href="<?= base_url(); ?>"><i class="fa fa-eye text-success"></i> </a> </td>  
                                </tr>

                                <?php } } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            responsive: true,
            lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>

<?php $this->load->view('front/footer'); ?>