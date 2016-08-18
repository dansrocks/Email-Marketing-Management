@extends('app')

@section('breadcrumb')
    @parent
    <li><a href="{{ route('bulletins.list') }}">Bulletins</a></li>
    <li>@if (isset($bulletin))
            Edit bulletin
        @else
            Add new bulletin
        @endif</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                @if(isset($bulletin))
                    @yield('section_name', "Edit bulletin" )
                @else
                    @yield('section_name', 'Create a new bulletin')
                @endif
            </div>

            @if(isset($bulletin))
            {{ Form::open(array('route' => ['bulletins.edit', 'id' => $bulletin->id], 'role' => 'form' )) }}
            @else
            {{ Form::open(array('route' => 'bulletins.create', 'role' => 'form' )) }}
            @endif
                <div class="panel-body"  style="background-color:#DDD;margin:5px; border-radius: 5px;">
                    <div class="form-group">
                        {{ Form::label('bulletin-name', 'Bulletin name') }}
                        {{ Form::text('bulletin-name', isset($bulletin) ? $bulletin->name : null, [ 'class' => 'form-control', 'placeholder' => 'Give a name for your bulletin' ]) }}
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('bulletin-start_at', 'Start at') }}
                        {{ Form::text('bulletin-start_at', isset($bulletin) && $bulletin->start_at ? $bulletin->start_at : null, [ 'class' => 'form-control', 'placeholder' => 'yyyy-mm-dd' ]) }}
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('bulletin-ended_at', 'Ended at') }}
                        {{ Form::text('bulletin-ended_at', isset($bulletin) && $bulletin->ended_at ? $bulletin->ended_at : '--', [ 'class' => 'form-control', 'readonly' => 'readonly' ]) }}
                    </div>
                </div>
                <div class="panel-body"  style="background-color:#DDD;margin:5px; border-radius: 5px;">

                    <div class="form-group col-md-12">
                        {{ Form::label('bulletin-subject', 'Subject') }}
                        {{ Form::text('bulletin-subject', isset($bulletin) ? $bulletin->subject : null, [ 'class' => 'form-control', 'placeholder' => 'Subject for your bulletin' ]) }}
                    </div>
                    <div class="form-group col-md-12">
                        <label for="bulletin-body">Body content</label>
                        {{ Form::textarea('bulletin-body', isset($bulletin) ? $bulletin->body : null, [ 'class' => 'form-control', 'placeholder' => '' ]) }}
                    </div>
                    {{--
                    <div class="form-group">
                        {{ Form::label('bulletin-status', 'Status') }}
                        {{ Form::select('bulletin-status', [ $bulletin->status ], $bulletin->status, [ 'class' =>'text-capitalize' ] ) }}
                    </div>
                    --}}
                </div>
                <div class="panel-body">
                    <div class="form-group col-md-12 text-center">
                        {{ Form::submit(isset($bulletin) ? 'Update' : 'Create', [ 'class' => "btn btn-success"]) }}
                    </div>

                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection