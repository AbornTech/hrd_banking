<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>
<?php $this->load->view("front/vue-setup"); ?>




<main class="content" id="vuejs-manage_member_group">
    <div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3>Member Group </h3> 
            </div>
		</div> 


        <div class="row mb-2 mb-xl-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Group Name *</label>
                                    <input type="text" class="form-control" v-model="new_group.group_name">
                                    <span class="font-13 text-danger" v-if="typeof new_group.group_name_error !== 'undefined'" v-text="new_group.group_name_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Under Group</label>
                                    <select class="form-select flex-grow-1" v-model="new_group.under_group_id" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option :value="group.id" v-for="group in member_groups" v-text="group.group_name"></option>
                                    </select>
                                    
                                </div>
                                <div class="mb-3">
                                    <label>Remarks</label>
                                    <input type="text" class="form-control" v-model="new_group.remark">
                                    <span class="font-13 text-danger"></span>
                                </div>
                                
                            </div>
                             
                        </div>
                        <div class="row">
                            <div class="col-12  ">
                                 <p v-if="error_message" class="text-danger" v-text="error_message"></p>
                                 <p v-if="success_message" class="text-success" v-text="success_message"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <input v-if="app.isNew" type="submit" @click="save_group()" value="Save" class="btn btn-outline-primary">
                                <input v-if="!app.isNew" type="submit" @click="save_group()" value="Update" class="btn btn-outline-primary">
                                <a href="<?= base_url() ?>front/member_group" class="btn btn-outline-danger"> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</main>

<!-- Initialise Vue Engine -->
<script type="text/javascript">
	jQuery(document).ready(function($) {

		// Create vue instance
		window.vm['manage_member_group'] = new Vue({
			el: '#vuejs-manage_member_group',
			name: 'Manage Member Group',
			store: window.store,
			data: {
				app: {
					options: {
						emulateJSON: true,
					},
					isNew: <?php echo !isset($this->group_details) ? 'true': 'false' ?>,
					endpoint: '<?= base_url() ?>front/save_member_group',
				},
                <?php if(!empty($this->group_details)){ ?>
                
                    new_group:{
                        id:'<?php echo $this->group_details->id  ?>',
                        group_name:'<?php echo $this->group_details->group_name  ?>',
                        under_group_id:'<?php echo $this->group_details->under_group_id  ?>',
                        remark:'<?php echo $this->group_details->remark	  ?>',
                    },

                <?php  }else{ ?>
                    
                    new_group:{
                        group_name:'',
                        under_group_id:'',
                        remark:''
                    },

                <?php } ?>

                member_groups:<?php echo json_encode($this->member_groups) ?>,
                error_message:'',
                success_message:'',
                
			},
			computed: {
			   
			},
			methods: {
                validate_new_group:function(){
                    this.error_message = '';
                    this.success_message = '';
                    var valid = true;
                    
                    if(this.new_group.group_name===''){
                        this.new_group.group_name_error ="Please enter group name!";
                        valid = false;
                    }else{
                        this.new_group.group_name_error  ="";
                    }
                    
                    this.$forceUpdate();
                    return valid;
                },
                
                save_group:function(){
                    var is_valid = this.validate_new_group();
                    if(is_valid){
                        // Send the request
                        var query = {
                            group:this.new_group,
                            isNew:this.app.isNew,
                        };
                        this.$http.post(this.app.endpoint , query, this.app.options).then(function (res) {
                            // Check request status
                             
                            if (res.body.status) {
                                this.success_message = res.body.message;
                                if(this.app.isNew){
                                    this.reset_form();
                                }
                            } else {
                                this.error_message = 'There was an error while saving group.';
                            }

                        }).catch(function (err) {
                            this.error_message = 'There was an error while saving group.';
                        });
                    }
                },
                reset_form:function(){
                    this.new_group = {
                        group_name:'',
                        under_group_id:'',
                        remark:''
                    };
                }
			},
			mounted: function() {
               
			}
		});

	});
</script>
<?php $this->load->view('front/footer'); ?>