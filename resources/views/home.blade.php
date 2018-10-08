@extends('layouts.app')

@section('content')

    <h1>HiMama Home</h1>

    <p>
        Fill out this form to clock in and out of your shifts.
    </p>

    {!! Form::open(['action' => 'EntriesController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('firstName', 'First Name')}}
        {{Form::text('firstName', '', ['class' => 'form-control', 'placeholder' => 'John'])}}
    </div>

    <div class="form-group">
        {{Form::label('lastName', 'Last Name')}}
        {{Form::text('lastName', '', ['class' => 'form-control', 'placeholder' => 'Smith'])}}
    </div>

    <div class="form-group btn-group radio-group" role="group">
        <label class="btn btn-primary">
            Clocking In
            {{Form::radio('clockingType', 'in', true, ['id' => 'clockin-button', 'class' => 'form-control'])}}
        </label>

        <label class="btn btn-primary not-active">
            Clocking Out
            {{Form::radio('clockingType', 'out', false, ['id' => 'clockout-button', 'class' => 'form-control'])}}
        </label>
    </div>

    <div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}

@endsection
