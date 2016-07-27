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

                    <h1>{{ $campaign->name }}<br/>
                        <small>Resumen de destinatarios</small>
                    </h1>
                    <ul class="recipients-stats list-group list-inline">
                        @forelse ($domains as $domain => $num_recipients)
                            <li class="list-group-item col-md-4">
                                {{ $domain }}
                                <span class="badge">{{ $num_recipients }} &nbsp;<span
                                            class="glyphicon glyphicon-envelope" aria-hidden="true"
                                            aria-label="correos del dominio"></span></span>
                            </li>
                        @empty
                            <li class="list-group-item">No se han definido destinatarios para esta campaña.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default" id="panel1">
                                    <div class="panel-heading-custom panel-heading-custom-title">
                                        Acciones disponibles
                                    </div>
                                </div>
                                @if (! empty($domains))
                                    <div class="panel panel-default" id="panel1">
                                        <div class="panel-heading-custom">
                                            <a class="collapsed"
                                                href="{{ route('recipients.download', ['id' => $campaign->id, 'name' => str_slug($campaign->name)]) }}">
                                                Descargar Destinatarios (CSV)
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="panel panel-default" id="panel2">
                                    <div class="panel-heading-custom">
                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseB"
                                           href="javascript:return false">Añadir destinatarios</a>
                                    </div>
                                    <div id="collapseB" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form action="{{ route('recipients.add', ['id' => $campaign->id, 'name' => str_slug($campaign->name)]) }}" method="post">
                                                {{-- <label for="recipients_csv_file">Seleccione fichero CSV</label> --}}
                                                <p class="help-block">Seleccione el fichero CSV con los destinatarios
                                                    que se añadirán a la lista actual</p>
                                                <input type="file" id="recipients_csv_file" class="btn btn-file">
                                                <button type="submit" class="btn btn-success pull-right" role="button">Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="panel panel-default" id="panel3">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-target="#collapseThree"
                                   href="#collapseThree" class="collapsed">
                                    Collapsible Group Item #3
                                </a>
                            </h4>

                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                    </div>
                    --}}

                </div>
            </div>
        </div>
    </div>
@endsection

