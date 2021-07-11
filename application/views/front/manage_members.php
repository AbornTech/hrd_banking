
<?php $this->load->view('front/header'); ?>
<?php $this->load->view("front/sidebar"); ?>
<?php $this->load->view("front/nav"); ?>
<?php $this->load->view("front/vue-setup"); ?>
<main class="content" id="vuejs-saving_application">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Member</h1>
        
        <div class="row">
             
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- basic info -->
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Enrollment Date *</label> <br>
                                    <date-picker style="width:100%"
                                        v-model="new_member.enroll_date"
                                        format="DD-MM-YYYY"
                                        type="date"
                                        value-type="YYYY-MM-DD"
                                        placeholder="Select date" >
                                    </date-picker>
                                     
                                    <span class="font-13 text-danger" v-if="typeof new_member.enroll_date_error !== 'undefined'" v-text="new_member.enroll_date_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Gender *</label>
                                    <select class="form-select flex-grow-1" v-model="new_member.gender" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_member.gender_error !== 'undefined'" v-text="new_member.gender_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Marital Status *</label>
                                    <select class="form-select flex-grow-1" v-model="new_member.marital_status" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option value="1">Married</option>
                                        <option value="2">Unmarried</option>
                                        
                                    </select>
                                    <span class="font-13 text-danger" v-if="typeof new_member.marital_status_error !== 'undefined'" v-text="new_member.marital_status_error"></span>
                                </div>

                                <div class="mb-3">
                                    <label>Alternate Mobile No</label>
                                    <input type="text" class="form-control" v-model="new_member.alternate_number">
                                    <span class="font-13 text-danger"></span>
                                </div>

                                <div class="mb-3">
                                    <label>Relative's Name</label>
                                    <div class="input-group mb-3">
										<select class="form-select" v-model="new_member.relative_type">
                                            <option>Select...</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Husband">Husband</option>
                                            <option value="Spouse">Spouse</option>
                                        </select>
										<input type="text"  v-model="new_member.relative_name" class="form-control" placeholder="">
									</div>
                                    <span class="font-13 text-danger"></span>
                                </div>

                                <div class="mb-3">
                                    <label>Religion</label>
                                    <input type="text"  v-model="new_member.religion" class="form-control" placeholder="">
                                    
                                </div>
                                <div class="mb-3">
                                    <label>Member Group</label>
                                    <select class="form-select flex-grow-1" v-model="new_member.member_group" data-toggle="select2">
                                        <option value="">--Select--</option>
                                        <option v-bind:value="group.id" v-for="group in member_groups" v-text="group.group_name"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Member's Name*</label>
                                    <div class="input-group mb-3">
										<select class="form-select" style="width:10px" v-model="new_member.member_title">
                                            <option>Select...</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Master">Master</option>
                                            <option value="Shri">Shri</option>
                                            <option value="Smt.">Smt.</option>
                                            <option value="Dr.">Dr.</option>
                                        </select>
										<input type="text"  v-model="new_member.member_name" class="form-control" placeholder="">
									</div>
                                    <span class="font-13 text-danger" v-if="typeof new_member.member_title_error !== 'undefined'" v-text="new_member.member_title_error"></span>
                                    <span class="font-13 text-danger" v-if="typeof new_member.member_name_error !== 'undefined'" v-text="new_member.member_name_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Date of Birth</label>
                                    <date-picker style="width:100%"
                                        v-model="new_member.dob"
                                        format="DD-MM-YYYY"
                                        type="date"
                                        value-type="YYYY-MM-DD"
                                        placeholder="Select date" >
                                    </date-picker>
                                     
                                </div>
                                <div class="mb-3">
                                    <label>Primary Mobile No *</label>
                                    <input type="text" class="form-control" v-model="new_member.primary_mobile_number">
                                    <span class="font-13 text-danger" v-if="typeof new_member.primary_mobile_number_error !== 'undefined'" v-text="new_member.primary_mobile_number_error"></span>
                                </div>

                                <div class="mb-3">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" v-model="new_member.email">
                                </div>

                                <div class="mb-3">
                                    <label>Mother's Name</label>
                                    <input type="text" class="form-control" v-model="new_member.mother_name">
                                </div>

                                <div class="mb-3">
                                    <label>Cast</label>
                                    <input type="text" class="form-control" v-model="new_member.cast">
                                </div>
                                
                                <div class="mb-3">
                                    <label>Introducer Member Name</label>
                                    <select class="form-select flex-grow-1" v-model="new_member.introducer_member">
                                        <option value="">--Select--</option>
                                        <option v-bind:value="member.id" v-for="member in members" v-text="member.member_name"></option>
                                    </select>
                                </div>
 
                            </div>
                        </div>
                        
                        <!-- GPS Location: -->
                        <div class="row">
                            <div class="col-12">
                                <h4>GPS Location:</h4>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" v-model="new_member.latitude">
                                    <span class="font-13 text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control" v-model="new_member.longitude">
                                    <span class="font-13 text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <!-- kyc info -->
                        <div class="row">
                            <div class="col-12">
                                <h4>KYC Information:</h4>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>AADHAR No</label>
                                    <input type="text" class="form-control" v-model="new_member.aadhar_no">
                                    <span class="font-13 text-danger"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Voter ID No</label>
                                    <input type="text" class="form-control" v-model="new_member.voter_id">
                                    <span class="font-13 text-danger"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Driving License No</label>
                                    <input type="text" class="form-control" v-model="new_member.driving_license">
                                    <span class="font-13 text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label>PAN</label>
                                    <input type="text" class="form-control" v-model="new_member.pan_no">
                                    <span class="font-13 text-danger"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Ration Card No</label>
                                    <input type="text" class="form-control" v-model="new_member.ration_card">
                                    <span class="font-13 text-danger"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Passport No</label>
                                    <input type="text" class="form-control" v-model="new_member.passport_no">
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
                                <input v-if="app.isNew" type="submit" @click="save_member()" value="Save" class="btn btn-outline-primary">
                                <input v-if="!app.isNew" type="submit" @click="save_member()" value="Update" class="btn btn-outline-primary">
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
<?php $this->load->view('front/footer'); ?>