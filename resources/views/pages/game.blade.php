@extends('app')

@section('title', 'Game | FaceMash v1.0')

@section('content')

<div class="home">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-50">
                <ul class="list-inline pull-right">
                    <li class="active"><a href="{{ url('game') }}" class="btn btn-sm btn-green">Play Game</a></li>
                    <li><a href="{{ url('images/stats') }}" class="btn btn-sm btn-orange">View Statistics</a></li>
                    <li><a href="{{ url('share') }}" class="btn btn-sm btn-cyan">Share</a></li>
                </ul>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-50">
                @if(count($images) >= 2)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopad">
                        <form action="{{ route('game.update',$images->first()->id) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="winner" id="{{ $images->first()->id }}" value="{{ $images->first()->id }}">

                                <input type="hidden" class="form-control" name="loser" id="{{ $images->last()->id }}" value="{{ $images->last()->id }}">
                            </div>

                            <div id="left" class="animated bounceInLeft">
                                <a href="#" class="pickoption">
                                    <div class="view view-first">
                                        <img src="{{ asset('img/models/' . $images->first()->filename) }}" alt="" width="600" class="img-responsive">
                                        <div class="mask">
                                            <h2>Rank: {{ $images->first()->rank }}</h2>
                                            <p class="lead">Her bio is this</p>
                                            <table class="table bg-inherit text-center">
                                                <thead>
                                                    <tr></tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td><span class="font120">Won: {{ $images->first()->wins }}</span></td></tr>
                                                    <tr><td><span class="font120">Lost: {{ $images->first()->losses }}</span></td></tr>
                                                    <tr><td><span class="font120">Score: {{ $images->first()->score }}</span></td></tr>
                                                    {{-- <tr><td><span class="font120">Expectation: {{ $images->first()->wins }}</span></td></tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopad">
                        <form action="{{ route('game.update',$images->last()->id) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="winner" id="{{ $images->last()->id }}" value="{{ $images->last()->id }}">

                                <input type="hidden" class="form-control" name="loser" id="{{ $images->first()->id }}" value="{{ $images->first()->id }}">
                            </div>

                            <div id="right" class="animated bounceInRight">
                                <a href="#" class="pickoption">
                                    <div class="view view-first">
                                        <img src="{{ asset('img/models/' . $images->last()->filename) }}" alt="" width="600" class="img-responsive">
                                        <div class="mask">
                                            <h2>Rank: {{ $images->last()->rank }}</h2>
                                            <p class="lead">Her bio is this</p>
                                            <table class="table bg-inherit text-center">
                                                <thead>
                                                    <tr></tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td><span class="font120">Won: {{ $images->last()->wins }}</span></td></tr>
                                                    <tr><td><span class="font120">Lost: {{ $images->last()->losses }}</span></td></tr>
                                                    <tr><td><span class="font120">Score: {{ $images->last()->score }}</span></td></tr>
                                                    {{-- <tr><td><span class="font120">Expectation: {{ $images->last()->wins }}</span></td></tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@stop