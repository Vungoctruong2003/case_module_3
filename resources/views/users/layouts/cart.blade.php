<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
        }

        select.form-control:not([size]):not([multiple]) {
            height: 44px;
        }

        select.form-control {
            padding-right: 38px;
            background-position: center right 17px;
            background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNv…9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K);
            background-repeat: no-repeat;
            background-size: 9px 9px;
        }

        .form-control:not(textarea) {
            height: 44px;
        }

        .form-control {
            padding: 0 18px 3px;
            border: 1px solid #dbe2e8;
            border-radius: 22px;
            background-color: #fff;
            color: #606975;
            font-family: "Maven Pro", Helvetica, Arial, sans-serif;
            font-size: 14px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .shopping-cart,
        .wishlist-table,
        .order-table {
            margin-bottom: 20px
        }

        .shopping-cart .table,
        .wishlist-table .table,
        .order-table .table {
            margin-bottom: 0
        }

        .shopping-cart .btn,
        .wishlist-table .btn,
        .order-table .btn {
            margin: 0
        }

        .shopping-cart > table > thead > tr > th,
        .shopping-cart > table > thead > tr > td,
        .shopping-cart > table > tbody > tr > th,
        .shopping-cart > table > tbody > tr > td,
        .wishlist-table > table > thead > tr > th,
        .wishlist-table > table > thead > tr > td,
        .wishlist-table > table > tbody > tr > th,
        .wishlist-table > table > tbody > tr > td,
        .order-table > table > thead > tr > th,
        .order-table > table > thead > tr > td,
        .order-table > table > tbody > tr > th,
        .order-table > table > tbody > tr > td {
            vertical-align: middle !important
        }

        .shopping-cart > table thead th,
        .wishlist-table > table thead th,
        .order-table > table thead th {
            padding-top: 17px;
            padding-bottom: 17px;
            border-width: 1px
        }

        .shopping-cart .remove-from-cart,
        .wishlist-table .remove-from-cart,
        .order-table .remove-from-cart {
            display: inline-block;
            color: #ff5252;
            font-size: 18px;
            line-height: 1;
            text-decoration: none
        }

        .shopping-cart .count-input,
        .wishlist-table .count-input,
        .order-table .count-input {
            display: inline-block;
            width: 100%;
            width: 86px
        }

        .shopping-cart .product-item,
        .wishlist-table .product-item,
        .order-table .product-item {
            display: table;
            width: 100%;
            min-width: 150px;
            margin-top: 5px;
            margin-bottom: 3px
        }

        .shopping-cart .product-item .product-thumb,
        .shopping-cart .product-item .product-info,
        .wishlist-table .product-item .product-thumb,
        .wishlist-table .product-item .product-info,
        .order-table .product-item .product-thumb,
        .order-table .product-item .product-info {
            display: table-cell;
            vertical-align: top
        }

        .shopping-cart .product-item .product-thumb,
        .wishlist-table .product-item .product-thumb,
        .order-table .product-item .product-thumb {
            width: 130px;
            padding-right: 20px
        }

        .shopping-cart .product-item .product-thumb > img,
        .wishlist-table .product-item .product-thumb > img,
        .order-table .product-item .product-thumb > img {
            display: block;
            width: 100%
        }

        @media screen and (max-width: 860px) {
            .shopping-cart .product-item .product-thumb,
            .wishlist-table .product-item .product-thumb,
            .order-table .product-item .product-thumb {
                display: none
            }
        }

        .shopping-cart .product-item .product-info span,
        .wishlist-table .product-item .product-info span,
        .order-table .product-item .product-info span {
            display: block;
            font-size: 13px
        }

        .shopping-cart .product-item .product-info span > em,
        .wishlist-table .product-item .product-info span > em,
        .order-table .product-item .product-info span > em {
            font-weight: 500;
            font-style: normal
        }

        .shopping-cart .product-item .product-title,
        .wishlist-table .product-item .product-title,
        .order-table .product-item .product-title {
            margin-bottom: 6px;
            padding-top: 5px;
            font-size: 16px;
            font-weight: 500
        }

        .shopping-cart .product-item .product-title > a,
        .wishlist-table .product-item .product-title > a,
        .order-table .product-item .product-title > a {
            transition: color .3s;
            color: #374250;
            line-height: 1.5;
            text-decoration: none
        }

        .shopping-cart .product-item .product-title > a:hover,
        .wishlist-table .product-item .product-title > a:hover,
        .order-table .product-item .product-title > a:hover {
            color: #0da9ef
        }

        .shopping-cart .product-item .product-title small,
        .wishlist-table .product-item .product-title small,
        .order-table .product-item .product-title small {
            display: inline;
            margin-left: 6px;
            font-weight: 500
        }

        .wishlist-table .product-item .product-thumb {
            display: table-cell !important
        }

        @media screen and (max-width: 576px) {
            .wishlist-table .product-item .product-thumb {
                display: none !important
            }
        }

        .shopping-cart-footer {
            display: table;
            width: 100%;
            padding: 10px 0;
            border-top: 1px solid #e1e7ec
        }

        .shopping-cart-footer > .column {
            display: table-cell;
            padding: 5px 0;
            vertical-align: middle
        }

        .shopping-cart-footer > .column:last-child {
            text-align: right
        }

        .shopping-cart-footer > .column:last-child .btn {
            margin-right: 0;
            margin-left: 15px
        }

        @media (max-width: 768px) {
            .shopping-cart-footer > .column {
                display: block;
                width: 100%
            }

            .shopping-cart-footer > .column:last-child {
                text-align: center
            }

            .shopping-cart-footer > .column .btn {
                width: 100%;
                margin: 12px 0 !important
            }
        }

        .coupon-form .form-control {
            display: inline-block;
            width: 100%;
            max-width: 235px;
            margin-right: 12px;
        }

        .form-control-sm:not(textarea) {
            height: 36px;
        }


    </style>
</head>
<body>

<div class="container padding-bottom-3x mb-1">
    <!-- Alert-->
    <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span
            class="alert-close" data-dismiss="alert"></span>
        <h1>Giỏ hàng của bạn</h1></div>
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Giá tiền</th>
            </tr>
            </thead>
            <tbody>
            @php($products = session('cart') ?? $products = [] )
            @php($counts = session('count') ?? $counts = [] )
            @php($total=0 )
            @foreach( $products as $key => $product)
                <input type="hidden" value="{{$total += $counts[$key]*$product->price}}">
                <tr>
                    <td>
                        <div class="product-item">
                            <a class="product-thumb" href="#"><img src="{{ asset('storage/' . $product->image) }}"
                                                                   alt="Product"></a>
                            <div class="product-info">
                                <h4 class="product-title"><a href="#">{{ $product->name }}</a></h4><span><em>Size:</em>   </span>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="count-input">
                            <input type="number" class="form-control" value="{{$counts[$key]}}">
                        </div>
                    </td>
                    <td class="text-center text-lg text-medium">{{number_format($product->price)}}VND
                    </td>
                    <td class="text-center"><a class="remove-from-cart" href="{{route('remove',$key)}}"
                                               data-toggle="tooltip" title="" data-original-title="Remove item"><i
                                class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h4 style="color: #bd2130">Tổng tiền:{{ number_format($total)}} VND </h4>
    </div>
    <div class="shopping-cart-footer">
        <div class="column"><a class="btn btn-outline-secondary" href="{{route('home')}}"><i
                    class="icon-arrow-left"></i>&nbsp;Tiếp tục mua sắm</a></div>
        <div class="column"><a class="btn btn-success" href="{{route('check_out')}}">Mua hàng</a></div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
