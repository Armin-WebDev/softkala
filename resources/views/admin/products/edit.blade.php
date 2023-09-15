@extends('admin.layouts.master')

@section('main-content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <section class="row">

        </section>
        <div class="card dark-mode">
            <div class="card-header border-transparent">
                <h3 class="card-title">ویرایش محصول {{ $product->title }}</h3>
                <div class="card-tools text-left">

                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/administrator/products/{{$product->id}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="name">عنوان محصول</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{$product->title}}" placeholder="عنوان محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">توضیحات محصول</label>
                                <textarea type="text" id="description" name="description" class="ckeditor form-control" rows="4" cols="50" placeholder="متا توضیحات دسته بندی را وارد کنید..." required="" style="resize: none">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار محصول</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{$product->slug}}" placeholder="نام مستعار محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت محصول</label>
                                <input type="number" id="price" name="price" class="form-control" value="{{$product->price}}" placeholder="نام مستعار محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">قیمت تخفیف خورده محصول</label>
                                <input type="number" id="discount_price" name="discount_price" class="form-control" value="{{$product->discount_price}}" placeholder="نام مستعار محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="photo">تصویر</label>
                                <input type="file" name="photo_id" id="product-photo">
                                <div class="row">
                                    @foreach($product->photos as $photo)
                                    <div class="col-sm-3">
                                        <img src="{{$photo->path}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">دسته بندی </label>
                                <select type="text" id="categories" name="categories[]" class="form-control" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if(in_array($category->id,$product->categories->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
                                        @if(count($category->childrenRecursive) > 0)
                                            @foreach($category->childrenRecursive as $sub_category)
                                                <option value="{{ $sub_category->id }}" @if(in_array($sub_category->id,$product->categories->pluck('id')->toArray())) selected @endif>-------{{ $sub_category->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">وضعیت محصول</label>
                                <select type="text" id="status" name="status" class="form-control">
                                    <option value="0" @if($product->status == 0) selected @endif>منتشر نشده</option>
                                    <option value="1" @if($product->status == 1) selected @endif>منتشر شده</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>


            </div>



        </div>
    </section>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    {{--    <script type="text/javascript">--}}

    {{--        Dropzone.autoDiscover = false;--}}

    {{--        $(document).ready(function () {--}}
    {{--            $("#id_dropzone").dropzone({--}}
    {{--                maxFiles: 2000,--}}
    {{--                url: "/ajax_file_upload_handler/",--}}
    {{--                success: function (file, response) {--}}
    {{--                    console.log(response);--}}
    {{--                }--}}
    {{--            });--}}
    {{--        })--}}

    {{--    </script>--}}
@endsection
