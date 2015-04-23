<div id = "cat-content">
	<div class="col-md-6">
		<h3>Thêm Thư Mục</h3>
		<form class="form-horizontal" role="form" id="cat-new-form" method="POST" action="{{ url('category/new') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="col-md-4 control-label">Tên Thư Mục</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="name" id="name" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">Tạo Thư Mục</button>
				</div>
			</div>	
		</form>
		<img class="addCat loading" src="images\loader.gif">
		<p class="new-result"></p>
	</div>
	<div class="col-md-6">
		<h3>Chỉnh Sửa Thư Mục</h3>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tên</th>
				<th>Sửa</th>
				<th>Xóa</th>	
			</thead>
			<tbody>
				@foreach(App\Category::all() as $cat)
					<tr class ="{{$cat->id}} onerow">
						<td> {{ $cat->id }}</td>
						<td contenteditable="true" class="{{$cat->id}} cat-name">{{$cat->name}}</td>
						<td><button class="btn edit-link" id="{{$cat->id}}">Chỉnh Sửa</button>
							<img class="{{$cat->id}} loading" src="images\loader.gif">
							<p class="{{$cat->id}} edit-result"></p>
						</td>
						<td><button class="btn delete-link" id="{{$cat->id}}">Xóa</button></td>
					</tr>
				@endforeach				
			</tbody>
		</table>
	</div>
</div> 
