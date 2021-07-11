<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>
<?php $this->load->view("front/vue-setup"); ?>



<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Members</h1>
        <div class="row">
            <div class="col-12">
                <p class="text-danger text-center"><?php echo $this->session->flashdata('session_message') ?></p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>front/manage_members">
                            <button class="btn btn-outline-primary"> <i class="fa fa-plus text-success"></i> Add New Member</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatables-buttons" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>MEMBER NO</th>
                                    <th>ENROLL DATE</th>
                                    <th>MEMBER NAME</th>
                                    <th>FOLIO NO</th>
                                    <th>DISTRICT</th>
                                    <th>PAN</th>
                                    <th>MOBILE</th>
                                    <th>KYC SCORE</th>
                                    <th>STATUS</th>
                                    <th>KYC</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                            <?php foreach($this->members as $row){ ?>

                                <tr>
                                    <td><?= $row->membership_no ?></td>
                                    <td><?= date('d-m-Y',strtotime($row->enroll_date)) ?></td>
                                    <td><?= $row->member_name ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $row->pan_no ?></td>
                                    <td><?= $row->primary_mobile_number ?></td>
                                    <td></td>
                                    <td><?= $row->status==1?'Approved':'Pending'; ?></td>
                                    <td> </td>
                                    <td> <a href="<?= base_url(); ?>"><i class="fa fa-eye text-success"></i> </a> </td>  
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



<?php $this->load->view('front/footer'); ?>