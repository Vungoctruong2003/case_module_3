@extends('admin.layouts.master')
@section('content')
    @can('admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">VNT SHOP</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-borderless table-responsive card-1 p-4 table-hover ">
                                <thead>
                                <tr class="border-bottom">
                                    <th><span class="ml-2">STT</span></th>
                                    <th><span class="ml-2">Sản phẩm </span></th>
                                    <th><span class="ml-2"> Giá </span></th>
                                    <th><span class="ml-2">Thể loại</span></th>
                                    <th><span class="ml-2">Số lượng</span></th>
                                    <th><span class="ml-4">Action</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $key=>$product)
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="p-2"><span class="d-block font-weight-bold">{{$key+1}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 d-flex flex-row align-items-center mb-2"><img
                                                    src="{{ asset('storage/' . $product->image)}}" width="100"
                                                    height="60">
                                                <div class="d-flex flex-column ml-2"><span
                                                        class="d-block font-weight-bold">{{$product->name}}</span></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2"><span
                                                    class="font-weight-bold"> {{number_format($product->price)}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-2 d-flex flex-column">
                                                <span>{{$product->category->name}}</span></div>
                                        </td>
                                        <td>
                                            <div class="p-2"><span
                                                    class="font-weight-bold">{{$product->quantity}}</span></div>
                                        </td>
                                        <td><a href="{{ route('products.edit', $product->id) }}"
                                               class="btn btn-warning">sửa</a></td>
                                        <td><a href="{{ route('products.destroy', $product->id) }}"
                                               class="btn btn-danger"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$products->appends(request()->query())}}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    @endcan
@endsection
