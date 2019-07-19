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
					<th class="w-5"><strong>Status</strong></th>
					<th class="w-5"><strong>Enabled</strong></th>
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
	var post_url = '<?php echo base_url();?>admin/levels/get_listing_data/'+cId;
	
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
				let isEnabled = row.isEnabled ? 'Yes' : 'No';
				html +="<tr>";
				html +=" <td>"+row.levelName+"</td>";
				html +=" <td>"+status+"</td>";
				html +=" <td>"+isEnabled+"</td>";
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



	function loadLevelList(obj){
		var cId = $(this).attr('data-cid'); 
		var post_url = '<?php base_url();?>admin/levels/get_listing_data/'+cId;
		 //call the fetch function
    fetch(post_url)
    .then(res => res.json())//response type
    .then(data => console.log(data)); //log the data;
		
		
		
		$.ajax({
			url: post_url,
			timeout:5000,
			
			success: function(data){
				container.html(data);
			},
			error: function(req,error){
				if(error === 'error'){error = req.statusText;}
				var errormsg = 'There was a communication error: '+error;
				container.html(errormsg);
			},
			beforeSend: function(data){
				container.html('<p>Loading...</p>');
			}
		});
	}
</script>