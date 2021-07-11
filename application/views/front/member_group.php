<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>
<?php $this->load->view("front/vue-setup"); ?>



<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Members Group</h1>
        <div class="row">
            <div class="col-12">
                <p class="text-danger text-center"><?php echo $this->session->flashdata('session_message') ?></p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>front/manage_member_group">
                            <button class="btn btn-outline-primary"> <i class="fa fa-plus text-success"></i> Add New Member Group</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatables-buttons" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>GROUP NAME</th>
                                    <th>UNDER GROUP</th>
                                    <th>REMARK</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                            <?php foreach($this->groups as $row){ ?>

                                <tr>
                                    <td><?= $row->group_name ?></td>
                                    <td><?= $row->under_group_name ?></td>
                                    <td><?= $row->remark ?></td>
                                    <td> <a href="<?= base_url(); ?>front/edit_member_group/<?= $row->id ?>"><i class="fa fa-eye text-success"></i> </a> </td>  
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