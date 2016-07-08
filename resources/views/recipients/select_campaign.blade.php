@extends('app')

@section('breadcrumb')
    @parent
    <li>Recipients</li>
    <li>Select Campaign</li>
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
                                <a href="{{ route('recipients.list', ['id' => $campaign->id, 'name' => str_slug($campaign->name)]) }}">{{ $campaign->name }}</a>
                            </li>
                        @empty
                            <li class="list-group-item">Debe crear una campaña antes de asignar destinatarios a la campaña</li>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection