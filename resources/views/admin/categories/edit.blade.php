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
                <h3 class="card-title">ویرایش دسته بندی {{ $category->name }}</h3>
                <div class="card-tools text-left">

                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('/administrator/categories/{category}/edit', $category->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام دسته بندی</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required="">
                            </div>
                            <div class="form-group">
                                <label for="name">دسته بندی والد</label>
                                <select type="text" id="parent_id" name="parent_id" class="form-control">
                                    @if($category->parent_id == null)
                                        <option value="">بدون والد</option>
                                    @endif
                                        @foreach($categories as $category_data)
                                            <option value="{{ $category_data->id }}" @if($category->parent_id == $category_data->id) selected @endif>{{ $category_data->name }}</option>

                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">متا توضیحات</label>
                                <textarea type="text" id="meta_description" name="meta_description" class="form-control" rows="4" cols="50" placeholder="متا توضیحات دسته بندی را وارد کنید..." required="" style="resize: none">{{$category->meta_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">متا کلمات کلیدی</label>
                                <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" value="{{ $category->meta_keywords }}"required="">
                            </div>
                            <button type="submit" class="btn btn-primary pull-left">ویرایش</button>
                        </form>
                    </div>
                </div>


            </div>



        </div>
    </section>

@endsection
