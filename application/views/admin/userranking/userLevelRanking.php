<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4><?php echo $report[0]->contestName; ?> Level <?php echo $report[0]->levelName; ?></h4>
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>User Name</th>
													<th>Email</th>
                                                    <th class="w-5">Ranking</th>
													<th class="w-5">Total</th>													
													<th>Sur</th>													
													<th>Taal</th>													
													<th>Emotion Feel</th>													
													<th>Voice Quality Nasal</th>													
													<th>Soothing Level</th>													
													<th>Copy Or Originality</th>													
													<th>Variation</th>													
													<th>Diction</th>													
													<th>Murki Vibratos</th>													
													<th>Alaap</th>													
													<th>Sargam</th>													
													<th>Judge Score</th>													
													
												</tr>
											</thead>
											<tbody>
                                                <?php 
                                                $i =1;
                                                   //echo "<pre>"; print_r($report);
                                                if($report):
													foreach($report as $row):                                                    
                                                ?>
												<tr>
													<td><?php echo $row->fullName;?></td>
													<td><?php echo $row->email;?></td>
                                                    <td>
                                                    Rank
                                                    <?php echo $i; ?>
                                                    </td>
                                                    <td>                                                  
                                                    <?php echo $row->total_Score;?>
                                                    </td>
													<td><?php echo $row->averageSur;?></td>
													<td><?php echo $row->averageTaal;?></td>
													<td><?php echo $row->averageEmotion_Feel;?></td>
													<td><?php echo $row->averageVoice_Quality_Nasal;?></td>
													<td><?php echo $row->averageSoothing_Level;?></td>
													<td><?php echo $row->averageCopy_Or_Originality;?></td>
													<td><?php echo $row->averageVariation;?></td>
													<td><?php echo $row->averageDiction;?></td>
													<td><?php echo $row->averageMurki_Vibratos;?></td>
													<td><?php echo $row->averageAlaap;?></td>
													<td><?php echo $row->averageSargam;?></td>
													<td><?php echo $row->averageJudge_Score;?></td>
													
												</tr>
												<?php $i++;endforeach;
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


<script>
// jQuery(document).ready(function($) {
//     $('*[data-href]').on('click', function() {
//         window.location = $(this).data("href");
//     });
// });
</script>



