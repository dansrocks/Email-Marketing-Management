@extends('app')

@section('breadcrumb')
    @parent
    <li><a href="{{ route('campaigns.list') }}">Campaigns</a></li>
    <li>Add new campaign</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('section_name', 'Create a new campaign')</div>

            <div class="panel-body">
                
                {{ Form::open(array('route' => 'campaign.add', 'role' => 'form' )) }}
                
                    {{ Form::token() }}
                    <div class="form-group">
                        {{ Form::label('campaign-name', 'Campaign name') }}
                        {{ Form::text('campaign-name', null, [ 'class' => 'form-control', 'placeholder' => 'Give a name to your campaign' ]) }}
                    </div>
                    {{ Form::submit('Create') }}
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@endsection