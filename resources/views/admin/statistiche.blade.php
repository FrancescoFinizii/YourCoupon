@extends('admin.layout.admin-layout')
@section('title', 'Statistiche')
@section('content')
    <section class="statistic-section" style="background-image: url({{url('img/texture.jpg')}})">
        <div class="statistic-container">
            <div class="main-statistic">
                <div class="statistic-item statistic-item-large">
                    <h2>Statistiche Offerte</h2>
                    <p>In questa sezione, selezionando un offerta, è possibile visualizzare
                        il numero di coupon emessi per essa.</p>
                    <div class="img flex-centered flex-centered">
                        <img src="{{asset("img/icon/coupon.png")}}" width="200px" height="200px">
                    </div>
                    <a href="{{route("statistiche.offerta.index")}}" class="btn btn-large btn-outline-dark">Visualizza statistiche</a>
                </div>
                <div class="statistic-item statistic-item-large">
                    <h2>Statistiche Clienti</h2>
                    <p>In questa sezione, selezionando un cliente, è possibile visualizzare il numero di coupon emessi a suo nome.</p>
                    <div class="img flex-centered flex-centered">
                        <img src="{{asset("img/icon/profile-user.png")}}" width="160px" height="160px">
                    </div>
                    <a href="{{route("statistiche.cliente.index")}}" class="btn btn-large btn-outline-dark">Visualizza statistiche</a>
                </div>
            </div>
            <div class="secondary-statistics">
                <div class="statistic-item flex-centered">
                    <h3>Numero totale di coupon emessi:</h3>
                    <p>{{\App\Http\Controllers\StatisticheController::countCoupon()}}</p>
                </div>
                <div class="statistic-item flex-centered">
                    <h3>Numero totale di aziende:</h3>
                    <p>{{\App\Http\Controllers\StatisticheController::countAziende()}}</p>
                </div>
                <div class="statistic-item flex-centered">
                    <h3>Numero totale di offerte:</h3>
                    <p>{{\App\Http\Controllers\StatisticheController::countOfferte()}}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
