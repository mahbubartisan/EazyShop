@php
$user_id = auth()->user()->id;
$user = App\Models\User::findOrFail($user_id);
@endphp

<div class="col-md-2"> <br>

	<img class="card-img-top" style="border-radius: 50%" src="{{ !empty($user->profile_photo_path)
		    ? url('upload/users/' . $user->profile_photo_path)
		    : url('upload/no-image.jpg') }}" height="100%" width="100%">

	<span><b class="text-primary">{{ auth()->user()->name }}</b></span>

	<ul class="list-group list-group-flush"> <br>

		<a href="{{ route('dashboard') }}" class="btn btn-sm btn-block btn-primary">Home</a>
		<a href="{{ route('user.order') }}" class="btn btn-sm btn-block btn-primary">Order</a>
		<a href="{{ route('change.password') }}" class="btn btn-sm btn-block btn-primary">Change Password</a>
		<a href="{{ route('user.logout') }}" class="btn btn-sm btn-block btn-danger">Logout</a>
	</ul>
</div>