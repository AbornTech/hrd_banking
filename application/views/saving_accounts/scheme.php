
<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Saving Account Scheme</h1>
        <div class="row">
            <div class="col-12">
                <p class="text-danger text-center"><?php echo $this->session->flashdata('session_message') ?></p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>savingaccount/new_scheme">
                            <button class="btn btn-outline-primary"> <i class="fa fa-plus text-success"></i> Add Scheme</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatables-buttons" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>CODE NO.</th>
                                    <th>SCHEME NAME</th>
                                    <th>INTEREST PAYOUT</th>
                                    <th>ANNUAL INTEREST RATE</th>
                                    <th>ISACTIVE</th>
                                    <th>AGENT COMMISSION</th>
                                    <th>ACTION</th>
                                        
                                </tr>
                            </thead>
                            <tbody>
                                 
                                <?php foreach($this->schemes as $row){ ?>

                                    <tr>
                                        <td><?= $row->scheme_code ?></td>
                                        <td><?= $row->scheme_name ?></td>
                                        <td><?= $row->interest_payout ?></td>
                                        <td><?= $row->interest_rate ?></td>
                                        <td>
                                            <?php 
                                                if($row->is_active==1){
                                                    echo '<i class="fa fa-check fa-2x text-success" aria-hidden="true"></i>';
                                                }else{
                                                    echo '<i class="fa fa-times-circle fa-2x text-danger" aria-hidden="true"></i>';
                                                }
                                            ?>
                                        </td>
                                        <td> <a href="#"> <i class="fa fa-cog" ></i> Commission Chart</a></td>
                                        <td> <a href="<?= base_url(); ?>savingaccount/scheme_details/<?= $row->id ?>"><i class="fa fa-eye text-success"></i> </a> </td>  
                                    </tr>

                                <?php } ?>
                                
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