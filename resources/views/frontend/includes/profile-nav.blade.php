
<div class="panel panel-info" style="">
	<div class="panel-heading white-color">Profile</div>
	<div class="panel-body" style="">
		<div class="row" style="margin:0 2px;">
			<div class="panel panel-default">
				<div class="panel-heading">Personel details</div>
				<div class="panel-body" style="padding: 5px 20px">
					<div class="row">
						<div class="">
							<p>Name    : <strong>{{ $user->name }}</strong></p>
						</div>
					</div>

					<div class="row">
						<div class="">
							<p>Email : <strong>{{ $user->email }}</strong></p>
						</div>
					</div>

					<div class="row">
						<div class="">
							<p>Address : <strong>{{ $user->address }}</strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row" style="margin:0 2px;">
			<div class="panel panel-default">
				<div class="panel-heading">Next of kin details</div>
				<div class="panel-body">
					<div class="row" style="padding: 5px 20px">
						<div class="row">
							<div class="">
								<p>Name    : <strong>{{ $user->next_of_kin_name }}</strong></p>
							</div>
						</div>

						<div class="row">
							<div class="">
								<p>Relationship : <strong>{{ $user->next_of_kin_relationship }}</strong></p>
							</div>
						</div>

						<div class="row">
							<div class="">
								<p>Address : <strong>{{ $user->next_of_kin_address }}</strong></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<a class="btn btn-sm btn-block btn-info pull-right" href="{{ url('profile') }}">view profile</a>
	</div>
</div>