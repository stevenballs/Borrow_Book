<?php $this->load->view('partials/Header'); ?>

<?php $this->load->view('partials/MenuBar'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-orange">
					<div class="panel-heading">
						<h4>หน้าเพิ่มข้อมูลลูกค้า</h4>
					</div>
					<form name="customer_form" ng-submit="submitCustomer()" class="form-horizontal">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
						            <div class="form-group">
						                <label class="col-sm-3 control-label">ชื่อลูกค้า :</label>
						                <div class="col-sm-6">
						                   <input type="text" ng-model="dataCustomer.txtFirstName" class="form-control" name="txtFirstName" id="txtFirstName" placeholder="ชื่อลูกค้า">
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">นามสกุลลูกค้า :</label>
						                <div class="col-sm-6">
						                <input type="text" ng-model="dataCustomer.txtLastName" class="form-control" name="txtLastName" id="txtLastName" placeholder="นามสกุลลูกค้า">
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">ประเภทที่อยู่ :</label>
						                <div class="col-sm-6">
											<label class="radio-inline" ng-repeat="type in addressType">
												<input type="radio" ng-model="dataCustomer.optAddressType" name="optAddressType" id="optAddressType" value="{{type.id}}">
												{{type.name}}
											</label>
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">ที่อยู่1 :</label>
						                <div class="col-sm-6">
						                   <input type="text" ng-model="dataCustomer.txtAddress1" class="form-control" name="txtAddress1" id="txtAddress1" placeholder="ที่อยู่2">
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">ที่อยู่2 :</label>
						                <div class="col-sm-6">
						                    <input type="text" ng-model="dataCustomer.txtAddress2" class="form-control" name="txtAddress2" id="txtAddress2" placeholder="ที่อยู่2">
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">เมือง :</label>
						                <div class="col-sm-6">
						                    <input type="text" ng-model="dataCustomer.txtCity" class="form-control" name="txtCity" id="txtCity" placeholder="เมือง">
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">ประเทศ :</label>
						                <div class="col-sm-6">
						                    <input type="text" ng-model="dataCustomer.txtCountry" class="form-control" name="txtCountry" id="txtCountry" placeholder="ประเทศ">
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">รหัสไปรณีย์ :</label>
						                <div class="col-sm-6">
						                    <input type="text" size="5" ng-model="dataCustomer.txtZipcode" class="form-control" name="txtZipcode" id="txtZipcode" placeholder="รหัสไปรณีย์">
						                </div>
						            </div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
					      	<div class="row">
					      		<div class="col-sm-6 col-sm-offset-3">
					      			<div class="btn-toolbar">
						      			<button class="btn-primary btn" type="submit" id="btnSubmit">เพิ่ม</button>
						      			<button class="btn-default btn" type="button" id="btnClear">ยกเลิก</button>
					      			</div>
					      		</div>
					      	</div>
				      	</div>
			      	</form>
				</div>
			</div>
		</div>
	</div> <!-- container -->
<?php $this->load->view('partials/Footer'); ?>