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
                <h3 class="card-title">ایجاد دسته بندی جدید</h3>
                <div class="card-tools text-left">

                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/administrator/categories">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام دسته بندی</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="عنوان دسته بندی را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">متا توضیحات</label>
                                <textarea type="text" id="meta_description" name="meta_description" class="form-control" rows="4" cols="50" placeholder="متا توضیحات دسته بندی را وارد کنید..." required="" style="resize: none"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">متا کلمات کلیدی</label>
                                <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی دسته بندی را وارد کنید..." required="">
                            </div>
                            <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>


            </div>



        </div>
    </section>

@endsection
