@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Welcome to Email-Marketing Management</div>
 
				<div class="panel-body">
					<p>Are you looking for easy and user-friendly tool to manage your
					bulletins, newsletter, masive customer notifications...?</p>
					<p>You are lucky.  EMM is all you need. Do you want to know how EMM
						could help you? <a href="#pending">Let's go to take a quickly
						tour</a></p>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Quick access:</div>

				<div class="panel-body">
					<p><a class="btn btn-success" href="{{ route('campaigns.list') }}">Manage Campaigns</a></p>
					<p><a class="btn btn-success" href="{{ route('recipients.select_campaign') }}">Manage Recipients</a></p>
					<p><a class="btn btn-success" href="{{ route('bulletins.list') }}">Manage Bulletins</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection