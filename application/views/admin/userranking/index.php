<?php $this->view('templates/admin/header.php'); ?>
<link href="<?php echo base_url();?>assets/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
			<?php echo $this->session->flashdata('resp_msg'); ?>
			<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
				<h4>User Score</h4>
			</div>
			<div class="card">
				<div class="card-body pa-0">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="tableUserContests" class="table table-sm table-hover mb-0 table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contest Name</th>
										<th>Level</th>
										<th>Score</th>
									</tr>
								</thead>
								<tbody>
									
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
<script src="<?php echo base_url();?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>


<!--Level Modal -->
<div class="modal fade" id="levelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fluid"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="exampleModalLabel">Score : <small id="userNameId"></small> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " id="songReport"> </div>
      <div class="modal-footer">
	    <div id="resp_msg" class="text-left"></div>
        <div class="text-right "><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function show_user_contest_level(obj){
	console.log("====>",obj);
    
	var uname = $(obj).attr('data-uname');
	var uclId = $(obj).attr('data-id');
	var smuleID = $(obj).attr('data-smuleid');
	var ucId = $(obj).attr('data-cid');
	var ulId = $(obj).attr('data-lid');
    $('#userNameId').html(uname);	
	// var post_url = '<?php echo base_url();?>admin/levels/get_contest_levels/'+smuleID;
	var post_url = '<?php echo base_url();?>admin/userranking/get_contest_levels/'+smuleID;
	
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
		console.log("----> ",data);
		let html = '';
		if(data.resp_status == 'success'){
			//console.log(data.list[0].id)
			html += '<div class="row">';
			html +='<div class="col-sm-3">Sur</div>';
			html +='<div class="col-sm-3">'+data.list[0].sur+"</div>";
			html +='<div class="col-sm-3">Taal</div>';
			html +='<div class="col-sm-3">'+data.list[0].Taal+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';

			html += '<div class="row">';
			html +='<div class="col-sm-3">Emotion Feel</div>';
			html +='<div class="col-sm-3">'+data.list[0].Emotion_Feel+"</div>";
			html +='<div class="col-sm-3">Voice Quality Nasal</div>';
			html +='<div class="col-sm-3">'+data.list[0].Voice_Quality_Nasal+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';

			html += '<div class="row">';
			html +='<div class="col-sm-3">Soothing Level</div>';
			html +='<div class="col-sm-3">'+data.list[0].Soothing_Level+"</div>";
			html +='<div class="col-sm-3">Copy Or Originality</div>';
			html +='<div class="col-sm-3">'+data.list[0].Copy_Or_Originality+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';

			html += '<div class="row">';
			html +='<div class="col-sm-3">Variation</div>';
			html +='<div class="col-sm-3">'+data.list[0].Variation+"</div>";
			html +='<div class="col-sm-3">Diction</div>';
			html +='<div class="col-sm-3">'+data.list[0].Diction+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';

			html += '<div class="row">';
			html +='<div class="col-sm-3">Murki Vibratos"</div>';
			html +='<div class="col-sm-3">'+data.list[0].Murki_Vibratos+"</div>";
			html +='<div class="col-sm-3">Alaap</div>';
			html +='<div class="col-sm-3">'+data.list[0].Alaap+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';

			html += '<div class="row">';
			html +='<div class="col-sm-3">Sargam</div>';
			html +='<div class="col-sm-3">'+data.list[0].Sargam+"</div>";
			html +='<div class="col-sm-3">Judge Score</div>';
			html +='<div class="col-sm-3">'+data.list[0].Judge_Score+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';

			html += '<div class="row">';
			html +='<div class="col-sm-3">parameter1</div>';
			html +='<div class="col-sm-3">'+data.list[0].parameter1+"</div>";
			html +='<div class="col-sm-3">parameter2</div>';
			html +='<div class="col-sm-3">'+data.list[0].parameter2+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';

			html += '<div class="row">';
			html +='<div class="col-sm-3">parameter3</div>';
			html +='<div class="col-sm-3">'+data.list[0].parameter3+"</div>";
			html +='<div class="col-sm-3">parameter4</div>';
			html +='<div class="col-sm-3">'+data.list[0].parameter4+"</div>";
			html += '</div>';
			html += '<div class="row"><div class="col-sm-12"><hr/></div></div>';
			html += '<div class="row">';
			html +='<div class="col-sm-3">parameter5 </div>';
			html +='<div class="col-sm-3">'+data.list[0].parameter5+"</div>";
			html += '</div>';

			// $.each(data.list, function( index, row ) {
			// 	//let isChecked = row.id == ulId ? "checked='checked'" : "";
			// 	html +="<tr>";
			// 	html +=" <td>"+row.levelName+"</td>";
			// 	html +=" <td><button id='btnCurrentLelvelId"+row.id+"' class='btn btn-sm btn-primary' type='button'><label style='margin-bottom: 0px;'><input type='radio' id='isEnabled"+row.id+"' name='isEnabled' value='"+row.id+"' data-cid='"+row.contestID+"' data-uclid='"+uclId+"' onclick='update_current_level(this);' class='current-level' "+isChecked+" > <span id='loadingTxt"+row.id+"'>Current Level</span><label></button></td>";	
			 	//html +="</div>";
			// });
		} else {
			html +="<tr>";
			html +=" <td colspan='3' align='center'>No Level Assing Now!</td>";
			html +="</tr>";
		}
		// $('#tBodyLevelListingId').html(html);
		$('#songReport').html(html);
	})
	.catch(function (err) {
		console.log("Something went wrong!", err);
	});
	
}
	

function update_current_level(objThis){
//$('.current-level').on('click', function() {
	var obj = $(objThis);
	var uclId = obj.attr('data-uclid');
	var cId = obj.attr('data-cid');
	var lId = obj.val();
	
	var ele_txt = $('#loadingTxt'+lId).text();
	$('#loadingTxt'+lId).text('Processing....');
	var post_url = '<?php echo base_url();?>admin/user_contests/change_user_current_level/'+uclId+'/'+cId+'/'+lId;
	
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
		$('#loadingTxt'+lId).text(ele_txt);
		
		setTimeout(function(){
			$('#resp_msg').html('');
			reloadDataTable();
		},1000);
		
	})
	.catch(function (err) {
		console.log("Something went wrong!", err);
	});
//});
}

$( document ).ready(function() {
    loadDataTable();
});

function reloadDataTable() {
 if ($.fn.DataTable.isDataTable('#tableUserContests')) {
        $('#tableUserContests').dataTable().fnClearTable();
        $('#tableUserContests').dataTable().fnDestroy();
 }
 loadDataTable();
}

function loadDataTable(){ 
        dataTbl = jQuery('#tableUserContests').dataTable({
                "pageLength": 6,
                "iDisplayLength": 6,
                "bProcessing" : true,
                "bServerSide" : true,
                "sAjaxSource" : "<?php echo base_url(); ?>admin/userranking/get_user_contest_grid",
                "fnDrawCallback": function( oSettings ) {
                     //your script;
                },
                "aoColumns" : [
                        {"sWidth" : "5%","bSortable"  : true },
                        {"sWidth" : "20%","bSortable" : true },
                        {"sWidth" : "25%","bSortable" : true },
                        {"sWidth" : "20%","bSortable" : true },
                        {"sWidth" : "20%","bSortable" : true },
                        {"sWidth" : "10%","bSortable" : true }
                ],
                dom: 'Bfrtip',
                ordering: false
        });
}

</script>