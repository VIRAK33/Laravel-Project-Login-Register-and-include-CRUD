@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-user"></i> Lecturer Data</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="{{route('crud.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add</a>
                <a href="{{ url('/importExport') }}" class="btn btn-success"><i class="fa fa-upload"></i> Import Data</a>
                <a href="{{route('password.change')}}" class="btn btn-danger"><i class="glyphicon glyphicon-warning-sign"></i> Change Password</a>
            </div>
            <div class="col-md-2">
            </div>
            
            <!-- Form Pencarian -->
            <div class="col-md-4">
                {!! Form::open(['method'=>'GET','url'=>'namadosen','role'=>'search'])  !!}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
					        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
					     </span>
                     </span>
                 </div>
               {!! Form::close() !!}
            </div>
        </div><br>

        <!-- Flash Message -->
        @if(Session::has('msg'))
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i> {{ Session::get('msg') }}
            </div>
        @endif

        @if($cruds->count())
          <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                <thead align="center">
                       <tr>
                           <td><b>No</b></td>
                           <td><b>Lecturer Name</b></td>
                           <td><b>Username</b></td>
                           <td><b>Status Access</b></td>
                           <td colspan="2"><b>Menu</b></td>
                       </tr>
                   </thead>
                   <?php $no=1; ?>
                   @foreach($cruds as $crud)
                       <tr>
                           <td align="center"> {{$no++}} </td>
                           <td align="center"> {{ $crud->nama }} </td>
                           <td align="center"> {{ $crud->username }} </td>
                           <td align="center"> {{ $crud->xxx }} </td>
                           
                           <!-- Button Edit -->
                           <td align="center" width="60px">
                               <a href="{{route('crud.edit', $crud->id)}}" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                           </td>

                           <!-- Button Delete -->
                           <td align="center" width="30px">
                            <form method="POST" action="{{ route('crud.destroy', $crud->id) }}" accept-charset="UTF-8">
                                <input name="_method" type="hidden" value="DELETE">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                              <input type="submit" class="btn btn-danger" onclick="return confirm('Warning !!! Do you want to delete this data ?');" value="Delete">
                            </form>
                           </td>
                       </tr>
                   @endforeach
                  @include('includes.confirm')
                </table>
            </div>
            <!-- PAGINATION -->
        
        @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Name of Lecturer Wanted Is Not Available
            </div>
        @endif

    </div>
</div>



@endsection
