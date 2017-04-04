@if(count($errors)>0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>
			{!! $error !!}
		</li>
		@endforeach
	</ul>
</div>
@endif
@if (session('error'))
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Thông báo!</strong> {{ session('error') }}
</div>
@endif