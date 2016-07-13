@extends('app')

@section('breadcrumb')
    @parent
    <li>Recipients</li>
    <li>Campaign statistics</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('section_name', 'Email Marketing Management')</div>

                <div class="panel-body">

                    <h1></h1>
                    <ul class="recipients-stats list-group list-inline">
                        @forelse ($domains as $domain => $num_recipients)
                            <li class="list-group-item col-md-4">
                                {{ $domain }}
                                <span class="badge">{{ $num_recipients }} &nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true" aria-label="correos del dominio"></span></span>
                            </li>
                        @empty
                            <li class="list-group-item">No se han definido destinatarios para esta campaña.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="separator"></div>

                <a class="btn btn-default" href="{{ route('recipients.download', ['id' => $campaign->id, 'name' => str_slug($campaign->name)]) }}" role="button">Descargar Destinatarios (CSV)</a>
            </div>
        </div>
    </div>
@endsection

