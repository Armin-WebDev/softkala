@extends('admin.layouts.master')

@section('main-content')
    <section class="content-header">
        @if(Session::has('add_category'))
            <div class="alert alert-success">
                <p>{{ session('add_category') }}</p>
            </div>
        @endif
        @if(Session::has('update_category'))
            <div class="alert alert-success">
                <p>{{ session('update_category') }}</p>
            </div>
        @endif
        @if(Session::has('error_category'))
            <div class="alert alert-error">
                <p>{{ session('error_category') }}</p>
            </div>
        @endif
        @if(Session::has('delete_category'))
            <div class="alert alert-danger">
                <p>{{ session('delete_category') }}</p>
            </div>
        @endif
    </section>

    <section class="content">
        <section class="row">

        </section>
        <div class="card dark-mode">
            <div class="card-header border-transparent">
                <h3 class="card-title">ویژگی ها</h3>
                <div class="card-tools text-left">
                    <a href="{{ route('attributes-group.create') }}" class="btn btn-app">
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
                            <th class="text-center">نوع</th>
                            <th class="text-center">عملیات</th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach($attributesGroup as $attribute)

                            <tr>

                                <td class="text-center"> {{ $attribute->id }}</td>
                                <td>{{ $attribute->name }}</td>
                                <td>{{ $attribute->type }}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{ route('categories.edit' , $attribute->id) }}">ویرایش</a>
                                    <div style="display: inline-block">
                                        <form method="post" action="/administrator/categories/{{$attribute->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </div>

                                </td>

                            </tr>
                            @if(count($category->childrenRecursive) > 0)
                                @foreach($category->childrenRecursive as $sub_category)
                                    <tr>
                                        <td class="text-center"> {{ $sub_category->id }}</td>
                                        <td>--------------> {{ $sub_category->name }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" href="{{ route('categories.edit' , $sub_category->id) }}">ویرایش</a>
                                            <div style="display: inline-block">
                                                <form method="post" action="/administrator/categories/{{$sub_category->id}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </section>

@endsection
