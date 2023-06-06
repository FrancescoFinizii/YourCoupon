@extends("layouts.user-layout")
@section("title", "User - Coupon")
@section("content")
    <div class="schede" id="coupon-div">
        <h1>My coupon</h1>
        <div class="user-coupon">
            @if(!empty($data) && $data->count())
                @foreach($data as $key => $value)
                    <a class="coupon-item" href="">
                        <img src="{{asset("img/qrcode.png")}}">
                        <p>{{ $value->IDCoupon }}</p>
                    </a>
                @endforeach
            @else
        </div>
        {!! $data->links() !!}
    </div>
@endsection
