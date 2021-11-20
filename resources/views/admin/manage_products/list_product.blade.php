@can('admin')
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
    <style>
        body {
            background-image: url("https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG9ubGluZSUyMHNob3BwaW5nfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80");
        }

        .card-1 {
            border: none;
            border-radius: 10px;
            width: 100%;
            background-color: #fff
        }

        .icons i {
            margin-left: 20px
        }

    </style>
</head>
<body>

<div class="container mt-5 card-body" id="1" >
    <table class="table table-borderless table-responsive card-1 p-4">
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
                    <div class="p-2"><span class="d-block font-weight-bold">{{$key+1}}</span></div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2"><img
                            src="{{ asset('storage/' . $product->image)}}" width="100" height="60">
                        <div class="d-flex flex-column ml-2"><span
                                class="d-block font-weight-bold">{{$product->name}}</span></div>
                    </div>
                </td>
                <td>
                    <div class="p-2"><span class="font-weight-bold"> {{number_format($product->price)}} </span></div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-column"><span>{{$product->category->name}}</span></div>
                </td>
                <td>
                    <div class="p-2"><span class="font-weight-bold">{{$product->quantity}}</span></div>
                </td>
                <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">sửa</a></td>
                <td><a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger"
                       onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
@endcan
