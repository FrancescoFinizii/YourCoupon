@extends('layouts.admin-layout')
@section('title', 'Statistiche')
@section('content')
    <div class="background-statistic" style="background-image:url({{url('img/statistics/statistic.jpg')}}">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="back-btn-cont">
                        <a class="back-link"> back </a>
                    </div>
                    <div class="table-title">
                        <h1> Visualizza Offerte </h1>
                    </div>
                    <div class="table-chri">
                        <table class>
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Titolo</th>
                                <th> Prezzo</th>
                                <th> Sconto</th>
                                <th> Azienda</th>
                                <th> Inizio</th>
                                <th> Scadenza</th>
                                <th> Fruizione</th>
                                <th> Descrizione</th>
                                <th> Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th> #</th>
                                <td> Titolo</td>
                                <td> Prezzo</td>
                                <td> Sconto</td>
                                <td> Azienda</td>
                                <td> Inizio</td>
                                <td> Scadenza</td>
                                <td> Fruizione</td>
                                <td> Descrizione</td>
                                <td>

                                    <button class="edit-button"> visualizza statistiche</button>

                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="table-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
