@extends('layouts.public')
@php
   $categories = \App\Models\categories::all();
@endphp

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Item</div>

                    <div class="card-body">
                        {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'PATCH']) !!}
                        {{ Form::label('item', 'Item: ') }}
                        {{ Form::text('item', null, ['class' => 'form-control', 'style' => '', 'id' => 'item']) }}
                        {{ Form::label('description', 'Add description') }}
                        {{ Form::text('description', null, ['class' => 'form-control', 'style' => '', 'id' => 'description']) }}
                        {{ Form::label('price', 'Add price') }}
                        {{ Form::text('price', null, ['class' => 'form-control', 'style' => '', 'id' => 'price']) }}
                        {{ Form::label('quantity', 'Add quantity') }}
                        {{ Form::text('quantity', null, ['class' => 'form-control', 'style' => '', 'id' => 'quantity']) }}
                        {{ Form::label('sku', 'Add sku') }}
                        {{ Form::text('sku', null, ['class' => 'form-control', 'style' => '', 'id' => 'sku']) }}
                        {{ Form::label('picture', 'Add picture') }}
                        {{ Form::text('picture', null, ['class' => 'form-control', 'style' => '', 'id' => 'picture']) }}
                        {{ Form::label('categories_id', 'Category') }}
                        <select class="form-control" id="categories_id" name="categories_id" required focus>
                                <option value="" disabled selected>Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                        </select>
                        {{ Form::submit('Save item', ['class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top:20px']) }}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

@section('css')
@endsection