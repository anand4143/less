<?php $this->view('templates/admin/header.php'); ?>

 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Assign Users To Judges</h4>
						<!-- <button class="btn btn-sm btn-link">view all</button> -->
						<span id="notification"><?php echo $this->session->flashdata('updateMessage'); ?></span>
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
									
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>S.No</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Contests List</th>
													<th>Levels List</th>
													<th>Judge List</th>
													<th class="w-10">Assign</th>
												</tr>
											</thead>
											<tbody>
											<?php
											foreach($userList as $user){
											?>
												<tr>
                                                <td class="w-5">
													<img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon"></td>
													<td class="w-5"><?php echo $user->firstName;?></td>
													<td class="w-5"><?php echo $user->lastName;?></td>
													<td class="w-10"><?php echo $user->email;?></td>
													<td class="w-20">
                                                        <select class="form-control custom-select  mt-15 contestDrop" id="contestDrop" name="contestDrop" data-id="<?php echo $user->id;?>">
                                                            <option selected>Select Contest</option>
                                                            <?php foreach($contestList as $contest): ?>
                                                            <option value="<?php echo $contest->id;?>"><?php echo $contest->contestName;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                        
                                                    </td>
                                                    <td class="w-20">
                                                        <select class="form-control custom-select  mt-15 levelDropdown" id="levelDropdown<?php echo $user->id;?>">
                                                            <option selected>Select Lavel</option>
                                                        </select>
                                                        
                                                    </td>

                                                    <td class="w-20">
                                                        <select class="form-control custom-select  mt-15">
                                                            <option selected>Select Judge</option>
                                                            <?php foreach($judgeList as $judge): ?>
                                                            <option value="<?php echo $judge->id;?>"><?php echo $judge->firstName;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                       
                                                </td>
                                                    <td class="w-15">
														<a href="<?php echo base_url('admin/user/edit/'.$user->id);?>" title="Edit Contest"><span class="fa fa-edit"></span></a>
														<a href="<?php echo base_url('admin/user/delete/'.$user->id);?>" title="Remove Contest"><span class="fa fa-remove"></span></a>
													</td>
												</tr>
											<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>		
					</div>
                </div>
                <!-- /Row -->


<?php  $this->view('templates/admin/footer.php'); ?>


<script type="text/javascript">

$('.contestDrop').change(function() {    
    var item=$(this);
    //alert(item.attr("data-id"));
    //alert(item.val());
    var userid = item.attr("data-id");
    var contestID = item.val();
    $.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/user/getLevels",
		data: "id="+contestID,
		cache : false,
		success : function(data){
            console.log(data);
            $("#levelDropdown"+userid).html(data);

            // var result = JSON.parse(data);
            //  console.log("result arr===> ",result);
            //  //console.log(result[0]);
            //  var output = '';
            //  if(result == false){
            //     $("#levelDropdown").append(false);
            //     console.log("hiii");
            //  }else{
            //     for(i=0; i < result.length; i++){
            //         console.log("id==>"+i,result[i].id);
            //         output = '<option value="'+result[i].id+'">'+result[i].levelName+'</option>';
            //         $("#levelDropdown").append(output);
            //         //output += result[i].contestName;
            //         // output += "</option>";
            //     }
            //     //console.log("====> ",output);
               
            //     output = '';
            //  }
           
		}
    });
    
});

//function getLevels(contestData){
   // console.log('helll',contestData);

    

</script>