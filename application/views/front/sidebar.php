<nav id="sidebar" class="sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="<?= base_url() ?>dashboard">
        <i class="align-middle" data-feather="package"></i> <span class="align-middle me-3">HRDNL</span> </a>
		<ul class="sidebar-nav">
			<li class="sidebar-item active">
				<a class="sidebar-link" href="<?= base_url() ?>dashboard"> <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span></a>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed"><i class="fas fa-users"></i> <span class="align-middle">Master Record</span></a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse bg-dark" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>front/company_profile">Company Profile</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>front/member_group">Member Group</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>front/members">Members</a></li>
                </ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                    <i class="align-middle" data-feather="share"></i> <span class="align-middle">Fixed EMI Loan</span>
                </a>
				<ul id="auth" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="fixed-emi-scheme">Scheme</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="fixed-emi-application">Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="fixed-emi-approve">Approve Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="fixed-emi-disburse">Disburse Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="fixed-emi-loan-amount">Loan Accounts</a></li>

				</ul>
			</li>
            <!-- <li class="sidebar-item">
				<a class="sidebar-link" href="tables-bootstrap.html"> <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Single Deposit Window</span> </a>
			</li> -->
			<li class="sidebar-item">
				<a data-bs-target="#documentation" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fa fa-fw fa-life-ring"></i> <span class="align-middle">Saving Accounts</span>
                </a>
				<ul id="documentation" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>savingaccount/scheme">Scheme</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>savingaccount/saving_account_application">Saving Account Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Approve Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Saving Account</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Virtual Account</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#recc" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fas fa-university"></i> <span class="align-middle">Recurring Deposit</span>
                </a>
				<ul id="recc" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#">RD Calculator</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Scheme</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Recurring Deposit Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Approve Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Recurring Deposit Account</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#fixed" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fas fa-coins"></i> <span class="align-middle">Fixed Deposit</span>
                </a>
				<ul id="fixed" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#">Calculator</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Scheme</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">FD Deposit Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Approve Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">FD Deposit Account</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#mis" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fas fa-coins"></i> <span class="align-middle">MIS</span>
                </a>
				<ul id="mis" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#">Calculator</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Scheme</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">MIS Deposit Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Approve Application</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#Micro" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fas fa-coins"></i> <span class="align-middle">Micro Loan</span>
                </a>
				<ul id="Micro" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#">Scheme</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Collection Centers</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Collection Groups</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Loan Accounts</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#Approve" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fas fa-coins"></i> <span class="align-middle">Approve/Reject</span>
                </a>
				<ul id="Approve" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#">Pending Transaction</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Pending Application</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">NEFT/IMPS Transactions</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Pending Members</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#Agent" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fas fa-coins"></i> <span class="align-middle">Agent/Advisor</span>
                </a>
				<ul id="Agent" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#">Agents/Advisor Rank</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Agents/Advisor</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Agents Commission</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#Office" data-bs-toggle="collapse" class="sidebar-link collapsed"> 
                <i class="fas fa-coins"></i> <span class="align-middle">Office Management</span>
                </a>
				<ul id="Office" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="#">Employee Profile</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Transfer with in Saving Account</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Bank Account Verification</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="#">Other Branch Operations</a></li>
				</ul>
			</li>
			<!-- <li class="sidebar-header"> Tools & Components </li>
			<li class="sidebar-item">
				<a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="grid"></i> <span class="align-middle">UI Elements</span> </a>
				<ul id="ui" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-carousel.html">Carousel</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-embed-video.html">Embed Video</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General <span class="badge badge-sidebar-primary">10+</span></a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Modals</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-offcanvas.html">Offcanvas</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-tabs.html">Tabs</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#icons" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Icons</span> <span class="badge badge-sidebar-primary">1500+</span> </a>
				<ul id="icons" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="icons-feather.html">Feather</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="icons-font-awesome.html">Font Awesome</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span> </a>
				<ul id="forms" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Layouts</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Basic Inputs</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-input-groups.html">Input Groups</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-floating-labels.html">Floating Labels</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="tables-bootstrap.html"> <i class="align-middle" data-feather="list"></i> <span class="align-middle">Single Deposit Window</span> </a>
			</li>
			<li class="sidebar-header"> Plugin & Addons </li>
			<li class="sidebar-item">
				<a data-bs-target="#form-plugins" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Form Plugins</span> </a>
				<ul id="form-plugins" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="forms-advanced-inputs.html">Advanced Inputs</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-editors.html">Editors</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-validation.html">Validation</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="forms-wizard.html">Wizard</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#datatables" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="list"></i> <span class="align-middle">DataTables</span> </a>
				<ul id="datatables" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-responsive.html">Responsive Table</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-buttons.html">Table with Buttons</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-column-search.html">Column Search</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-fixed-header.html">Fixed Header</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-multi.html">Multi Selection</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables-ajax.html">Ajax Sourced Data</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#charts" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Charts</span> <span class="badge badge-sidebar-primary">New</span> </a>
				<ul id="charts" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="charts-chartjs.html">Chart.js</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="charts-apexcharts.html">ApexCharts <span class="badge badge-sidebar-primary">New</span></a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="notifications.html"> <i class="align-middle" data-feather="bell"></i> <span class="align-middle">Notifications</span> </a>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#maps" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Maps</span> </a>
				<ul id="maps" class="sidebar-dropdown list-unstyled collapse bg-dark " data-bs-parent="#sidebar">
					<li class="sidebar-item"><a class="sidebar-link" href="maps-google.html">Google Maps</a></li>
					<li class="sidebar-item"><a class="sidebar-link" href="maps-vector.html">Vector Maps</a></li>
				</ul>
			</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="calendar.html"> <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Calendar</span> </a>
			</li>
			<li class="sidebar-item">
				<a data-bs-target="#multi" data-bs-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="share-2"></i> <span class="align-middle">Multi Level</span> </a>
				<ul id="multi" class="sidebar-dropdown list-unstyled collapse bg-dark" data-bs-parent="#sidebar">
					<li class="sidebar-item"> <a data-bs-target="#multi-2" data-bs-toggle="collapse" class="sidebar-link collapsed">
                  Two Levels
                </a>
						<ul id="multi-2" class="sidebar-dropdown list-unstyled collapse bg-dark">
							<li class="sidebar-item"> <a class="sidebar-link" data-bs-target="#">Item 1</a> <a class="sidebar-link" data-bs-target="#">Item 2</a> </li>
						</ul>
					</li>
					<li class="sidebar-item"> <a data-bs-target="#multi-3" data-bs-toggle="collapse" class="sidebar-link collapsed">
                  Three Levels
                </a>
						<ul id="multi-3" class="sidebar-dropdown list-unstyled collapse bg-dark">
							<li class="sidebar-item"> <a data-bs-target="#multi-3-1" data-bs-toggle="collapse" class="sidebar-link collapsed">
                      Item 1
                    </a>
								<ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse bg-dark">
									<li class="sidebar-item"> <a class="sidebar-link" data-bs-target="#">Item 1</a> <a class="sidebar-link" data-bs-target="#">Item 2</a> </li>
								</ul>
							</li>
							<li class="sidebar-item"> <a class="sidebar-link" data-bs-target="#">Item 2</a> </li>
						</ul>
					</li>
				</ul>
			</li> -->
		</ul>
	</div>
</nav>