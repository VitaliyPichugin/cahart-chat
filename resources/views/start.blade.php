@extends('layouts.app')

@section('content')
    <div  class="container">
        <div class="row justify-content-center">
            <div class="card-header">My app</div>
            {{--<lara-component :url-data="{{json_encode($urlData)}}"></lara-component>--}}
            {{-- <get-json></get-json>--}}
            {{-- <chart-line></chart-line>--}}
           {{-- <chart-pie></chart-pie>--}}
            <random-chart></random-chart>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
