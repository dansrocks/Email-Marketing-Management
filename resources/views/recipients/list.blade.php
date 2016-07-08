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

                    <ul class="domains list-group">
                        @forelse ($domains as $domain => $num_recipients)
                            <li class="col-md-4">{{ $domain }} :: {{ $num_recipients }}</li>
                        @empty
                            <li class="list-group-item">No se han definido destinatarios para esta campaña.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection