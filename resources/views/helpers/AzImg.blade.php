@php
        if (empty($imgFile)) {
            $imgFile = 'no-logo.png';
        }

@endphp
<img src="{{ asset('img/logos/' . $imgFile) }}">
