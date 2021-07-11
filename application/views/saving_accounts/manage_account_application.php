
<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>
<?php $this->load->view("front/vue-setup"); ?>
<main class="content" id="vuejs-saving_application">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Saving Application</h1>
       
        <div class="row">
            <div class="col-12">
                <p class="text-danger text-center"><?php echo $this->session->flashdata('session_message') ?></p>
            </div>
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Application Date *</label> <br>
                                    <date-picker style="width:100%"
                                        v-model="new_application.application_date"
                                        format="DD-MM-YYYY"
                                        type="date"
                                        value-type="YYYY-MM-DD"
                                        placeholder="Select date" >
                                    </date-picker>
                                    <span class="font-13 text-danger" v-if="typeof new_application.application_date_error !== 'undefined'" v-text="new_application.application_date_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Member's Name *</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.member_id" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option v-bind:value="member.id" v-for="member in members" v-text="member.member_name"></option>
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_application.member_id_error !== 'undefined'" v-text="new_application.member_id_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Address</label>
                                    <div v-html="new_application.address" style="border:1px solid #ccc;padding: 6px 12px;height:110px;"></div>
                                    <span class="font-13 text-danger"></span>
                                </div>

                                <div class="mb-3">
                                    <label>Joint A/c Holder (If any)</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.joint_account" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option v-bind:value="member.id" v-for="member in members" v-text="member.member_name"></option>
                                    </select>
                                    <span class="font-13 text-danger"></span>
                                </div>

                                <div class="mb-3">
                                    <label>Minor's Name</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.minor_id">
                                        <option value="">--Select--</option>
                                        
                                    </select>
                                    <span class="font-13 text-danger"></span>
                                </div>

                                <div class="mb-3">
                                    <label>Agent's Name *</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.agent_id" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option v-bind:value="member.id" v-for="member in members" v-text="member.member_name"></option>
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_application.agent_id_error !== 'undefined'" v-text="new_application.agent_id_error"></span>
                                </div>
                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Scheme *</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.scheme_id" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option v-bind:value="scheme.id" v-for="scheme in schemes" v-text="scheme.scheme_name"></option>
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_application.scheme_id_error !== 'undefined'" v-text="new_application.scheme_id_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Scheme Info</label>
                                    <div v-html="new_application.scheme_info" style="border:1px solid #ccc;padding: 6px 12px;height:110px;"></div>
                                     
                                </div>
                                <div class="mb-3">
                                    <label>Opening Amount</label>
                                    <input type="text" class="form-control" v-model="new_application.opening_amount">
                                     
                                </div>
                                <div class="mb-3">
                                    <label>Pay Mode *</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.pay_mode">
                                        <option value="">--Select--</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Cheque</option>
                                        <option value="3">Online Transfer</option>
                                        
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_application.pay_mode_error !== 'undefined'" v-text="new_application.pay_mode_error"></span>
                                </div>

                                <div class="mb-3" v-if="new_application.pay_mode==2">
                                    <label>Bank Name*</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.bank_name">
                                        <option value="">--Select--</option>
                                        <option value="1">SAM</option>
                                        <option value="2">Bank A/c</option>
                                        
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_application.bank_name_error !== 'undefined'" v-text="new_application.bank_name_error"></span>
                                </div>

                                <div class="mb-3" v-if="new_application.pay_mode==2">
                                    <label>Cheque No*</label>
                                    <input type="text" class="form-control" v-model="new_application.cheque_no">
                                    <span class="font-13 text-danger" v-if="typeof new_application.cheque_no_error !== 'undefined'" v-text="new_application.cheque_no_error"></span>
                                </div>
                               
                                <div class="mb-3" v-if="new_application.pay_mode==2">
                                    <label>Cheque Date*</label>
                                    <date-picker style="width:100%"
                                        v-model="new_application.cheque_date"
                                        format="DD-MM-YYYY"
                                        type="date"
                                        value-type="YYYY-MM-DD"
                                        placeholder="Select date" >
                                    </date-picker>
                                    <span class="font-13 text-danger" v-if="typeof new_application.cheque_date_error !== 'undefined'" v-text="new_application.cheque_date_error"></span>
                                </div>

                                <div class="mb-3" v-if="new_application.pay_mode==3">
                                    <label>Reference No.*</label>
                                    <input type="text" class="form-control" v-model="new_application.reference">
                                    <span class="font-13 text-danger" v-if="typeof new_application.reference_error !== 'undefined'" v-text="new_application.reference_error"></span>
                                </div>
                                
                                <div class="mb-3" v-if="new_application.pay_mode==2 || new_application.pay_mode==3" >
                                    <label>Bank Account*</label>
                                    <select class="form-select flex-grow-1" v-model="new_application.bank_account_type">
                                        <option value="">--Select--</option>
                                        <option value="1">SAM</option>
                                        <option value="2">Bank A/c</option>
                                        
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_application.bank_account_type_error !== 'undefined'" v-text="new_application.bank_account_type_error"></span>
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
                                <input v-if="app.isNew" type="submit" @click="save_application()" value="Save" class="btn btn-outline-primary">
                                <input v-if="!app.isNew" type="submit" @click="save_application()" value="Update" class="btn btn-outline-primary">
                                <a href="<?= base_url() ?>savingaccount/scheme" class="btn btn-outline-danger"> Cancel </a>
                            </div>
                        </div>
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

         
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select value",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>
<!-- Initialise Vue Engine -->
<script type="text/javascript">
	jQuery(document).ready(function($) {

		// Create vue instance
		window.vm['saving_application'] = new Vue({
			el: '#vuejs-saving_application',
			name: 'Saving Application',
			store: window.store,
			data: {
				app: {
					options: {
						emulateJSON: true,
					},
					isNew: <?php echo !isset($this->application) ? 'true': 'false' ?>,
					endpoint: '<?= base_url() ?>savingaccount/save_application',
				},
                <?php if(!empty($this->application)){ ?>
                
                    new_application:{
                        id:'',
                        application_date:'',
                        member_id:'',
                        address:'',
                        joint_account:'',
                        minor_id:'',
                        agent_id:'',
                        scheme_id:'',
                        scheme_info:'',
                        opening_amount:'',
                        pay_mode:'',
                        bank_name:'',
                        cheque_no:'',
                        cheque_date:'',
                        bank_account_type:'',
                        reference:'',
                    },

                <?php  }else{ ?>
                    
                    new_application:{
                        application_date:'',
                        member_id:'',
                        address:'',
                        joint_account:'',
                        minor_id:'',
                        agent_id:'',
                        scheme_id:'',
                        scheme_info:'',
                        opening_amount:'',
                        pay_mode:'',
                        bank_name:'',
                        cheque_no:'',
                        cheque_date:'',
                        bank_account_type:'',
                        reference:'',

                    },

                <?php } ?>

                error_message:'',
                success_message:'',
                members:<?php echo json_encode($this->members) ?>,
                schemes:<?php echo json_encode($this->schemes) ?>,
			},
			computed: {
			   
			},
			methods: {
                validate_new_application:function(){
                    this.error_message = '';
                    this.success_message = '';
                    var valid = true;
                    if(this.new_application.application_date===''){
                        this.new_application.application_date_error ="Please enter date";
                        valid = false;
                    }else{
                        this.new_application.application_date_error ="";
                    }
                    if(this.new_application.member_id===''){
                        this.new_application.member_id_error ="Please select member!";
                        valid = false;
                    }else{
                        this.new_application.member_id_error ="";
                    }
                    if(this.new_application.scheme_id===''){
                        this.new_application.scheme_id_error ="Please select scheme!";
                        valid = false;
                    }else{
                        this.new_application.scheme_id_error ="";
                    }
                    if(this.new_application.agent_id===''){
                        this.new_application.agent_id_error ="Please select agent!";
                        valid = false;
                    }else{
                        this.new_application.agent_id_error ="";
                    }
                    if(this.new_application.pay_mode===''){
                        this.new_application.pay_mode_error ="Please select payment mode!";
                        valid = false;
                    }else{
                        this.new_application.pay_mode_error ="";
                    }

                    if(this.new_application.pay_mode==2){
                        if(this.new_application.bank_name===''){
                            this.new_application.bank_name_error ="Please select bank name!";
                            valid = false;
                        }else{
                            this.new_application.bank_name_error ="";
                        }
                        if(this.new_application.cheque_no===''){
                            this.new_application.cheque_no_error ="Please enter cheque no!";
                            valid = false;
                        }else{
                            this.new_application.cheque_no_error ="";
                        }
                        if(this.new_application.cheque_date===''){
                            this.new_application.cheque_date_error ="Please enter cheque date!";
                            valid = false;
                        }else{
                            this.new_application.cheque_date_error ="";
                        }
                        if(this.new_application.bank_account_type===''){
                            this.new_application.bank_account_type_error ="Please select bank account!";
                            valid = false;
                        }else{
                            this.new_application.bank_account_type_error ="";
                        }
                    }
                    if(this.new_application.pay_mode==3){
                        if(this.new_application.reference===''){
                            this.new_application.reference_error ="Please enter reference number!";
                            valid = false;
                        }else{
                            this.new_application.reference_error ="";
                        }
                        
                        if(this.new_application.bank_account_type===''){
                            this.new_application.bank_account_type_error ="Please select bank account!";
                            valid = false;
                        }else{
                            this.new_application.bank_account_type_error ="";
                        }
                    }

                    this.$forceUpdate();
                    return valid;
                },
                
                save_application:function(){
                    var is_valid = this.validate_new_application();
                    if(is_valid){
                        // Send the request
                        var query = {
                            scheme:this.new_application,
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
                    this.new_application = {
                        application_date:'',
                        member_id:'',
                        address:'',
                        joint_account:'',
                        minor_id:'',
                        agent_id:'',
                        scheme_id:'',
                        scheme_info:'',
                        opening_amount:'',
                        pay_mode:'',
                        bank_name:'',
                        cheque_no:'',
                        cheque_date:'',
                        bank_account_type:'',
                        reference:'',
                    };
                }
			},
			mounted: function() {
               
			}
		});

	});
</script>
<?php $this->load->view('front/footer'); ?>