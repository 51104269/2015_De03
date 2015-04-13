<div id = "acc-content">
	<div class="col-md-6">
		<h3>Thêm Tài Khoản</h3>
		<form class="form-horizontal" role="form" id="account-new-form" method="POST" action="{{ url('account/new') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="col-md-4 control-label">E-Mail</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Mật Khẩu</label>
				<div class="col-md-6">
					<input type="password" id ="password" class="form-control" name="password" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label">Nhập lại Mật Khẩu</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="re-password" id="re-password" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 control-label">Loại Tài Khoản</label>
				<div class="col-md-6">
					<select name="account-type" class="form-control">
						  <option value="user">Khách Hàng</option>
						  <option value="admin">Quản Trị Viên</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">Tạo Tài Khoản</button>
				</div>
			</div>
			
		</form>
		<p class="new-result"></p>
	</div>
	<div class="col-md-6">
		<h3>Chỉnh sửa Tài Khoản</h3>
		
		<table class="table">
			<thead>
				<th>Email</th>
				<th>Loại tài khoản</th>
				<th>Sửa</th>
				<th>Xóa</th>	
			</thead>
			<tbody>
				<?php $i = 0 ;?>
				@foreach(Account::all() as $acc)
					<tr class ="{{$i}} onerow">
						<td> {{ $acc->email }}</td>
						<td>
							<select class="form-control {{$i}} group">
								@if ($acc->group == 'user')
									<option value="user">Khách Hàng</option>
									<option value="admin">Quản Trị Viên</option>
								@else
									<option value="admin">Quản Trị Viên</option>
									<option value="user">Khách Hàng</option>
								@endif
							</select>
						</td>
						<td><button class="btn edit-link" id="{{$acc->email}}" num="{{$i}}">Chỉnh Sửa</button>
							<p class="{{$i}} edit-result"></p>
						</td>
						<td><button class="btn delete-link" id="{{$acc->email}}" num="{{$i}}">Xóa</button></td>
						
					</tr>
					<?php $i = $i +1 ;?>	
				@endforeach				
			</tbody>
		</table>	
	</div>
</div> 

	