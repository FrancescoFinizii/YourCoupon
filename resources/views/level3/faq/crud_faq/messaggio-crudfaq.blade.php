@extends('level3.faq.admin_layout')
@section('title', 'Gestione Faq')
@section('crudfaq-content')

    @if(session('success'))
        <div class="faq-crud-box">
            <div class="crudfaq-content-card">
                <h1 class="div-heading-crudfaq">CRUD FAQ</h1>
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

@endsection
