@extends('admin.layouts.master')

@section('main-content')
    <section class="content-header">
        @if(Session::has('add_category'))
            <div class="alert alert-success">
                <p>{{ session('add_category') }}</p>
            </div>
        @endif
    </section>

    <section class="content">
        <section class="row">

        </section>
        <div class="card dark-mode">
            <div class="card-header border-transparent">
                <h3 class="card-title">دسته بندی ها</h3>
                <div class="card-tools text-left">
                    <a href="{{ route('categories.create') }}" class="btn btn-app">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>

            <div class="card-body p-0" style="display: block;">
                <div class="table-responsive" style="direction: rtl;">
                    <table class="table m-0">
                        <thead>
                        <tr>

                            <th>شناسه</th>
                            <th>عنوان</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                        <tr>

                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card-footer clearfix" style="display: block;">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>

        </div>
    </section>

@endsection
