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
            <div class="panel-heading">
                @if(isset($campaign))
                    @yield('section_name', "Edit campaign" )
                @else
                    @yield('section_name', 'Create a new campaign')
                @endif
            </div>

            <div class="panel-body">
                @if(isset($campaign))
                {{ Form::open(array('route' => ['campaign.edit', 'id' => $campaign->id], 'role' => 'form' )) }}
                @else
                {{ Form::open(array('route' => 'campaign.create', 'role' => 'form' )) }}
                @endif
                    <div class="form-group">
                        {{ Form::label('campaign-name', 'Campaign name') }}
                        {{ Form::text('campaign-name', isset($campaign) ? $campaign->name : null, [ 'class' => 'form-control', 'placeholder' => 'Give a name to your campaign' ]) }}
                    </div>
                    {{ Form::submit(isset($campaign) ? 'Update' : 'Create') }}
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
@endsection