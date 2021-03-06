@extends('admin.dashboard')
@section('admin_content')

@include('sweetalert::alert')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<ul class="breadcrumb">
<li>
		<i class="icon-home"></i>
		<a href="{{URL::to('/all-advertisement')}}">All advertisement</a>
		<i class="fa fa-angle-right"></i>
	</li>
	<li><a class="text-secondary" href="#">Edit</a></li>
</ul>
@if ($errors->any())
			<div class="alert alert-danger">
						<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
						</ul>
			</div>
@endif
	<div class="box span12">
		<div class="box-content">
		   
			<div class="col-md-8 offset-md-2">
				<form action="{{url('/update-advertisement',$result->advertisement_id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<h3>Advertisement title</h3>
						<input type="text" class="form-control" name="ad_title" value="{{$result->advertisement_title}}" required="">
					</div>
					
                    <div class="form-group">
						<h3>Advertisement description</h3>
						<textarea name="ad_description" class="form-control" cols="10" rows="5" required>
							{{$result->advertisement_description}}
						</textarea>
					</div>
					
					<div class="form-group">
						<h3>Advertisement image</h3>
						<input type="file" class="form-control form-control-bg" name="ad_image" required="">
						<span>[ Image should be 800x600 and size should be 2Mb or less ]</span>
						<br><br>
						<img src="{{asset($result->advertisement_image)}}" class="w-100 h-200" alt="">
					</div>

					<button type="submit" class="btn btn-info float-right">
						update advertisement
					</button>
				</form>
			</div>
		</div>
	</div>
	<!--/span-->

</div>


@endsection