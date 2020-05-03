					<h3 class="page-title">Competencies <button type="button" class="pull-right btn btn-warning" data-toggle="modal" data-target="#newunit">New +</button></h3>
									
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
												<th style="width:20%;">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$allComps = $this->Database->adminGetCompetencies();
											
											if (count($allComps) > 0){
												foreach($allComps as $comp)
												{
												?>
												<tr>
													<td><?php echo $comp['code'];?></td>
													<td><?php echo $comp['name'];?></td>
													<td><?php echo $comp['criteria'];?></td>
													<td><a href="<?php echo base_url();?>administration/editcompetency/<?php echo $comp['id'];?>" class="btn btn-info">Edit</a>&nbsp;<a <?php if ($this->Database->adminCompHasUnits($comp['id'])){ echo 'class="btn btn-danger"  disabled data-toggle="tooltip" title="This competency is attached to a unit. It cannot be deleted." href="#"';}else{echo 'href="' . base_url() . 'administration/deletecompetency/' . $comp['id'] . '" class="btn btn-danger confirm"';}?>>Delete</a></td>
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
									<h4 class="modal-title" id="myModalLabel">Add a new competency!</h4>
					      		</div>
						  		<div class="modal-body">
							        <?php echo form_open('administration/competencycreate');?>		
									
									<div class="form-group">
										<label for="code">Unit Code</label>
										<input type="text" class="form-control" name="code" id="code" placeholder="TWR1" required>
									</div>
									
									<div class="form-group">
										<label for="name">Element</label>
										<textarea type="text" class="form-control" name="name" id="name" placeholder="Setup and Configure..." rows="3" required></textarea>
									</div>
									
									<div class="form-group">
										<label for="criteria">Criteria</label>
										<textarea type="text" class="form-control" name="criteria" id="criteria" placeholder="Uses a correct callsign..." rows="6" required></textarea>
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