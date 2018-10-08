@extends('layouts.app')

@section('content')

    <h1>HiMama Timelog Entries</h1>

    @if(count($entries) > 0)
        <div class="well">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Clocked In</th>
                    <th>Clocked Out</th>
                    <th>Total Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td>{{$entry->id}}</td>
                            <td>{{$entry->firstname}} {{$entry->lastname}}</td>
                            <td>{{$entry->in_time}}</td>
                            <td>{{$entry->out_time}}</td>
                            <td>{{date('H:i', mktime(0, $entry->total_minutes))}}</td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit-{{$entry->id}}"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete-{{$entry->id}}" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                        </tr>

                        @include('entries.edit')
                        @include('entries.delete')
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>No Entries Yet</p>
    @endif


@endsection