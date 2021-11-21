
@extends('admin.layouts.master')
@section('content')
    @can('admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Thể loại</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">VNT SHOP</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-borderless table-responsive card-1 p-4 table-hover ">
                            <thead class="thead-dark">
                            <tr class="border-bottom">
                                <th><span class="ml-2">STT</span></th>
                                <th><span class="ml-2">Tên thể loại </span></th>
                                <th><span class="ml-2">Số sản phẩm </span></th>
                                <th><span class="ml-4 col-4"  >Action</span></th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$category)
                                <tr class="border-bottom">
                                    <td>
                                        <div class="p-2"><span class="d-block font-weight-bold">{{$key+1}}</span></div>
                                    </td>
                                    <td>
                                        <div class="p-2 d-flex flex-column"><span>{{$category->name}}</span></div>
                                    </td>
                                    <td>
                                        <div class="p-2 d-flex flex-column"><span>{{ count($category->products) }}</span></div>
                                    </td>
                                    <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">sửa</a></td>
                                    <td><a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger"
                                           onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->appends(request()->query())}}

                    </div>
                </div>
            </div>
        </main>
    </div>
    @endcan
@endsection
