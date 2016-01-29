<?php $this->load->view('partials/Header'); ?>

<?php $this->load->view('partials/MenuBar'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-orange">
					<div class="panel-heading">
						<h4>หน้ายืมหนังสือ</h4>
					</div>
					<form name="borrow_form" ng-submit="submitBorrowBook()" class="form-horizontal">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
						            <div class="form-group">
						                <label class="col-sm-3 control-label">เลือกชื่อลูกค้า :</label>
						                <div class="col-sm-6">
										 <select name="repeatSelect" id="slCusName" ng-model="dataCustomerList.id" class="form-control" ng-change="showBorrowByCustomer()">
										 	  <option value="">---Please select---</option>
										      <option ng-repeat="option in dataCustomerList" value="{{option.id}}">{{option.fullname}}</option>
										 </select>
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">ชื่อหนังสือ :</label>
						                <div class="col-sm-6">
						                     <select name="repeatSelect" id="slBookName" ng-model="dataBookList.id" class="form-control">
										 	  <option value="">---Please select---</option>
										      <option ng-repeat="option in dataBookList" value="{{option.id}}">{{option.title}}</option>
										 </select>
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">วันที่จองหนังสือ :</label>
						                <div class="col-sm-6">
						                    <input type="date" ng-model="dataBorrow.txtCheckOutDate" class="form-control" name="txtCheckOutDate" id="txtCheckOutDate" placeholder="ประเทศ">
						                </div>
						            </div>
						            <div class="form-group">
						                <label class="col-sm-3 control-label">วันที่คืนหนังสือ :</label>
						                <div class="col-sm-6">
						                    <input type="date" ng-model="dataBorrow.txtReturnDate" class="form-control" name="txtReturnDate" id="txtReturnDate" placeholder="ประเทศ">
						                </div>
						            </div>
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-md-12">
						            <div class="form-group">
										<div class="col-sm-6 col-sm-offset-3">
					      					<div class="btn-toolbar">
						      					<button class="btn-primary btn" type="submit" id="btnSubmit" ng-disabled="disabledBtnBorrow" ng-click="insertBorrowBook()">จองหนังสือ</button>
					      					</div>
					      				</div>
					      			</div>
					      		</div>
					     </div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
						            <div class="form-group">
							            <table ng-table="tableParams" class="table table-striped">
							             	<tr >
							                    <th>ชื่อหนังสือ</th>
						    					<th >วันที่เริ่มจอง</th>
						    					<th >วันที่คืนหนังสือ</th>
						    					<th >วันที่ทำรายการ</th>
							                </tr>
							                <tr ng-repeat="item in itemBorrow">
							                    <td data-title="'title'" data-header-class="text-left" class="text-left" data-sortable="'title'">
							                        {{item.title}}
							                    </td>
							                    <td data-title="'check_out_date'" data-header-class="text-left" class="text-left" data-sortable="'check_out_date'">
							                        {{item.check_out_date  | date:'dd/MM/yyyy'}}
							                    </td>
							                    <td data-title="'return_date'" data-header-class="text-left" class="text-left">
							                        {{item.return_date | date:'dd/MM/yyyy'}}
							                    </td>
							                     <td data-title="'due_date'" data-header-class="text-left" class="text-left">
							                        {{item.due_date | date:'dd/MM/yyyy'}}
							                    </td>
							                </tr>
							            </table>
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