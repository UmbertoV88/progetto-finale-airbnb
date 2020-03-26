@php
    // Creo un array nella session per memorizzare le pagine visitate dagli utenti e memorizzo all'interno l'url della pagina corrente visitata
    session()->push('clicked_url', url()->current());
@endphp

@extends('layouts.app')

@section('searchbox')
    <div class="container">
        <div id="homeLeftBox" class="row">
            <div class="col-lg-6 card border-light shadow">
                <form class="form" action="{{ route('flat.find') }}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="form-group fuzzy-home">
                        <h2>{{__('homepage.slogan')}}</h2>
                        <h6>{{__('homepage.city')}}</h6>
                    </div>
                    <div class="form-group">
                        <button id="btn_home" type="submit" class="btn btn-success btn-lg float-right">{{__('homepage.btn_search')}}</button>
                    </div>
                    <input id="searchHome" type="text" name="address_home" hidden>
                    <input id="latNumberHome" type="text" name="lat" hidden>
                    <input id="lonNumberHome" type="text" name="lon" hidden>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div id="home-sponsored" class="row">
            <h2 class="text-center">{{__('homepage.firts_flat')}}</h2>
                <!-- Card package -->
            <div class="card-columns">
                @if(isset($flat_sponsored) && $flat_sponsored->count())
                    @foreach ($flat_sponsored as $flat)
                        <div class="card">
                            <img class="card-img" src="{{asset('storage/' .$flat->img_uri)}}" alt="flat picture">
                            <div class="card-img-overlay">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $flat->title }}</h5>
                                <a class="btn btn-success stretched-link" href="{{ route('flat.details', $flat->id)}}">{{__('homepage.btn_details')}}</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>{{__('homepage.no_flat')}}</p>
                @endif
            </div>
        </div>
        <div id="home-not-sponsored" class="row">
            <h2 class="text-center">{{__('homepage.flats')}}</h2>
            <!-- Card package -->
            <div class="card-columns">
                @forelse ($flats as $flat)
                    <div class="card">
                        <img class="card-img" src="{{asset('storage/' .$flat->img_uri)}}" alt="flat picture">
                        <div class="card-body">
                            <h5 class="card-title">{{ $flat->title }}</h5>
                            <a class="btn btn-success stretched-link" href="{{ route('flat.details', $flat->id)}}">{{__('homepage.btn_details')}}</a>
                        </div>
                    </div>
                @empty
                    <p>Non ci sono appartamenti</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
