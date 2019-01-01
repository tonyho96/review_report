<?php use App\User; ?>
@extends('adminlte::page')

@section('content')

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Reviews</h3>

                        <a href="{{ url('/reviews/create') }}" class="btn btn-success btn-sm" title="Add New Review">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <div class="box-tools">
                            {!! Form::open(['method' => 'GET', 'url' => '/reviews', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search" value="{{ request('search') }}">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                    <div class="box-body">


                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reviewer</th>
                                        <th>Reviewee</th>
                                        <th>Uniform</th>
                                        <th>Uniform Comment</th>
                                        <th>Hygience</th>
                                        <th>Hygience Comment</th>
                                        <th>Respectful</th>
                                        <th>Respectful Comment</th>
                                        <th>Teamwork</th>
                                        <th>Teamwork Comment</th>
                                        <th>Adaptability</th>
                                        <th>Adaptability Comment</th>
                                        <th>Dependability</th>
                                        <th>Dependability Comment</th>
                                        <th>Attention To Safety</th>
                                        <th>Attention To Safety Comment</th>
                                        <th>Integrity</th>
                                        <th>Integrity Comment</th>
                                        <th>Ability To Tolerate Stress</th>
                                        <th>Ability To Tolerate Stress Comment</th>
                                        <th>Decision Making</th>
                                        <th>Decision Making Comment</th>
                                        <th>Assertiveness</th>
                                        <th>Assertiveness Comment</th>
                                        <th>General Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ User::findOrFail($item->reviewer)->firstname .' '. User::findOrFail($item->reviewer)->lastname}}</td>
                                        <td>{{ User::findOrFail($item->reviewee)->firstname .' '. User::findOrFail($item->reviewee)->lastname }}</td>
                                        <td>{{ $item->uniform }}</td>
                                        <td>{{ $item->uniform_comment }}</td>
                                        <td>{{ $item->hygience }}</td>
                                        <td>{{ $item->hygience_comment }}</td>
                                        <td>{{ $item->respectful }}</td>
                                        <td>{{ $item->respectful_comment }}</td>
                                        <td>{{ $item->teamwork }}</td>
                                        <td>{{ $item->teamwork_comment }}</td>
                                        <td>{{ $item->adaptability }}</td>
                                        <td>{{ $item->adaptability_comment }}</td>
                                        <td>{{ $item->dependability }}</td>
                                        <td>{{ $item->dependability_comment }}</td>
                                        <td>{{ $item->attention_to_safety }}</td>
                                        <td>{{ $item->attention_to_safety_comment }}</td>
                                        <td>{{ $item->integrity }}</td>
                                        <td>{{ $item->integrity_comment }}</td>
                                        <td>{{ $item->ability_to_tolerate_stress }}</td>
                                        <td>{{ $item->ability_to_tolerate_stress_comment }}</td>
                                        <td>{{ $item->decision_making }}</td>
                                        <td>{{ $item->decision_making_comment }}</td>
                                        <td>{{ $item->assertiveness }}</td>
                                        <td>{{ $item->assertiveness_comment }}</td>
                                        <td>{{ $item->general_comments }}</td>
                                        <td>
                                            <a href="{{ url('/reviews/' . $item->id) }}" title="View Review"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/reviews/' . $item->id . '/edit') }}" title="Update Review"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Review</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/reviews', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Review',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $reviews->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
