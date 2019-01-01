@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <div class="box-tools">
                    {!! Form::open(['method' => 'GET', 'url' => '/exports', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                    <div class="input-group input-group-sm" style="width: 250px; margin-left: 20px; margin-bottom: 20px;">
                        <p style="font-size: 16px;">Year</p>
                        <select id="year" name="year" class="form-control" style="font-size: 14px;">
                            <option value="" disabled>Select year</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                        </select>
                        <script type="text/javascript">
                            document.getElementById('year').value = "{{ $year }}";
                        </script>
                        <p style="font-size: 16px;">Module</p>
                        <select id="module" name="module" class="form-control" style="font-size: 14px;">
                            <option value="" disabled>Select module</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>

                        <script type="text/javascript">
                            document.getElementById('module').value = "{{ $module }}";
                        </script>
                    </div>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default" style="margin-left: 20px;"><i class="fa fa-search"></i>Search</button>
						{{--<button id="export-selected-btn" type="button" class="btn btn-default" style="margin-left: 15px;">Export Selected</button>--}}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
								{{--<th></th>--}}
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Year</th>
                                <th>Module</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($users != null)
                                @foreach($users as $item)
                                    <tr>
										{{--<td><input type="checkbox" class="reviewee-id" value="{{ $item->id }}"></td>--}}
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->firstname }}</td>
                                        <td>{{ $item->lastname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>Recruit</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->module }}</td>
                                        <td>
                                            <a href="{{ url('/exports/' . $item->id) }}" title="Show Export"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--{!! Form::open(['method' => 'POST', 'url' => action('ExportsController@multipleReview'), 'class' => 'form-inline my-2 my-lg-0 float-right', 'id' => 'review-multiple-form'])  !!}--}}
        {{--<div id="reviewer-ids"></div>--}}
    {{--{!! Form::close() !!}--}}
@endsection

@push('js')
    <script>
//        $('#export-selected-btn').click(function() {
//        	var html = '';
//            $('.reviewee-id:checked').each(function(){
//            	html += '<input name="reviewerIds[]" type="hidden" value="'+ $(this).val() +'">';
//            });
//
//            $('#reviewer-ids').html(html);
//            $('form#review-multiple-form').submit();
//        });

        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            });
        });
    </script>
@endpush


