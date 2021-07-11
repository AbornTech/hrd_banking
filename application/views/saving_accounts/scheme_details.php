<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>



<main class="content">
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3>Saving Account Scheme </h3> 
            </div>
            
		</div> 

        <div class="row mb-2 mb-xl-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-auto">
                                <h4>Scheme details</h4>
                            </div>
                            <div class="col-auto ms-auto text-end mt-n1">
                                <a href="<?= base_url(); ?>savingaccount/edit_scheme/<?= $this->scheme_id; ?>" class="btn btn-primary shadow-sm"> <i class="fa fa-edit">&nbsp;</i> </a>
                                <a onclick="deleteScheme(<?php echo $this->scheme_id; ?>)" class="btn btn-danger shadow-sm"> <i class="fa fa-trash">&nbsp;</i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <table class="table table-striped ">
                                    <tbody>
                                       
                                        <tr>
                                            <th>Scheme Code</th>
                                            <td><?= $this->scheme_details->scheme_code; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Scheme's Name</th>
                                            <td><?= $this->scheme_details->scheme_name; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Interest Payout</th>
                                            <td><?= $this->scheme_details->interest_payout; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Interest Rate</th>
                                            <td><?= $this->scheme_details->interest_rate; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Minimum Balance</th>
                                            <td><?= $this->scheme_details->minimum_balance; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Active</th>
                                            <td><?= $this->scheme_details->is_active?'<i class="fa fa-check  text-success" aria-hidden="true"></i>':'<i class="fa fa-times-circle text-danger" aria-hidden="true"></i>'; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Created By</th>
                                            <td>Admin</td>
                                        </tr>

                                        <tr>
                                            <th>Created On</th>
                                            <td><?= date("d/m/Y h:i:s",strtotime($this->scheme_details->created_date)); ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>


<?php $this->load->view('front/footer'); ?>
<script>
     function deleteScheme(id){
            if(confirm("Are you sure to delete this scheme?")){
                window.location = '<?php echo base_url(); ?>savingaccount/delete_scheme/'+id;
            }
     }
</script>