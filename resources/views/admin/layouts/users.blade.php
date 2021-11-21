
@extends('admin.layouts.master')
@section('content')
    @can('admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Người dùng</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">VNT SHOP</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-borderless table-responsive card-1 p-4 table-hover ">
                            <thead class="thead-dark">
                            <tr class="border-bottom">
                                <th><span class="ml-2">STT</span></th>
                                <th><span class="ml-2">Người dùng </span></th>
                                <th><span class="ml-2"> Email</span></th>
                                <th><span class="ml-4">Thao tác</span></th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr class="border-bottom">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('admin.delete_user', $user->id)}}" class="btn btn-danger"
                                           onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->appends(request()->query())}}
                    </div>
                </div>
            </div>
        </main>
    </div>
    @endcan
@endsection
