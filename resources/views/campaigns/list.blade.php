@extends('app')

@section('breadcrumb')
    @parent
    <li><a href="{{ route('campaigns.list') }}">Campaigns</a></li>
    <li>List campaigns</li>
@endsection

 
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('section_name', 'Email Marketing Management')</div>

            <div class="panel-body">
                
                <ul class="campaigns list-group">
                    @forelse ($campaigns as $campaign)
                    <li class="col-lg-12 col-xs-12 list-group-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm" aria-label="Delete campaign">
                                <a href="{{ route('campaign.delete', ['id' => $campaign->id ]) }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" aria-label="Center Align">
                                <a href="{{ route('campaign.edit', ['id' => $campaign->id ]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            </button>
                        </div>
                        &nbsp; {{ $campaign->name }}
                        <div class="pull-right">
                        @if ($campaign->status == \App\Models\Campaign::STATUS_ACTIVE)
                            <span class="label label-success">Active</span>
                        @elseif ($campaign->status == \App\Models\Campaign::STATUS_INACTIVE)
                            <span class="label label-primary">Inactive</span>
                        @else
                            <span class="label label-danger">Deleted</span>
                        @endif
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item">No hay editoriales</li>
                    @endforelse
                </ul>

            </div>
        </div>
    </div>
</div>
@endsection