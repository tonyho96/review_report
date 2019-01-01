@extends('adminlte::page')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List User Reviews</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Year</th>
                                <th>Module</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $users = \App\User::where('role', config('user.role.recruit'))->where('id', '<>', Auth::user()->id)->get();
                            ?>

                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td>{{ $item->firstname }}</td>
                                    <td>{{ $item->lastname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->module }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>
                                        <a href="{{ url("/reviews/create?reviewee=$item->id") }}" title="Review"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Review</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection