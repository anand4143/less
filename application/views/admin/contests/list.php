<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Contests List</h4>
						<a href="<?php echo base_url('admin/contests/add');?>" class="btn btn-sm btn-link">Add New</a>
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>Contest Name</th>
													<th>Start Date</th>
													<th>End Date</th>
													<th>Created Date</th>
													<th class="w-5">Status</th>
													<th class="w-8">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if($contests):
													foreach($contests as $row):
													 $status = $row->status == 1 ? 'Active' : 'Inactive';
													 $class = $row->status == 1 ? 'badge-success' : 'badge-danger';?>
												<tr>
													<td><?php echo $row->contestName;?></td>
													<td><?php echo date('d-m-Y', strtotime($row->startDate));?></td>
													<td><?php echo date('d-m-Y', strtotime($row->endDate));?></td>
													<td><?php echo $row->createdDate;?></td>
													<td><span class="badge <?php echo $class;?>"><?php echo $status;?></span></td>
													<td>
														<a href="<?php echo base_url('admin/contests/edit/'.$row->id);?>" title="Edit Contest"><span class="fa fa-edit"></span></a>
														<a href="<?php echo base_url('admin/contests/delete/'.$row->id);?>" title="Remove Contest"><span class="fa fa-remove"></span></a>
													    <a href="#" id="levelListingId<?php echo $row->id;?>" class="contest-level-list" data-cid="<?php echo $row->id;?>" data-cname="<?php echo $row->contestName;?>" data-toggle="modal" data-target="#exampleModal" title="View Content Level List" ><i class="fa fa-list" aria-hidden="true"></i></a>
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
                </div>
                <!-- /Row -->



<?php  $this->view('templates/admin/footer.php'); ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="contestNameId"></span>(Level) </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contestLevelId">
          <table class="table table-sm table-hover mb-0">
			<thead>
				<tr>
					<th><strong>Level Name</strong></th>
					<th class="w-6"><strong>Current Level</strong></th>
					<th class="w-5">Current Level</th>
					<th class="w-5"><strong>Status</strong></th>
				</tr>
			</thead>
			<tbody id="tBodyLevelListingId">
			</tbody>
		  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="">
$('.contest-level-list').on('click', function() {
    var cId = $(this).attr('data-cid');
    $('#contestNameId').html($(this).attr('data-cname'));	
	var post_url = '<?php echo base_url();?>admin/levels/get_contest_levels/'+cId;
	
	let reqHeader = new Headers();
	reqHeader.append('Content-Type', 'text/json');
	let initObject = {
	method: 'GET', headers: reqHeader,
	};

	fetch(post_url, initObject)
	.then(function (response) {
		return response.json();
	})
	.then(function (data) {
		let html = '';
		if(data.resp_status == 'success'){
			$.each(data.list, function( index, row ) {
				let status = row.status ? 'Active' : 'Inactive';
				let isEnabled = row.isEnabled == 1 ? 'Yes' : 'No';
				let isChecked = row.isEnabled == 1 ? "checked='checked'" : "";
				html +="<tr>";
				html +=" <td>"+row.levelName+"</td>";
				html +=" <td>"+isEnabled+"</td>";
				html +=" <td><button id='btnCurrentLelvelId"+row.id+"' class='btn btn-sm btn-primary' type='button'><label style='margin-bottom: 0px;'><input type='radio' id='isEnabled"+row.id+"' name='isEnabled' value='"+row.id+"' data-cid='"+row.contestID+"' onclick='update_current_level(this);' class='current-level' "+isChecked+" > Current Level<label></button></td>";	
				html +=" <td>"+status+"</td>";				
				html +="</tr>";
			});
		} else {
			html +="<tr>";
			html +=" <td colspan='3' align='center'>No Level found!</td>";
			html +="</tr>";
		}
		$('#tBodyLevelListingId').html(html);
	})
	.catch(function (err) {
		console.log("Something went wrong!", err);
	});
});	

function update_current_level(objThis){
//$('.current-level').on('click', function() {
	var obj = $(objThis);
	var cId = obj.attr('data-cid');
	var lId = obj.val();
	var post_url = '<?php echo base_url();?>admin/levels/change_current_level/'+cId+'/'+lId;
	
	let reqHeader = new Headers();
	reqHeader.append('Content-Type', 'text/json');
	let initObject = {
		method: 'GET', headers: reqHeader,
	};

	fetch(post_url, initObject)
	.then(function (response) {
		return response.json();
	})
	.then(function (data) {		
		/*if(data.resp_status == 'success'){
			$.each(data.levels, function( index, row ) {
				let isChecked = row.isEnabled == 1 ? 'checked="checked"' : '';
				let html = '';
				html += '<label style="margin-bottom: 0px;">';
				html += ' <input type="radio" id="isEnabled'+row.id+'" name="isEnabled" value="'+row.id+'" data-cid="'+row.contestID+'" class="current-level" '+isChecked+'> Current Level';
				html += '</label>';
				$('#btnCurrentLelvelId'+row.id).html(html);
			});
		}*/
		$('#resp_msg').html(data.resp_msg);
		setTimeout(function(){$('#resp_msg').html('');},2000);
		
	})
	.catch(function (err) {
		console.log("Something went wrong!", err);
	});
//});
}
</script>