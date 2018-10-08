@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('failure'))
    <div class="alert alert-danger">
        {!! session('failure') !!}
    </div>
    @if(session('moreInfo'))
        <div class="alert alert-info">
            {!! session('moreInfo') !!}
        </div>
    @endif
@endif

@if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
@endif