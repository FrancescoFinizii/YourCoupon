@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Coupon")
@section("content")
    <div class="schede">
        <h1>Coupon</h1>
        <div class="user-coupon">
            @foreach($coupons as $coupon)
                <a class="coupon-item" href="{{route("coupon.show", $coupon->id)}}">
                    <img src="{{asset("img/qr-code.png")}}">
                    <p>{{ $coupon->id}}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
