<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
                        <h4>
                        <?php 
                        if(isset($report[0]->contestName)){
                            echo $report[0]->contestName;
                        }                   
                         
                         if(isset($report[0]->levelName)){
                            echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;".$report[0]->levelName;
                        }
                       
                        ?>
                        </h4>
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
                                                    <th class="w-5">Ranking</th>
                                                    <th class="w-5">Support</th>
													<th class="w-5">Total</th>													
													
												</tr>
											</thead>
											<tbody>
                                                <?php 
                                                $i =1;
                                                   //echo "<pre>"; print_r($report);
                                                if(isset($report)){
													foreach($report as $row):                                                    
                                                ?>
												<tr>
													<td><?php echo $row->fullName;?></td>
													<td><?php echo $row->email;?></td>
                                                    
                                                    <td><?php 
                                                    if(isset($row->averageSur)){
                                                        echo $row->averageSur;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?></td>
													<td><?php 
                                                    if(isset($row->averageTaal)){
                                                        echo $row->averageTaal;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
                                                    <td><?php 
                                                    if(isset($row->averageEmotion_Feel)){
                                                        echo $row->averageEmotion_Feel;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>                                                   
                                                    </td>
													<td><?php 
                                                    if(isset($row->averageVoice_Quality_Nasal)){
                                                        echo $row->averageVoice_Quality_Nasal;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?> 
                                                    </td>
													<td><?php 
                                                    if(isset($row->averageSoothing_Level)){
                                                        echo $row->averageSoothing_Level;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?></td>
													<td><?php 
                                                    if(isset($row->averageCopy_Or_Originality)){
                                                        echo $row->averageCopy_Or_Originality;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
													<td><?php 
                                                    if(isset($row->averageVariation)){
                                                        echo $row->averageVariation;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
													<td><?php 
                                                    if(isset($row->averageDiction)){
                                                        echo $row->averageDiction;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?></td>
													<td><?php 
                                                    if(isset($row->averageMurki_Vibratos)){
                                                        echo $row->averageMurki_Vibratos;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
													<td><?php 
                                                    if(isset($row->averageAlaap)){
                                                        echo $row->averageAlaap;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
													<td><?php 
                                                    if(isset($row->averageSargam)){
                                                        echo $row->averageSargam;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
													<td><?php 
                                                    if(isset($row->averageJudge_Score)){
                                                        echo $row->averageJudge_Score;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    Rank
                                                    <?php 
                                                    if(isset($row->total_Score)){
                                                        echo $i;
                                                    }else{
                                                        echo "NA";
                                                    } 
                                                    ?>                                                    
                                                    </td>

                                                    <td>                                                
                                                    <?php 
                                                    if(isset($row->totalSupport)){
                                                        echo $row->totalSupport;
                                                    }else{
                                                        echo "NA";
                                                    } 
                                                    ?>                                                    
                                                    </td>

                                                    <td>                                                  
                                                    <?php 
                                                    if(isset($row->total_Score)){
                                                        echo $row->total_Score;
                                                    }else{
                                                        echo "NA";
                                                    }
                                                    ?>
                                                    </td>
													
												</tr>
												<?php $i++;endforeach;
												}else{?>
                                                <td colspan='16' align='center'>No Level found!</td>
												<?php }?>
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



