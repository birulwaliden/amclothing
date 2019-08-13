<div class="sticky-header header-section ">

	<div class="header-right">




		<div class="profile_details">		
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="profile_img">	
							<span class="prfil-img"><img src="<?php echo base_url() ?>assets/images/2.jpg" alt=""> </span> 
							<div class="user-name">
								<p><?php echo $this->session->userdata('username'); ?></p>
								<span><?php if ($this->session->userdata('jenisuser')==0) {
									echo "karyawan";

								}elseif ($this->session->userdata('jenisuser')==1) {
									echo "admin";
								} else{
									echo "superadmin";
								}

								?></span>
							</div>
							<i class="fa fa-angle-down lnr"></i>
							<i class="fa fa-angle-up lnr"></i>
							<div class="clearfix"></div>	
						</div>	
					</a>
					<ul class="dropdown-menu drp-mnu">
						<li> <a href="<?php echo base_url() ?>login/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>				
	</div>
	<div class="clearfix"> </div>	
</div>