<?php  $this->view('templates/frontend/header.php');?>
<div class="container">
			<div class="coverimgcontainer">
				<img src="<?php echo base_url('assets/frontend/images/cover.jpg');?>"/>
				<div class="profileimage"><img src="<?php echo base_url('assets/frontend/images/profile.jpg');?>"/></div>
			</div>
			<div class="editimgbutton">
				<div class="row">
					<div class="col-sm-5 imguptxt">
					Update Cover/Profile Image
					<ul class="list-inline">
							<li><div class="radio"> <label>
								<input type="radio" name="optionsRadios"> Profile Image
							</label> </div>
							</li>
							<li><div class="radio"> <label>
								<input type="radio" name="optionsRadios"> Cover Image
							</label> </div>
							</li>
							
						</ul>
					</div>
					<div class="col-sm-7">
					<div class="imgfile">
						
						<div class="box">
									<input type="file" name="file-2[]" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
									<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select Image&hellip;</span></label>
								</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			
			
			<section class="dcommoncontainer">
				<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="dashboardboxes mtb">
						<div class="padding_30">
							<div class="userpro" style="padding-left: 0px;">
							<h5>My Info</h5>
							<div class="infosty"><strong><i class="fa fa-user"></i></strong> Anand Sukla </div>
							<div class="infosty"><strong><i class="fa fa-envelope"></i></strong> XYZ@gmail.com </div>
							<div class="infosty"><strong><i class="fa fa-phone"></i></strong>  +91 95xxxxxxx6</div>
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
						<h5>About Me</h5>
						
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
							</div>
						</div>
						
					</div>
					
				</div>
				</div>
			</section>



<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">User Profile</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="index.html">Home</a> </li>
								<li> <a href="#">User Profile</a> </li>
								
							</ol>
						</div>
					</div>
				</div>
			</section>
<!-- <div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
        <div class="panel-body text-cente">Previous Contests</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
        <div class="panel-body text-cente">Current Contest</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body text-cente">Contests List</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body text-cente"><a href="<?php  base_url();?>/user/profile">Profile</div>
        </div>
    </div>
</div> -->

<section class="dashboardcontainer">
				<div class="container">
				<div class="row">
					<div class="col-sm-6">First Name : 
                        <?php //echo "<pre>";print_r($user );
                        echo $user->firstName
                        ?>
					</div>
					
					<div class="col-sm-6">Last Name : 
						<?php echo $user->lastName?>
					</div>
					
					<div class="col-sm-6">Email : 
                    <?php echo $user->email?>
					</div>
					
					<div class="col-sm-6">
						asdfsdfasd asdf asdfasdfasdfsadf
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
			  <th style="width: 30%"><strong>Contest Name</strong></th>
			  <th style="width: 25%"><strong>Start Date</strong></th>
			  <th style="width: 25%"><strong>End Date</strong></th>
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
			  <td><a class="theme_button color" href="javascript:void(0);" data-url="<?php echo base_url('contests/participate/'.$row->id.'/'.$row->levelID);?>" onclick="participate_contest(this);">Participate</a></td>
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

<script type="text/javascript">
function participate_contest(obj){
	var url = $(obj).attr('data-url');
	if(confirm('Are you sure want to participate this contest')){
		window.location.href = url;
	}
}
</script>