
@extends('admin.layouts.master')
@section('content')
    @can('admin')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-image: url("https://image.freepik.com/free-vector/flat-geometric-background_23-2148957201.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%
        }

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
    </style>
</head>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <h5 class="text-center mb-4">Thêm mới sản phẩm</h5>
                <form class="form-card" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Tên
                                sản phẩm<span class="text-danger"> *</span></label> <input type="text" id="fname" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror"
                                                                                           name="name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Giá
                                sản phẩm<span class="text-danger"> *</span></label> <input type="number" id="lname" value="{{ old('price') }}" class="form-control  @error('price') is-invalid @enderror"
                                                                                           name="price">
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Thể
                                loại sản phẩm<span class="text-danger"> *</span></label> <select class="form-control @error('category_id') is-invalid @enderror"
                                                                                                 name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Số
                                lượng sản phẩm<span class="text-danger"> *</span></label> <input type="number" id="mob" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}"
                                                                                                 name="quantity">

                            @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Hình ảnh
                                sản phẩm<span class="text-danger"> *</span></label> <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" name="image" required>
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"><label class="form-control-label px-3">Mô tả
                                sản <span class="text-danger"> *</span></label> <input type="text"
                                                                                       class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"     name="description"
                                                                                       required>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn-block btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
    @endcan
@endsection
