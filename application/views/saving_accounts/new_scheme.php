<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>
<?php $this->load->view("front/vue-setup"); ?>
<main class="content" id="vuejs-addScheme">
    <div class="container-fluid p-0">
		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3>Saving Account Scheme </h3> 
            </div>
		</div> 


        <div class="row mb-2 mb-xl-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Scheme Code*</label>
                                    <input type="text" class="form-control" v-model="new_scheme.scheme_code">
                                    <span class="font-13 text-danger" v-if="typeof new_scheme.scheme_code_error !== 'undefined'" v-text="new_scheme.scheme_code_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Interest Payout*</label>
                                    <input type="text" class="form-control" v-model="new_scheme.interest_payout">
                                    <span class="font-13 text-danger" v-if="typeof new_scheme.interest_payout_error !== 'undefined'" v-text="new_scheme.interest_payout_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Minimum Balance</label>
                                    <input type="text" class="form-control" v-model="new_scheme.minimum_balance">
                                    <span class="font-13 text-danger"></span>
                                </div>
                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Name*</label>
                                    <input type="text" class="form-control" v-model="new_scheme.name">
                                    <span class="font-13 text-danger" v-if="typeof new_scheme.name_error !== 'undefined'" v-text="new_scheme.name_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Interest Rate*</label>
                                    <input type="text" class="form-control" v-model="new_scheme.interest_rate">
                                    <span class="font-13 text-danger" v-if="typeof new_scheme.interest_rate_error !== 'undefined'" v-text="new_scheme.interest_rate_error"></span>
                                </div>
                                <div class="mb-3 pt-2">
                                   <div class="form-check mt-2">
                                        <input class="form-check-input" id="is_active" type="checkbox" v-model="new_scheme.is_active">
                                        <label class="form-check-label" for="is_active">
                                            Is Active
                                        </label>
                                    </div>
                                    <span class="font-13 text-danger"></span>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                 <p v-if="error_message" class="text-danger" v-text="error_message"></p>
                                 <p v-if="success_message" class="text-success" v-text="success_message"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <input v-if="app.isNew" type="submit" @click="save_scheme()" value="Save" class="btn btn-outline-primary">
                                <input v-if="!app.isNew" type="submit" @click="save_scheme()" value="Update" class="btn btn-outline-primary">
                                <a href="<?= base_url() ?>savingaccount/scheme" class="btn btn-outline-danger"> Cancel </a>
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
		window.vm['add_scheme'] = new Vue({
			el: '#vuejs-addScheme',
			name: 'Add Scheme',
			store: window.store,
			data: {
				app: {
					options: {
						emulateJSON: true,
					},
					isNew: <?php echo !isset($this->scheme_details) ? 'true': 'false' ?>,
					endpoint: '<?= base_url() ?>savingaccount/save_scheme',
				},
                <?php if(!empty($this->scheme_details)){ ?>
                
                    new_scheme:{
                        id:'<?php echo $this->scheme_details->id  ?>',
                        scheme_code:'<?php echo $this->scheme_details->scheme_code  ?>',
                        interest_payout:'<?php echo $this->scheme_details->interest_payout  ?>',
                        minimum_balance:'<?php echo $this->scheme_details->minimum_balance	  ?>',
                        name:'<?php echo $this->scheme_details->scheme_name  ?>',
                        interest_rate:'<?php echo $this->scheme_details->interest_rate  ?>',
                        is_active:'<?php echo $this->scheme_details->is_active==1?true:false;  ?>',
                    },

                <?php  }else{ ?>
                    
                    new_scheme:{
                        scheme_code:'',
                        interest_payout:'',
                        minimum_balance:'',
                        name:'', 
                        interest_rate:'', 
                        is_active:true, 
                    },

                <?php } ?>

                error_message:'',
                success_message:'',
                
			},
			computed: {
			   
			},
			methods: {
                validate_new_scheme:function(){
                    this.error_message = '';
                    this.success_message = '';
                    var valid = true;
                    if(this.new_scheme.scheme_code===''){
                        this.new_scheme.scheme_code_error ="Please enter scheme code!";
                        valid = false;
                    }else{
                        this.new_scheme.scheme_code_error ="";
                    }
                    if(this.new_scheme.interest_payout===''){
                        this.new_scheme.interest_payout_error ="Please enter interest payout!";
                        valid = false;
                    }else{
                        this.new_scheme.interest_payout_error ="";
                    }
                    if(this.new_scheme.name===''){
                        this.new_scheme.name_error ="Please enter name!";
                        valid = false;
                    }else{
                        this.new_scheme.name_error ="";
                    }
                    if(this.new_scheme.interest_rate===''){
                        this.new_scheme.interest_rate_error ="Please enter interest rate!";
                        valid = false;
                    }else{
                        this.new_scheme.interest_rate_error ="";
                    }
                    this.$forceUpdate();
                    return valid;
                },
                
                save_scheme:function(){
                    var is_valid = this.validate_new_scheme();
                    if(is_valid){
                        // Send the request
                        var query = {
                            scheme:this.new_scheme,
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
                                this.error_message = 'There was an error while saving scheme.';
                            }

                        }).catch(function (err) {
                            this.error_message = 'There was an error while saving scheme.';
                        });
                    }
                },
                reset_form:function(){
                    this.new_scheme = {
                        scheme_code:'',
                        interest_payout:'',
                        minimum_balance:'',
                        name:'', 
                        interest_rate:'', 
                        is_active:true, 
                    };
                }
			},
			mounted: function() {
               
			}
		});

	});
</script>
<?php $this->load->view('front/footer'); ?>