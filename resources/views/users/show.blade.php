@extends('adminlte::page')

@section('content')

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User {{ $user->id }}</h3>
                    </div>
                    <div class="box-body">
                        @if(Auth::user()->role == config('user.role.admin'))
                            <a href="{{ url('/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/users/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                            
							@if($user->role == 2)
							{!! Form::open([
                                'url' => ['/users', $user->id],
                                'method' => 'post',
                                'action' => ['UserController@disableUser'],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-user-times" aria-hidden="true"></i> Disable', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-warning btn-sm',
                                    'title' => 'Disable User',
                                    'onclick'=>'return confirm("Confirm disable?")'
                            )) !!}
                            {!! Form::close() !!}
							@endif

                            @if($user->role == 0)
							{!! Form::open([
                                'url' => ['/usersE', $user->id],
                                'method' => 'post',
                                'action' => ['UserController@enableUser'],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-user" aria-hidden="true"></i> Enable', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-success btn-sm',
                                    'title' => 'Enable User',
                                    'onclick'=>'return confirm("Confirm enable?")'
                            )) !!}
                            {!! Form::close() !!}
							@endif

                            @if($user->role != config('user.role.admin'))
							{!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['users', $user->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete User',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                            {!! Form::close() !!}
							@endif

                            <br/>
                            <br/>
                        @else
                            <a href="{{ url('/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/users/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <br/>
                            <br/>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $user->id }}</td>
                                    </tr>
                                    <tr><th> First Name </th><td> {{ $user->firstname }} </td></tr>
                                    <tr><th> Last Name </th><td> {{ $user->lastname }} </td></tr>
                                    <tr><th> Email </th><td> {{ $user->email }} </td></tr>
                                    @if($user->role == config('user.role.admin'))
                                        <tr><th> Role </th><td> Admin </td></tr>
                                    @else
                                        <tr><th> Role </th><td> Recruit </td></tr>
                                    @endif
                                    <tr><th> Year </th><td> {{ $user->year }} </td></tr>
                                    <tr><th> Module </th><td> {{ $user->module }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
