@php
        if (empty($imgFile)) {
            $imgFile = 'default.jpg';
        }

@endphp
<img src="{{ asset('img/user/' . $imgFile) }}" class="foto-chri-table">
