<div id = "pro-content">
	<div>
		<div class="col-md-12">
			<h3>Upload File Ảnh</h3>
			{!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true,'class' => 'form-horizontal')) !!}
			<div class="form-group">
				<label class="col-md-4 control-label">Chọn File để Upload</label>
				<div class="col-md-6">
				{!! Form::file('image') !!}
				</div>
			</div>
			<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						{!! Form::submit('Upload', array('class'=>'btn btn-primary')) !!}
					</div>
			</div>	
			{!! Form::close() !!}
		</div>
	</div>
	<div id="addProduct">
		<div class="col-md-12">
			<h3>Thêm Sản Phẩm</h3>
			<form class="form-horizontal" role="form" id="product-new-form" method="POST" action="{{ url('product/new') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-md-4 control-label">Tên Sản Phẩm</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" id="name" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">URL Hình Ảnh</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="url" id="url" required>
						<button id="gallery-btn" class="btn btn-primary">Lấy Ảnh Từ Thư Viện</button>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Mô Tả</label>
					<div class="col-md-6">
						<textarea rows="4" cols="50" class="form-control" name="description" id="description" required>
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Giá Sản Phẩm (VND)</label>
					<div class="col-md-6">
						<input  type="number" step="any" class="form-control" name="price" id="price" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Thư Mục</label>
					<div class="col-md-6">
						<div class="controls span2">
							@foreach(App\Category::all() as $cat)
								<label class="checkbox">
									<input type="checkbox" class="form-control" name="category_list[]" value="{{$cat->id}}"> {{$cat->name}} 
								</label>
								<br>	
							@endforeach
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">Tạo Sản Phẩm</button>
					</div>
				</div>	
			</form>
			<p class="new-result"></p>
			@include('admin.gallery')
		</div>
	</div>
	<div id="editProduct">
		<div class="col-md-12">
			<h3>Chỉnh Sửa Sản Phẩm</h3>
			<table class="table">
			<thead>
				<th>Tên</th>
				<th>Ảnh</th>
				<th>Mô Tả</th>
				<th>Giá</th>
				<th>Thư Mục</th>
				<th>Sửa</th>
				<th>Xóa</th>	
			</thead>
			<tbody>
				@foreach(App\Product::all() as $pro)
					<tr class ="{{$pro->id}} onerow">
						<td contenteditable="true" class="{{$pro->id}} pro-name">{{$pro->name}}</td>
						<td><img id="{{$pro->id}}" class="{{$pro->id}} pro-url" src="{{ $pro->url }}" width="100" height="100"></td>
						<td contenteditable="true" class="{{$pro->id}} pro-desc">{{$pro->description}}</td>
						<td>
							<input type="number" step="any" class="{{$pro->id}} pro-price" value="{{$pro->price}}">
						</td>
						<td contenteditable="true" class="{{$pro->id}} pro-cat">{{$pro->category_id}}</td>
						<td><button class="btn edit-link" id="{{$pro->id}}">Chỉnh Sửa</button>
							<p class="{{$pro->id}} edit-result"></p>
						</td>
						<td><button class="btn delete-link" id="{{$pro->id}}">Xóa</button></td>
					</tr>
				@endforeach				
			</tbody>
		</table>
		@include('admin.gallery')
		</div>
	</div>
</div> 
