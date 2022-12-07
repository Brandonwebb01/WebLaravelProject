@extends('layouts.public')

@section('content')
    @php
        //dd($companies);
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        @php
                            //dd($companies);
                        @endphp
                        <h1 class="pull-right"><a href='/categories/create' class='btn btn-info' role='button' href="categories/create">+ Add New</a>
                        </h1>
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Categories</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        {{-- 
 <td>@foreach ($company->series as $series)
 $series->name . ', '
 @endforeach
 </td>
 --}}
                                        <td>
                                            <div style="float:left;"><a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a></div>
                                            <div style="float:left; margin-left:5px">
                                                {!! Form::open([
                                                    'route' => ['categories.destroy', $category->id],
                                                    'method' => 'DELETE',
                                                    'onsubmit' => 'return confirm("Delete category? Are you sure?")',
                                                ]) !!}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                                                {!! Form::close() !!}
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@endsection

@section('css')
    <style>
        p {}
    </style>
@endsection
