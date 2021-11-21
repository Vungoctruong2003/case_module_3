@extends('users.layouts.master')
@section('content')
    <main class="mt-5 pt-4">
        <div class="container wow fadeIn">

            <h2 class="my-5 h2 text-center">Thanh toán</h2>
            <form action="{{route('add_bill')}}" method="post">
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6 mb-2">

                                    <!--firstName-->
                                    <div class="md-form ">
                                        <label for="firstName" class="">Tên</label>
                                        <input type="text" name="user_name"   class="form-control  @error('user_name') is-invalid @enderror">
                                        @error('user_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6 mb-2">

                                    <!--lastName-->
                                    <div class="md-form">
                                        <label for="lastName" class="">Số điện thoại</label>
                                    <input type="text" name="phone_number"  class="form-control  @error('phone_number') is-invalid @enderror">
                                        @error('phone_number')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <!--Grid column-->

                            </div>
@csrf
                            <div class="md-form mb-5">
                                <label for="email" class="">Email (optional)</label>
                                <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="youremail@example.com">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--address-->
                            <div class="md-form mb-5">
                                <label for="address" class="">Địa chỉ</label>
                                <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" placeholder="1234 Main St">
                                @error('address')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <hr>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Mua hàng</button>
                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">
                @php($products = session('cart') ?? $products = [] )

                    <!-- Heading -->
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Sản phẩm của bạn</span>
                        <span class="badge badge-secondary badge-pill">{{count($products)}}</span>
                    </h4>

                    <!-- Cart -->
                    <ul class="list-group mb-3 z-depth-1">
                        @php($products = session('cart') ?? $products = [] )
                        @php($counts = session('count') ?? $counts = [] )
                        @php($total=0 )
                        @foreach($products as $key => $product)
                            <input type="hidden" value="{{$total += $counts[$key]*$product->price}}">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $product->name }}</h6>
                                <small class="text-muted">Số lượng  {{$counts[$key]}}</small>
                            </div>
                            <span class="text-muted">{{number_format($product->price*$counts[$key])}}VND</span>
                        </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng tiền</span>
                            <strong>{{ number_format($total)}} VND</strong>
                        </li>
                    </ul>
                    <!-- Cart -->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            </form>
        </div>
    </main>

@endsection
