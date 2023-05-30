<!DOCTYPE HTML>
<html>
<head>
    <!--per far si che il layout si adatti alla finestra-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Operazione Eseguita</title>
    <link rel="stylesheet" href="{{ asset('css/ludovico/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ludovico/elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ludovico/style_aggiunto_da_ludovico.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ludovico/style.css') }}">


</head>
<body>


{{--<div class="container">--}}
<div class="faq-crud-box">
    <div class="crudfaq-content-card content-eseguita">
        <div class="eseguita-div">
            <h1 class="div-heading-crudfaq"> {{ $message }} </h1>
            <a href="{{ route('crud-faq') }}">
                <button type="button" class="faq-button">Clicca per tornare a CRUD FAQ</button>
            </a>
        </div>

    </div>
</div>
{{--</div>--}}
</body>
</html>

