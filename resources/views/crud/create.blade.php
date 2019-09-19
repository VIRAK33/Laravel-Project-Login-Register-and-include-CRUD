@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Polytechnic of Semarang</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{route('crud.store')}}" method="post">
					{{csrf_field()}}
						<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
							<input type="text" name="nama" class="form-control" placeholder="Lectuer Name">
							{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<input type="text" name="username" class="form-control" placeholder="Username">
							{!! $errors->first('username', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group">
                                <select class="form-control" name="xxx">
                                    <option>Status Access</option>
                                    <option>DSN</option>
                                    <option>DSX</option>
                                    <option>ADM</option>
                                    <option>ADX</option>
                                    <option>SA</option>
                                    <option>2014</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                </select>
                            </div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<input type="text" name="password" class="form-control" placeholder="Password">
							{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Save">
							<a href="{{ url('/crud') }}" class="btn btn-warning">Come Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</script>
@endsection