<?php  $this->view('templates/frontend/header.php');?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">MERA GAANA CONTEST</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url();?>">Home</a> </li>
								<!-- <li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li> -->
								
							</ol>
						</div>
					</div>
				</div>
			</section>

			<section class="dashboardcontainer">
				<div class="container">
                <div class="row">
					<div class="col-sm-12"><h3>Contest Information</h3>
                    </div>
                    </div>
				<div class="row">
					<div class="col-sm-12">
                    <?php
                        //echo "<pre>";print_r($description[0]->);
                        echo $description[0]->description;

                    ?>
					</div>
					
				</div>
				</div>
			</section>
<?php  $this->view('templates/frontend/footer.php');?>