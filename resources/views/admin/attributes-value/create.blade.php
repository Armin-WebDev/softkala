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
                <h3 class="card-title">ایجاد ویژگی جدید</h3>
                <div class="card-tools text-left">

                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/administrator/attributes-value">
                            @csrf
                            <div class="form-group">
                                <label for="name">عنوان مقدار </label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="عنوان مقدار ویژگی را وارد کنید..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">نوع ویژگی</label>
                                <select type="text" id="attribute_group" name="attribute_group" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                @foreach($attributesGroup as $attribute )
                                        <option value="{{$attribute->id}}">{{$attribute->title}}</option>
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
