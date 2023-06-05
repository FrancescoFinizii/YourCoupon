@extends('layouts.admin-layout')
@section('title', 'Statistiche')
@section('content')
    <div class="background-statistic" style="background-image:url({{url('img/statistics/statistic.jpg')}}">


        <div class="header-statistic">
            <p class="logo-statistic">Statistiche</p>
        </div>
        <div>
            <div class="statistic-paragra">
                <p style="font-size: 30px; margin: auto 0;">Numero totale di coupon emessi:<span
                        class="red-fancy">1</span></p>
            </div>
            <section id="statistic-menu">
                <div class="statistic-item">
                    <h3>Statistiche Promozioni</h3>
                    <p>In questa sezione, selezionando un offerta (sia attiva che scaduta), è possibile visualizzare il
                        numero di coupon emessi per essa.</p>
                    <img src="{{asset("img/statistics/promo.png")}}" height="90" width="180"
                         style="margin-top: 20px; "/><br>
                    <a class="edit-button">Visualizza statistiche</a>
                </div>
                <div class="statistic-item">
                    <h3>Satistiche Clienti</h3>
                    <p>In questa sezione, selezionando un cliente, è possibile visualizzare il numero di coupon emessi a
                        suo
                        nome.</p>
                    <img src="{{asset("img/statistics/clienti.jpg")}}" height="120" width="120"
                         style="margin-top: 10px"/><br>
                    <a class="edit-button">Visualizza statistiche</a>
                </div>
            </section>
        </div>
    </div>
@endsection
