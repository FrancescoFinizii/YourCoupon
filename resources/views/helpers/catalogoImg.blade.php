@php
        if (empty($imgFile)) {
            $imgFile = 'defaultOff.jpg';
        }

@endphp
<img src="{{ asset('img/fotoProds/' . $imgFile) }}">
