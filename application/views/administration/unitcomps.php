					<h3 class="page-title"><?php echo $unitInfo['name'];?> Competencies <button type="button" class="pull-right btn btn-warning" data-toggle="modal" data-target="#newunit">Add +</button></h3>
										
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Code</th>
												<th>Element</th>
												<th>Criteria</th>
												<th>Type</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php									
											if (count($compInfo) > 0){
												foreach($compInfo as $comp)
												{
												?>
												<tr>
													<td><?php echo $comp['code'];?></td>
													<td><?php echo $comp['name'];?></td>
													<td><?php echo $comp['criteria'];?></td>
													<td><?php echo $comp['type'];?></td>
													<td style="width:20%;"><a href="<?php echo base_url();?>administration/unitremovecomp/<?php echo $comp['con_id'];?>/<?php echo $unitInfo['id'];?>" class="btn btn-danger confirm">Remove</a></td>
												</tr>
											<?php
												}
											}
											else
											{
											?>
												<tr>
													<td colspan="5"><center><code>No Competencies!</code></center></td>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					</div>
					
					
					<!-- Modal -->
					<div class="modal fade" id="newunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
					    	<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Add a new competency item!</h4>
					      		</div>
						  		<div class="modal-body">
							        <?php echo form_open('administration/unitaddcomp/' . $unitInfo['id']);?>		
									<div class="form-group">
										<label for="studentid">Element Name</label>
										
										<select name="comp" class="form-control" required>
											<?php
											$comps = $this->Database->adminGetCompetencies();
											
											foreach ($comps as $comp)
											{
												echo '<option value="'.$comp['id'].'">'.$comp['code'].' - '.$comp['name'].'</option>';
											}
											?>											
										</select>
									</div>
									
									
									<div class="form-group">
										<label for="type">Type</label>
										
										<select name="type" class="form-control" required>
											<option value="G">Graded Competency</option>
											<option value="R">Required Competency</option>
										</select>
									</div>
																		
					      		</div>
							  	<div class="modal-footer">
						        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-success">Create</button>
						      	</div>
							  	</form>
					    	</div>
					  	</div>
					</div>