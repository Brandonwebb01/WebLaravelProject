@extends('layouts.public')

@section('content')
    @php
        //dd($companies);
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Items</div>

                    <div class="card-body">
                        @php
                            //dd($companies);
                        @endphp
                        <h1 class="pull-right"><a href='/items/create' class='btn btn-info' role='button' href="items/create">+ Add New</a>
                        </h1>
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Item</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->item_title }}</td>
                                        <td>
                                            <div style="float:left;"><a href="{{ route('items.edit', $item->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a></div>
                                            <div style="float:left; margin-left:5px">
                                                {!! Form::open([
                                                    'route' => ['items.destroy', $item->id],
                                                    'method' => 'DELETE',
                                                    'onsubmit' => 'return confirm("Delete items? Are you sure?")',
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