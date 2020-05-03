					<h3 class="page-title">Staff <button type="button" class="pull-right btn btn-warning" data-toggle="modal" data-target="#newstaff">New +</button></h3>
					
					<div class="alert alert-info" role="alert">Staff will not show correctly here until they have signed in at least once.</div>
					
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Rating</th>
												<th>CID</th>
												<th>Last Login</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$allStaff = $this->Database->adminGetStaff();
											
											foreach($allStaff as $staff)
											{
											?>
											<tr>
												<td><?php if($staff['fname'] != ''){echo $staff['fname'];}else{echo '-';}?></td>
												<td><?php if($staff['lname'] != ''){echo $staff['lname'];}else{echo '-';}?></td>
												<td><?php echo $staff['rating'];?></td>
												<td><?php echo $staff['id'];?></td>
												<td><?php if($staff['lastLogin'] != '0'){echo date("H:i:sT d/m/Y",$staff['lastLogin']);}else{echo '<span class="label label-danger">Never</span>';}?></td>
												<td>
													<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#areyousure<?php echo $staff['id'];?>">Remove</button>
													<!-- Modal -->
													<div class="modal fade" id="areyousure<?php echo $staff['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													        <h4 class="modal-title" id="myModalLabel">Caution!</h4>
													      </div>
													      <div class="modal-body">
													        Are you sure you want to delete <?php echo $staff['fname'];?>?
													      </div>
													      <div class="modal-footer">
													        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													        <a role="button" href="<?php echo base_url();?>administration/deletestaff/<?php echo $staff['id'];?>" class="btn btn-primary">Yes</a>
													      </div>
													    </div>
													  </div>
													</div>
												</td>
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
					<div class="modal fade" id="newstaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
					    	<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Add a new unit!</h4>
					      		</div>
						  		<div class="modal-body">
							        <?php echo form_open('administration/staffadd');?>
									
									<div class="form-group">
										<label for="studentid">VATSIM ID</label>
										<input type="text" class="form-control" name="cid" placeholder="VATSIM ID" required>
									</div>
									
									<div class="form-group">
										<label for="finish">Administrator</label><br />
										<div class="radio-inline">
											<input type="radio" name="administrator" value="1">
											Yes
										</div>
										<div class="radio-inline">
											<input type="radio" name="administrator" value="0" checked>
											No
										</div>
									</div>

							  	<div class="modal-footer">
						        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-success">Add Staff</button>
						      	</div>
							  	</form>
					    	</div>
					  	</div>
					</div>