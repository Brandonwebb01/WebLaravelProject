@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a Category</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
                        {{ Form::label('categories', 'Add categories') }}
                        {{ Form::text('categories', null, ['class' => 'form-control', 'style' => '', 'id' => 'categories']) }}
                        {{ Form::submit('Add categories', ['class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top:20px']) }}
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
