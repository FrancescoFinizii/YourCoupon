@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Coupon")
@section("content")
    <div class="schede">
        <h1>Coupon</h1>
        <div class="user-coupon">
            @forelse($coupons as $coupon)
                <a class="coupon-item" href="{{route("coupon.show", ["id" => $coupon->id])}}">
                    <img src="{{asset("img/qr-code.png")}}">
                    <p>{{ $coupon->id}}</p>
                </a>
            @empty
                <div class="flex-centered">
                    <h2>Nessun Coupon attivo</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
