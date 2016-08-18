@extends('app')

@section('breadcrumb')
    @parent
    <li><a href="{{ route('bulletins.list') }}">Bulletins</a></li>
    <li>List</li>
@endsection

 
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('section_name', 'Email Marketing Management')</div>

            <div class="panel-body">
                
                <ul class="bulletins list-group">
                    @forelse ($bulletins as $bulletin)
                    <li class="col-lg-12 col-xs-12 list-group-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm" aria-label="Delete campaign">
                                <a href="{{ route('bulletins.delete', ['id' => $bulletin->id ]) }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" aria-label="Center Align">
                                <a href="{{ route('bulletins.edit', ['id' => $bulletin->id ]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            </button>
                        </div>
                        &nbsp; {{ $bulletin->name }}
                        {{--
                        <div class="pull-right">
                        @if ($bulletin->status == \App\Models\Bulletin::STATUS_ACTIVE)
                            <span class="label label-success">Active</span>
                        @elseif ($campaign->status == \App\Models\Campaign::STATUS_INACTIVE)
                            <span class="label label-primary">Inactive</span>
                        @else
                            <span class="label label-danger">Deleted</span>
                        @endif
                        </div>
                        --}}
                    </li>
                    @empty
                    <li class="list-group-item">Opps! There is no bulletins. <a href="{{ route('bulletins.create') }}">Wanna you create a new one?</a></li>
                    @endforelse
                </ul>

            </div>
        </div>
    </div>
</div>
@endsection