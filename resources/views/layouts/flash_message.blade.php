@if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible">{{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    </div>
@endif
@if(Session::has('error'))
    <div class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissible">{{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    </div>
@endif

@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif