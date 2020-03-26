@extends('layouts.short')

@section('content')
    <div class="container">
        <div class="row col-md-6">
            <div id="flat_search" class="card">
                <h2 class="card-body">Ricerca avanzata</h2>
                <form id="form_find">
                    <div class="col">
                        <div class="form-group">
                            <div class="fuzzy-find form-group">
                            </div>
                        </div>
                        <h4 class="text-left">Filtra i risultati</h4>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <!-- Inserimento numero di stanze -->
                                <label for="room_qty" class="text-md-right">Numero stanze</label>
                                <input id="room_qty" type="number" name="room_qty" class="form-control" max= 20>
                            </div>
                            <div class="form-group col-md-4">
                                <!-- Inserimento numero di letti -->
                                <label for="bed_qty" class="text-md-right">Numero Letti</label>
                                <input id="bed_qty" type="number" name="bed_qty" class="form-control" max= 20 >
                            </div>
                            <div class="form-group col-md-4">
                                <!-- Inserimento distanza in km -->
                                <label for="km_radius" class="text-md-right">Raggio di ricerca</label>
                                <input id="km_radius" type="range" name="km_radius" min="20" max="100" value="20" onchange="distance.value = this.value" class="form-control">
                                <output id="distance"></output>Km<br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Servizi disponibili</h5> <br>
                        <div class="form-group form-check col-md-6">
                            <!-- Servizi Aggiuntivi -->
                            @foreach ($services as $service)
                            <input type="checkbox" id="{{$service->id}}" class="form-check-input" name="check_services" value="{{$service->id}}">
                            <label class="form-check-label" for="{{$service->name}}"></label>{{$service->name}}<br>
                            @endforeach
                        </div>
                        <!-- campi nascosti necessari -->
                        <input id="searchFind" type="text" name="address_search" value="{{ $address }}" hidden>
                        <input id="latNumberFind" type="text" name="lat" value="{{ $lat }}" hidden>
                        <input id="lonNumberFind" type="text" name="lon" value="{{ $lon }}" hidden>
                        <div class="form-group col-md-6">
                            <button id="btn_find" class="btn btn-success btn-lg" type="submit" name="btn_find">Cerca</button>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="find-results" class="row">
            <!-- Card package -->
            <div id="card_container" class="card-columns">
            <!-- Appendo il contenuto del template handlebars -->
            </div>
        </div>
    </div>

    <!-- script handlebars -->
    <script id="card_template" type="text/x-handlebars-template">
        <div class="card">
            <img class="card-img" src="{{asset('storage/')}}/@{{ img_uri }}" alt="">
            <div class="card-img-overlay">
                <a href="#" class="btn btn-light btn-sm"></a>
            </div>
            <div class="card-body">
                <h4 class="card-title">@{{ title }}</h4>
                <a class="btn btn-success stretched-link" style="position: relative;" href="{{ url('flats/details/')}}/@{{ flat_details }}">Vedi Dettagli</a>

            </div>
        </div>
    </script>
@endsection
