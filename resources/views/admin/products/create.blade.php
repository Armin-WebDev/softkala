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
                <h3 class="card-title">ایجاد محصول جدید</h3>
                <div class="card-tools text-left">

                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/administrator/products">
                            @csrf
                            <div class="form-group">
                                <label for="name">عنوان محصول</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="عنوان محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">توضیحات محصول</label>
                                <textarea type="text" id="textareaDescription" name="description" class="ckeditor form-control" rows="4" cols="50" placeholder="متا توضیحات دسته بندی را وارد کنید..." required="" style="resize: none"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار محصول</label>
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="نام مستعار محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت محصول</label>
                                <input type="number" id="price" name="price" class="form-control" placeholder="نام مستعار محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">قیمت تخفیف خورده محصول</label>
                                <input type="number" id="discount_price" name="discount_price" class="form-control" placeholder="نام مستعار محصول را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="photo">تصویر</label>
                                <input type="hidden" name="photo_id[]" id="brand-photo">
                                <div class="dropzone" id="dropzone"></div>
                            </div>


                            <div class="form-group">
                                <label for="name">دسته بندی والد</label>
                                <select type="text" id="parent_id" name="parent_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @if(count($category->childrenRecursive) > 0)
                                            @foreach($category->childrenRecursive as $sub_category)
                                                <option value="{{ $sub_category->id }}">-------{{ $sub_category->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">وضعیت محصول</label>
                                <select type="text" id="status" name="status" class="form-control">
                                    <option value="0">منتشر نشده</option>
                                    <option value="1">منتشر شده</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>


            </div>



        </div>
    </section>
    <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>


@endsection
