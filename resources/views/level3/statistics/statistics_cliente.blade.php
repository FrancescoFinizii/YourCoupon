@extends('layouts.admin-layout')
@section('title', 'Statistiche')
@section('content')
    <div class="background-statistic" style="background-image:url({{url('img/statistics/statistic.jpg')}}">
        <div class="large-table">
            <div class="table-margin">
                <div class="table-wrap">
                    <div class="back-btn-cont">
                        <a class="back-link"> back </a>
                        <div class="table-title">
                            <h1> Visualizza Utenti </h1>
                        </div>
                        <div class="table-chri">
                            <table class>
                                <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Username</th>
                                    <th> Nome</th>
                                    <th> Cognome</th>
                                    <th> Nascita</th>
                                    <th> Telefono</th>
                                    <th> E-mail</th>
                                    <th> Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <th> 1</th>
                                    <td> Username</td>
                                    <td> Nome</td>
                                    <td> Cognome</td>
                                    <td> Nascita</td>
                                    <td> Telefono</td>
                                    <td> Email</td>
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
    </div>
@endsection
