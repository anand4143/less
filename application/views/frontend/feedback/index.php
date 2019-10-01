<?php  $this->view('templates/frontend/header.php');?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Feedback</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<!-- <ol class="breadcrumb">
								<li> <a href="index.html">Home</a> </li>
								<li> <a href="#">Home</a> </li>
								<li class="active">Signin</li>
							</ol> -->
						</div>
					</div>
				</div>
			</section>
<section class="signinContainer">
				<div class="container">
				<div class="signupcontainer signupcon">
                <div style="color:#0ad80a;"><?php echo $this->session->flashdata('Success');?></div>
                <div style="color:##f1032fd9;"><?php echo $this->session->flashdata('error');?></div>
				<!-- <form class="contact-form row columns_padding_5" method="post" action="http://webdesign-finder.com/html/thecrowd/"> -->
                <?php echo form_open('feedback/save',['class'=>'contact-form row columns_padding_5']);?>
								
								<div class="col-sm-12">
									<div class="form-group bottommargin_0">
										<label for="fullname">Name<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"fullname", "id"=>"fullname", "value"=> set_value('fullname'), "size"=>"30", 'maxlength'=> 64, "placeholder"=>"Name *"]);?>
                                        <!-- <input type="text" aria-required="true" size="30" value="" class="form-control" placeholder="First Name*"> -->
										<?php echo form_error('fullname');  ?>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="form-group bottommargin_0">
										<label for="name">Email Address <span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"email", "id"=>"email", "value"=> set_value('email'), "size"=>"30",'maxlength'=> 128,"placeholder"=>"Email Address *"]);?>
                                        <!-- <input type="text" aria-required="true" size="30" value="" class="form-control" placeholder="Email Address *"> -->
										<?php echo form_error('email');  ?>
									</div>
								</div>							
								
								<div class="col-sm-12">
									<div class="form-group bottommargin_0">
										<label for="email">Mobile<span class="required">*</span></label> 
                                        <?php echo form_input([ 'type'=>'tel','class'=>'form-control','name'=>'mobileno','id'=>'mobileno', "value"=> set_value('mobileno'),'size'=>'30', 'maxlength'=> 10,'placeholder'=>'Mobile No. *']);?>
                                        <?php echo form_error('mobileno');  ?>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group bottommargin_0"> <label for="message">Comment</label> 
                                    <?php echo form_textarea(['class'=>'form-control','name'=>'comment','id'=>'comment','size'=>'30','placeholder'=>'Comment', "rows"=>"5" ,"cols"=>"45"]);?>
                                    </div>
								</div>					
								
								<div class="col-sm-12">
									<div class="contact-form-submit topmargin_10 text-center">
										<button type="submit" id="contact_form_submit" name="save" class="theme_button btn-block color min_width_button">Save</button>
									</div>
								</div>
							
					</div>
				</div>
			</section>
			<?php  $this->view('templates/frontend/footer.php');?>	

<script type="text/javascript">
$(document).ready(function(){
    $("#state").on('change',function(){
        var stateId = $('#state').val();
        $.ajax({
            url  :"<?php echo base_url()?>/registration/fetchCity",
            data : {stateId : stateId },
            method : "POST",
            success : function(data){
                //alert(data);
                $('#city').html(data);
            }
        });
    });
});
</script>