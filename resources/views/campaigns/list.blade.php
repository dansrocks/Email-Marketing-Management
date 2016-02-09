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
                
                <ul class="campaigns list-unstyled">
                    @forelse ($campaigns as $campaign)
                    <li class="col-lg-12 col-xs-12">{{ $campaign->name }}</li>
                    @empty
                    <li class="list-group-item">No hay editoriales</li>
                    @endforelse
                </ul>

            </div>
        </div>
    </div>
</div>
@endsection