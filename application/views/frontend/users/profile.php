<?php  $this->view('templates/frontend/header.php');?>
<?php 
	if(isset($userProfileImage->profileImageName) && $userProfileImage->profileImageName !=''){
		$pImage = $userProfileImage->profileImageName;
	}else{
		$pImage = 'profile.png';
	}
	if(isset($userProfileImage->coverImageName) && $userProfileImage->coverImageName !=''){
		$cImage = $userProfileImage->coverImageName;	
	}else{
		$cImage = 'cover.jpg';				
	}
	
?>
<div id="loader"></div>

<div class="container">
		<div class="relativeDiv">
			<div class="coverimgcontainer">
							
				<img src="<?php echo base_url('assets/profileImages/crop/').$cImage;?>"/>
				<div class="profileimage"><img src="<?php echo base_url('assets/profileImages/').$pImage;?>"/>
			</div>
			</div>
			<form enctype="multipart/form-data" id="image_submit" method="POST">
			<div class="editimgbutton">
				<div class="row">
					<div class="col-sm-5 imguptxt">
					Profile Image/Update Cover
					<ul class="list-inline">
							<li><div class="radio"> <label>
								<input type="radio" id="imgtype1" name="imgtype" value="P"> Profile Image
							</label> </div>
							</li>
							<li><div class="radio"> <label>
								<input type="radio" id="imgtype2" name="imgtype" value="C"> Cover Image
							</label> </div>
							</li>
							
						</ul>
					</div>
					<div class="col-sm-5">
						<div class="imgfile">						
							<div class="box">
								<!-- <input type="file" name="file-2[]" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple /> -->
								<input name="file" type="file"  id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
								<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select Image&hellip;</span></label>
							</div>
						</div>						
					</div>
					<div class="col-sm-2">
						<button type="submit" class="theme_button color btn-block" id="sub">Save</button>
					</div>
				</div>
			</div>
			</div>
			</form>
			
			<section class="dcommoncontainer">
				<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="dashboardboxes mtb">
						<div class="padding_30">
							<div class="userpro" style="padding-left: 0px;">
							<h5>My Info</h5>
							<div class="infosty clearfix">
								<strong>
									<i class="fa fa-user"></i>
								</strong> <?php echo $user->firstName.' '.$user->lastName;?> 
								<div class="editBTN">
								<a href="#editName" data-toggle="modal"><i class="fa fa-pencil"></i></a>
								</div>
							</div>
							<div class="infosty clearfix">
								<strong>
									<i class="fa fa-envelope"></i>
								</strong> <?php echo $user->email;?> 
								<!-- <div class="editBTN">
									<a href="#"><i class="fa fa-pencil"></i></a>
								</div> -->
							</div>
							<div class="infosty">
								<strong>
									<i class="fa fa-phone"></i>
								</strong> <?php echo $user->mobileno;?>
								<div class="editBTN">
								<a href="#editMobileno" data-toggle="modal"><i class="fa fa-pencil"></i></a>
								</div>
							</div>
							<div class="mt-20">
							<a class="theme_button color btn-block" href="<?php echo base_url('contests/previous_contests');?>" data-toggle="modal">Previous Contest</a>
							</div>
							<div class="mt-20">
							<a class="theme_button color btn-block" href="#currentcontest" data-toggle="modal">Current Contest</a>
							</div>
							</div>
						</div>
						</div>
						
					</div>
					
					
					<div class="col-md-7">
						
						<div class="dashboardboxes mtb">
						<div class="padding_30">
						<h5>About Me 
							<div class="editBTN">
								<a href="#editAboutme" data-toggle="modal"><i class="fa fa-pencil"></i></a>
							</div>
						</h5>
						
						<p>
						<?php echo $user->aboutUser;?> 
						
						</p>
							</div>
						</div>
						
					</div>
					
				</div>
				</div>
			</section>




<?php  $this->view('templates/frontend/footer.php');?>


<div id="currentcontest" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Current Contest</h5>
      </div>
      <div class="modal-body">
       
       
       <div class="cucontest table-responsive">
		<table width="100%" class="table table-hover" border="0" cellspacing="0" cellpadding="0">
		  <tbody>
			<tr>
			  <th style="width: 30%"><i class="fa fa-trophy"></i><strong> Contest Name</strong></th>
			  <th style="width: 25%"><i class="fa fa-calendar"></i><strong> Start Date</strong></th>
			  <th style="width: 25%"><i class="fa fa-calendar"></i><strong> End Date</strong></th>
			  <th style="width: 20%"><strong>Action</strong></th>
			</tr>
			<?php 
			if($contests):
				foreach($contests as $row):
			?>	
			<tr>
			  <td><?php echo $row->contestName;?></td>
			  <td><?php echo date('d-m-Y', strtotime($row->startDate));?></td>
			  <td><?php echo date('d-m-Y', strtotime($row->endDate));?></td>
			  <td>
				<?php if(!empty($row->userID)) :?>
				<a  href="<?php echo base_url('contests/contest_details/'.$row->id);?>" ><button class="theme_button color btn-block">View</button></a>
				
				<?php else :?>
				 <a  href="javascript:void(0);" data-url="<?php echo base_url('contests/participate/'.$row->id.'/'.$row->levelID);?>" onclick="participate_contest(this);"><button class="theme_button color btn-block">Participate</button></a>
				<?php endif;?>
			  </td>
			</tr>
			<?php endforeach;
			endif;?>
		  </tbody>
		</table>
	</div>
      </div>
      
    </div>
  </div>
</div>







<div id="editName" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Edit Name</h5>
      </div>
      <div class="modal-body contact-form row columns_padding_5">


	  <?php //echo form_open('user/editName',['class'=>'contact-form row columns_padding_5']);?>
    <div class="col-sm-12">
        <div class="form-group bottommargin_0">                                    
            <label for="name">First Name<span class="required">*</span></label>
			<input type="text" class="form-control" id="fname" name="fname" placeholder="First name"/>
            <?php 
                //echo form_input(['class'=>'form-control','type'=>'text','aria-required'=>'true','name'=>'fname','id'=>'fname','placeholder'=>'Frist Name*']); 
            ?>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group bottommargin_0">
            <label for="email">Password<span class="required">*</span></label>
			<input type="text" class="form-control" id="lname" name="lname" placeholder="Last name"/>
            <?php 
               //echo form_input(['class'=>'form-control','type'=>'text','aria-required'=>'true','name'=>'lname','id'=>'lname','placeholder'=>'Last Name*']); 
            ?>
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="contact-form-submit topmargin_10 text-center">
            <button type="submit" name="editnameBtn" id="editnameBtn"  class="theme_button btn-block color min_width_button">Save</button>
            
        </div>
    </div>
								
<?php //echo form_close();?>	
       
       
      </div>
      
    </div>
  </div>
</div>

<!--update mobile no -->


<div id="editMobileno" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Edit Mobile No</h5>
      </div>
      <div class="modal-body contact-form row columns_padding_5">
    <div class="col-sm-12">
        <div class="form-group bottommargin_0">                                    
            <label for="name">Mobile no<span class="required">*</span></label>
			<input type="text" class="form-control" id="mono" name="mono" placeholder="Mobile no"/>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="contact-form-submit topmargin_10 text-center">
            <button type="submit" name="editMobileBtn" id="editMobileBtn"  class="theme_button btn-block color min_width_button">Save</button>
        </div>
    </div>
      </div>
    </div>
  </div>
</div>
<!--end update mobile no -->


<!--update about me-->


<div id="editAboutme" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Edit About Me</h5>
      </div>
      <div class="modal-body contact-form row columns_padding_5">
    <div class="col-sm-12">
        <div class="form-group bottommargin_0">                                    
            <label for="name">About me<span class="required">*</span></label>
			<textarea  class="form-control" id="aboutme" name="aboutme" placeholder="About me"></textarea>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="contact-form-submit topmargin_10 text-center">
            <button type="submit" name="editAboutmeBtn" id="editAboutmeBtn"  class="theme_button btn-block color min_width_button">Save</button>
        </div>
    </div>
      </div>
    </div>
  </div>
</div>
<!--end update about me -->



<script type="text/javascript">
function participate_contest(obj){
	var url = $(obj).attr('data-url');
	if(confirm('Are you sure want to participate this contest')){
		window.location.href = url;
	}
}

$(document).ready(function(){
	$("#image_submit").on('submit', function(e){
		//e.preventDefault(); 
		var radioTypeVal = $("input[name=imgtype]:checked").val();
		var imgVal = $("#file-2").val();
		if( radioTypeVal == undefined){
			alert("Please select Profile Image/Update Cover option");
			return false;
		}else if(imgVal == ''){
			alert("Please select Profile Image/Update Cover image");
			return false;
		}else{		
		$("#loader").addClass('imgloader');
		
         $.ajax({
             url:'<?php echo base_url()?>user/do_upload',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
				  //alert(data)
				  //$("#loader").removeClass('imgloader');
				  
				  if(data){
					alert("Image uploaded successfully");

				  }
				location.reload();
           }
         });
		}
	});

	$('#editnameBtn').on('click',function(){
		
		let fname  = $('#fname').val();
		let lname = $('#lname').val();

		if(fname == ''){
			alert("Please enter first name!");
			return false;
		}else if(lname == ''){
			alert("Please enter last name!");
			return false;
		}else{
			$.ajax({
             url:'<?php echo base_url()?>user/editName',
             type:"post",
             data: "fn="+fname+"&ln="+lname,
              success: function(data){
				  //alert(data)
				  //$("#loader").removeClass('imgloader');
				  
				  if(data){
					alert("Profile name updated successfully");

				  }
				location.reload();
           }
         });
		}

	});

	/**update mobile no */

	$('#editMobileBtn').on('click',function(){		
		let mono  = $('#mono').val();
		//alert(mono);
		if(mono == ''){
			alert("Please enter mobile no!");
			return false;
		}else{
			$.ajax({
             url:'<?php echo base_url()?>user/editMobileno',
             type:"post",
             data: "mono="+mono,
              success: function(data){
				  //alert(data)
				  //$("#loader").removeClass('imgloader');
				  
				  if(data){
					alert("Profile mobile no updated successfully");

				  }
				location.reload();
           }
         });
		}

	});


	/**update about me */

	$('#editAboutmeBtn').on('click',function(){		
		let aboutme  = $('#aboutme').val();
		//alert(aboutme);
		if(aboutme == ''){
			alert("Please enter about me!");
			return false;
		}else{
			$.ajax({
             url:'<?php echo base_url()?>user/editAboutme',
             type:"post",
             data: "aboutme="+aboutme,
              success: function(data){
				  //alert(data)
				  //$("#loader").removeClass('imgloader');
				  
				  if(data){
					alert("Profile about me updated successfully");

				  }
				location.reload();
           }
         });
		}

	});

	
});



</script>