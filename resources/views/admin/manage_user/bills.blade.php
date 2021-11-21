@extends('admin.layouts.master')
@section('content')
    @can('admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Đơn hàng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">VNT SHOP</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-borderless table-responsive card-1 p-4 table-hover ">
                                <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên người mua</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Số sản phẩm đã mua</th>
                                    <th scope="col">Số tiền đã mua</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($bills as $key => $bill)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$bill->user_name}}</td>
                                        <td>{{$bill->phone_number}}</td>
                                        <td>{{$bill->address}}</td>
                                        <td>{{$bill->product_quantity}}</td>
                                        <td>{{$bill->total_price}}</td>
                                        <td><a href="{{ route('admin.delete_bill', $bill->id) }}"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                    class="fa fa-trash"
                                                    aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$bills->appends(request()->query())}}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    @endcan
@endsection
