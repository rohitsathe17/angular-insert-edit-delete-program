<!DOCTYPE html>
<html lang="en-US">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>


<body>

<div ng-app="myapp" ng-controller="DbController" style="width:900px; margin:0 auto; margin-top:4%; border:1px solid gray; border-radius:5px; padding:50px;">
	<form name="userList" id="userForm" ng-submit="insertUserInfo(userInfo);" >
		<div style="width:70%; margin:0 auto;">
			<div class="hc-border-bottom hc-mb3 hc-mt1 hc-py2">
				<h1 class="hc-p0 hc-m0">Add New User</h1>
			</div>
			<div class="hc-clearfix hc-mb2">
				<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
					<label class="hc-form-label">First Name</label>
				</div>
				<div class="hc-sm-col hc-sm-col-8">
					<div class="hc-block">
						<input class="form-control" type="text" name="first_name" ng-model="userInfo.first_name" class="hc-field" size="32" required/>
					</div>
				</div>
			</div>
			<div class="hc-clearfix hc-mb2">
				<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
					<label class="hc-form-label">Last Name</label>
				</div>
				<div class="hc-sm-col hc-sm-col-8">
					<div class="hc-block">
						<input class="form-control" type="text" name="last_name" ng-model="userInfo.last_name" class="hc-field" size="32" required/>
					</div>
				</div>
			</div>
			<div class="hc-clearfix hc-mb2">
				<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
					<label class="hc-form-label">Email</label>
				</div>
				<div class="hc-sm-col hc-sm-col-8">
					<div class="hc-block">
						<input class="form-control" class="form-control" type="email" name="email" ng-model="userInfo.email" class="hc-field" size="32" required/>
					</div>
				</div>
			</div>
			<div class="hc-clearfix hc-mb2">
				<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
					<label class="hc-form-label">User Level</label>
				</div>
				<div class="hc-sm-col hc-sm-col-8">
					<div class="hc-block">
						<select class="form-control" ng-model="userInfo.userlevel" name="userlevel" class="hc-field" required>
							<option value="">Please Select</option>
							<option value="Staff">Staff</option>
							<option value="Manager">Manager</option>
							<option value="Admin">Admin</option>
						</select>
					</div>
				</div>
			</div>
			<div class="hc-clearfix hc-mb2">
				<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
					<label class="hc-form-label">Password</label>
				</div>
				<div class="hc-sm-col hc-sm-col-8">
					<div class="hc-block">
						<input class="form-control" type="password" name="userpassword" ng-model="userInfo.userpassword" class="hc-field" size="32" required/>
					</div>
				</div>
			</div>
			<div class="hc-sm-col hc-sm-col-8">
			<div class="hc-block">
			<br/>
				<input class="form-control btn btn-success" type="submit" title="Add New User" value="Add New User" />					
			</div>
			<br>
			<table class="table table-bordered" style="border:1px solid gray;">
				<tr style="background-color:blue; color:white;">
				    <th>Sr. No.</th>
					<th>Name</th>
					<th>Lavel</th>
					<th>Email</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
				<tr ng-repeat="user in users" style="border:1px solid gray;">
				    <td>({{$index + 1}})</td>
					<td>{{user.first_name}} {{user.last_name}}</td>
					<td class="hc-mb1">{{user.userlevel}}</td>
					<td class="hc-mb1">{{user.email}}</td>
					<td style="text-align:center;">
						<a href="#" ng-click="editUserInfo(user)" title="edit" class="hcj-confirm hc-close">
							<i class="icomoon icomoon-cross hc-maroon"><span class="glyphicon glyphicon-edit"></span></i>
						</a>
					</td>
					<td style="text-align:center;">
						<a href="#" ng-click="deleteUserInfo(user)" title="Delete" class="hcj-confirm hc-close">
							<i class="icomoon icomoon-cross hc-maroon" ><span class="glyphicon glyphicon-trash"></span></i>
						</a>
					</td>
				</tr>
			</table>
		
		</div>	
	</div>
</form>

		
	

	
	<div style="width:70%; margin:0 auto;">
	<form id="editUserForm" ng-submit="UpdateUserInfo(currentUser)" hidden>
	<div class="hc-border-bottom hc-mb3 hc-mt1 hc-py2">
		<h1 class="hc-p0 hc-m0">Edit - Update User Details</h1>
	</div>
 
	<div style="display:none">
		<input type="hidden" name="hc_csrf_token" id="nts_form_hc_csrf_token" value="a1073ecba21451a81324f2376fe3116e"/>
	</div>
	<div class="hc-clearfix hc-mb2">
		<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
			<label class="hc-form-label">First Name</label>
		</div>
		<div class="hc-sm-col hc-sm-col-8">
			<div class="hc-block">
				<input class="form-control" type="text" ng-model="currentUser.first_name" value="{{currentUser.first_name}}" class="hc-field" size="32" required/>
			</div>
		</div>
	</div>
	<div class="hc-clearfix hc-mb2">
		<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
			<label class="hc-form-label">Last Name</label>
		</div>
		<div class="hc-sm-col hc-sm-col-8">
			<div class="hc-block">
				<input class="form-control" type="text" ng-model="currentUser.last_name" value="{{currentUser.last_name}}" class="hc-field" size="32" required/>
			</div>
		</div>
	</div>
	
	<div class="hc-clearfix hc-mb2">
		<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
			<label class="hc-form-label">Email</label>
		</div>
		<div class="hc-sm-col hc-sm-col-8">
			<div class="hc-block">
				<input class="form-control" type="text" ng-model="currentUser.email" value="{{currentUser.email}}" class="hc-field" size="32" required/>
			</div>
		</div>
	</div>
	<div class="hc-clearfix hc-mb2">
		<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
			<label class="hc-form-label">User Level</label>
		</div>
		<div class="hc-sm-col hc-sm-col-8">
			<div class="hc-block">
				<select class="form-control" ng-model="currentUser.userlevel" value="{{currentUser.userlevel}}" class="hc-field" required>
					<option value="{{currentUser.userlevel}}">{{currentUser.userlevel}}</option>
					<option value="Staff">Staff</option>
					<option value="Manager">Manager</option>
					<option value="Admin">Admin</option>
				</select>
			</div>
		</div>
	</div>
	<div class="hc-clearfix hc-mb2">
		<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3">
			<label class="hc-form-label">Password</label>
		</div>
		<div class="hc-sm-col hc-sm-col-8">
			<div class="hc-block">
				<input  class="form-control" type="text" ng-model="currentUser.userpassword" value="{{currentUser.userpassword}}" class="hc-field" size="32" required/>
			</div>
		</div>
	</div>
	
	<div class="hc-clearfix hc-mb2">
		<div class="hc-sm-col hc-sm-col-2 hc-align-sm-right hc-mr3"></div>
		<div class="hc-sm-col hc-sm-col-8">
			<div class="hc-block">
			</br>
			<input  class="form-control btn btn-success"  type="submit" title="Update Shift Template" ng-click="updateMsg(currentUser.user_id)"  value="Update Shift Template Data" />
			</br>
			</div>
		</div>
	</div>
</form>
</div>
	


<script>
		var myapp = angular.module('myapp',['ngRoute']);
		
		myapp.controller("DbController",['$scope','$http', function($scope,$http){
			// insertuser data data to db
			
			$scope.insertUserInfo = function(info){
				var param = {"first_name":info.first_name,"last_name":info.last_name,"email":info.email,"userlevel":info.userlevel,"userpassword":info.userpassword};						
				
				$http.post('my_file/user/add_user.php',param).then(
					function(response)
					{
						$scope.errorMessage = response.data; 
						$scope.getUsers();
						$('#userForm').hide();
					},
					function(error)
					{				
						alert("successfully insert");
						$('#userForm').hide();
					}				
			
				);
			}

			$scope.getUsers = function(){
				$http.post('my_file/user/user_details.php').then(
								function(response)
								{
									$scope.users  = response.data; 
									$('#userForm').show();
								},
								function(error)
								{				
									alert("successfully insert");
								}
							);
			}			
							
			$scope.currentUserDetails = {};
			
			$scope.editUserInfo = function(info){
				$scope.currentUser = info;
				$('#userForm').slideUp();
				$('#editUserForm').slideToggle();
			}
			
			$scope.UpdateUserInfo = function(info){
				$http.post('my_file/user/update_user.php',{"user_id":info.user_id,"first_name":info.first_name,"last_name":info.last_name,"email":info.email,"userlevel":info.userlevel,"userpassword":info.userpassword}).success(function(data)
				{
					$scope.show_form = true;
					if (data == true) 
					{
						getInfo();
						alert("successfully Updated");
						$('#editUserForm').hide();
						


					}
				});
			}
			
			$scope.updateMsg = function(user_id){
				$('#editUserForm').css('display', 'none');
				$('#userForm').show();
			}
			
			// delete  shift template data
			$scope.deleteUserInfo = function(info){
				$http.post('my_file/user/delete_user.php',{"user_id":info.user_id}).then(
					function(response)
					{						
					   $scope.responseData = response.data;
					   $scope.getUsers();
					},
					function(error)
					{						
						$scope.errorMessage = error.data;
						$scope.getUsers();
					}
				);
			}
			
			$scope.getUsers();
			
			}]);
</script>

</body>
</html>