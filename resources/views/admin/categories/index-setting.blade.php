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
                <h3 class="card-title">تایین ویژگی های دسته بندیه {{$category->name}}</h3>
                <div class="card-tools text-left">

                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/administrator/categories">
                            @csrf
                            <div class="form-group">
                                <label for="name">ویژگی ها</label>
                                <select type="text" id="parent_id" name="parent_id" class="form-control">
                                    @foreach($attributesGroup as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->title }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>


            </div>



        </div>
    </section>

@endsection
