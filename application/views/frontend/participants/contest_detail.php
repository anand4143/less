<?php $this->view('templates/frontend/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
					<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contest Details</h4>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 390px;"><div id="activity" style="overflow: hidden; width: auto; height: 390px;">
                                    <?php echo $c_data->contestName;?>
									<br>
									 <?php echo $c_data->levelName;?>
									<br>
                                     <?php echo $c_data->description;?>
                                </div>
								<div class="slimScrollBar" style="background: transparent; width: 5px; position: absolute; top: 108px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 268.728px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </div>
                        </div>
						
					</div>
                </div>
                <!-- /Row -->



<?php  $this->view('templates/frontend/footer.php'); ?>


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