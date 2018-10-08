<!-- Modal -->
<div class="modal fade" id="edit-{{$entry->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Entry</h4>
            </div>
            <div class="well">
                <ul class="list-group">
                    <li class="list-group-item">Name: {{$entry->firstname}} {{$entry->lastname}}</li>
                    <li class="list-group-item">Clock-In Time: {{$entry->in_time}}</li>
                    <li class="list-group-item">Clock-Out Time: {{$entry->out_time? : 'None'}}</li>
                    @if ($entry->total_minutes > 0)
                        <li class="list-group-item">Total Time: {{date('H:i', mktime(0, $entry->total_minutes))}}</li>
                    @endif
                </ul>

                @if (!$entry->out_time)
                    {!! Form::open(['action' => ['EntriesController@update', $entry->id], 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('clockout', 'Set The Clock-Out Date and Time:')}}
                            <div class='input-group date' id='datetimepicker1'>
                                {{Form::text('clockout', '', ['class' => 'form-control'])}}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                            </div>
                            <div class="col-md-6 right">
                                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                @else
                    <div class="row">
                        <div class="col-sm-12">
                            <p>No editable fields : This is a complete entry</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>