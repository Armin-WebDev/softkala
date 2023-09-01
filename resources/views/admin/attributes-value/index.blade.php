@extends('admin.layouts.master')

@section('main-content')
    <section class="content-header">
        @if(Session::has('add_value'))
            <div class="alert alert-success">
                <p>{{ session('add_value') }}</p>
            </div>
        @endif
            @if(Session::has('update_value'))
                <div class="alert alert-success">
                    <p>{{ session('update_value') }}</p>
                </div>
            @endif
            @if(Session::has('delete_attribute'))
                <div class="alert alert-danger">
                    <p>{{ session('delete_attribute') }}</p>
                </div>
            @endif
    </section>

    <section class="content">
        <section class="row">

        </section>
        <div class="card dark-mode">
            <div class="card-header border-transparent">
                <h3 class="card-title">مقدار ویژگی ها</h3>
                <div class="card-tools text-left">
                    <a href="{{ route('attributes-value.create') }}" class="btn btn-app">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="table-responsive" style="direction: rtl;">
                    <table class="table m-0">
                        <thead>
                        <tr>

                            <th class="text-center">شناسه</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">ویژگی</th>
                            <th class="text-center">عملیات</th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach($attributesValue as $attribute)

                            <tr>

                                <td class="text-center"> {{ $attribute->id }}</td>
                                <td class="text-center">{{ $attribute->name }}</td>
                                <td class="text-center">{{ $attribute->attributeGroup->title }}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{ route('attributes-value.edit' , $attribute->id) }}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/attributes-value/{{$attribute->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </div>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </section>

@endsection
