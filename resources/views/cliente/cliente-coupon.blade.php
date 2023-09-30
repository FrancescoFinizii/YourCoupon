@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Coupon")
@section("content")
    <div class="schede">
        <h1>Coupon</h1>
        <div class="user-coupon">
            @forelse($coupons as $coupon)
                <a class="coupon-item" href="{{route("coupon.show", ["id" => $coupon->id])}}">
                    <div>
                        {!! QrCode::size(100)->generate($coupon->id) !!}
                    </div>
                    <div class="coupon-promo">
                        {{ $coupon->offerta->oggetto}}
                    </div>
                </a>
            @empty
                <div class="flex-centered">
                    <h2>Nessun Coupon attivo</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
