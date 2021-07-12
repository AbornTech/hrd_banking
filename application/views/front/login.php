<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/vue-setup"); ?>
<div class="main d-flex justify-content-center w-100">
    <main class="content d-flex p-0">
        <div class="container d-flex flex-column">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome back Ashis</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                            <span style="font-size:20px" class="login-box-msg text-danger">
                                <?php echo $this->session->flashdata('message');?>
                            </span>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="<?= base_url()?>img/avatars/login_avatar.jpg" alt="Chris Wood" class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <?php echo form_open('front/login'); ?>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="username" value="<?php echo set_value('username'); ?>" placeholder="Enter your email" />
                                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Enter your password" />
                                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            <small>
                                                <a href="">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                                                <label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

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
					isNew: <?php echo !isset($this->member_details) ? 'true': 'false' ?>,
					endpoint: '<?= base_url() ?>front/save_member',
				},
                <?php if(!empty($this->member_details)){ ?>
                
                    new_member:{
                        id:'',
                        enroll_date:'',
                        gender:'',
                        marital_status:'',
                        alternate_number:'',
                        relative_type:'',
                        relative_name:'',
                        religion:'',
                        member_group:'',
                        member_title:'',
                        member_name:'',
                        dob:'',
                        primary_mobile_number:'',
                        email:'',
                        mother_name:'',
                        cast:'',
                        introducer_member:'',
                        latitude:'',
                        longitude:'',
                        aadhar_no:'',
                        pan_no:'',
                        voter_id:'',
                        ration_card:'',
                        driving_license:'',
                        passport_no:'',
                    },

                <?php  }else{ ?>
                    
                    new_member:{
                        enroll_date:'',
                        gender:'',
                        marital_status:'',
                        alternate_number:'',
                        relative_type:'',
                        relative_name:'',
                        religion:'',
                        member_group:'',
                        member_title:'',
                        member_name:'',
                        dob:'',
                        primary_mobile_number:'',
                        email:'',
                        mother_name:'',
                        cast:'',
                        introducer_member:'',
                        latitude:'',
                        longitude:'',
                        aadhar_no:'',
                        pan_no:'',
                        voter_id:'',
                        ration_card:'',
                        driving_license:'',
                        passport_no:'',

                    },

                <?php } ?>

                error_message:'',
                success_message:'',
                member_groups:<?php echo json_encode($this->groups) ?>,
                members:<?php echo json_encode($this->members) ?>,
                
			},
			computed: {
			   
			},
			methods: {
                validate_new_member:function(){
                    this.error_message = '';
                    this.success_message = '';
                    var valid = true;
                    if(this.new_member.enroll_date===''){
                        this.new_member.enroll_date_error ="Please select enroll date!";
                        valid = false;
                    }else{
                        this.new_member.enroll_date_error ="";
                    }
                    if(this.new_member.gender===''){
                        this.new_member.gender_error ="Please select gender!";
                        valid = false;
                    }else{
                        this.new_member.gender_error ="";
                    }
                    if(this.new_member.marital_status===''){
                        this.new_member.marital_status_error ="Please select marital status!";
                        valid = false;
                    }else{
                        this.new_member.marital_status_error ="";
                    }
                    if(this.new_member.primary_mobile_number===''){
                        this.new_member.primary_mobile_number_error ="Please enter primary mobile number!";
                        valid = false;
                    }else{
                        this.new_member.primary_mobile_number_error ="";
                    }
                    if(this.new_member.member_title===''){
                        this.new_member.member_title_error ="Please select member title";
                        valid = false;
                    }else{
                        this.new_member.member_title_error ="";
                    }
                    if(this.new_member.member_name===''){
                        this.new_member.member_name_error ="Please enter member name";
                        valid = false;
                    }else{
                        this.new_member.member_name_error ="";
                    }
                    this.$forceUpdate();
                    return valid;
                },
                
                save_member:function(){
                    var is_valid = this.validate_new_member();
                    if(is_valid){
                        // Send the request
                        var query = {
                            new_member:this.new_member,
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
                    this.new_member = {
                        enroll_date:'',
                        gender:'',
                        marital_status:'',
                        alternate_number:'',
                        relative_type:'',
                        relative_name:'',
                        religion:'',
                        member_group:'',
                        member_title:'',
                        member_name:'',
                        dob:'',
                        primary_mobile_number:'',
                        email:'',
                        mother_name:'',
                        cast:'',
                        introducer_member:'',
                        latitude:'',
                        longitude:'',
                        aadhar_no:'',
                        pan_no:'',
                        voter_id:'',
                        ration_card:'',
                        driving_license:'',
                        passport_no:'',
                    };
                }
			},
			mounted: function() {
               
			}
		});

	});
</script>