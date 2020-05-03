					<h3 class="page-title">New Staff</h3>

					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<?php echo form_open('administration/staffadd');?>
									
									<div class="form-group">
										<label for="studentid">VATSIM ID</label>
										<input type="text" class="form-control" id="cid" placeholder="VATSIM ID" required>
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
									
									<div class="form-group">
										<a role="button" href="<?php echo base_url();?>administration/staff" class="btn btn-default" style="width:50%;">Cancel</a>
										<button type="submit" class="btn btn-success" style="width:49%;">Add</button>
									</div>	
									
									</form>								
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					</div>