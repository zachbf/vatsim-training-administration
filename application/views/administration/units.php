					<h3 class="page-title">Units <button type="button" class="pull-right btn btn-warning" data-toggle="modal" data-target="#newunit">New +</button></h3>
					<div class="alert alert-info" role="alert">If you wish to delete a unit, please contact the IT department.</div>
										
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Unit Code</th>
												<th>Name</th>
												<th>Type</th>
												<th>Rating</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$allunits = $this->Database->adminGetUnits();
											
											if (count($allunits) > 0){
												foreach($allunits as $units)
												{
												?>
												<tr>
													<td><?php echo $units['code'];?></td>
													<td><?php echo $units['name'];?></td>
													<td><?php echo $this->Database->formatType($units['type']);?></td>
													<td><?php echo $units['rating'];?></td>
													<td><?php if ($units['active'] == '1'){ echo '<span class="label label-success">Y</span>';} else {echo '<span class="label label-danger">N</span>';}?></td>
													<td><a href="<?php echo base_url();?>administration/unitcompetencies/<?php echo $units['id'];?>" class="btn btn-success">Competencies</a>&nbsp;<a href="<?php echo base_url();?>administration/editunit/<?php echo $units['id'];?>" class="btn btn-info">Edit</a></td>
												</tr>
											<?php
												}
											}
											else
											{
											?>
												<tr>
													<td colspan="5"><center><code>No Units!</code></center></td>
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
									<h4 class="modal-title" id="myModalLabel">Add a new unit!</h4>
					      		</div>
						  		<div class="modal-body">
							        <?php echo form_open('administration/unitadd');?>		
									<div class="form-group">
										<label for="studentid">Unit Name</label>
										<input type="text" class="form-control" name="name" placeholder="Example: Tower Mentoring Lesson 1" required>
									</div>
									
									<div class="form-group">
										<label for="studentid">Unit Code</label>
										<input type="text" class="form-control" name="code" placeholder="Example: TWRMEN001" required>
									</div>
									
									<div class="form-group">
										<label for="studentid">Type</label>
										
										<select name="type" class="form-control" required>
											<option value="1">Mentoring</option>
											<option value="2">Assessment/Check</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="studentid">Rating</label>
										
										<select name="rating" class="form-control" required>
											<option value="S2">Tower Controller (S2)</option>
											<option value="S3">TMA Controller (S3)</option>
											<option value="C1">Enroute Controller (C1)</option>
											<option value="C3">Senior Controller (C3)</option>
											<option value="VC">Visiting Controller (VC)</option>
											<option value="PT">Procedural Tower (PT)</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="finish">Enabled?</label><br />
										<div class="radio-inline">
											<input type="radio" name="active" value="1">
											Yes
										</div>
										<div class="radio-inline">
											<input type="radio" name="active" value="0" checked>
											No
										</div>
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