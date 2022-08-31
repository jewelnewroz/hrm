@extends('madmin.layout._layout')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Edit Role</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

        </div>

    </div>

</div>


@if ( $errors->has('permission') )

    <div class="alert alert-danger">

        {{ $errors->first('permission') }}

    </div>

@endif


<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    {{ method_field('PUT') }}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Name:</strong>

            <input type="text" name="name" class="form-control" value="{{ $role->name }}">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Permission:</strong>

            <br/>

            @foreach($permission as $value)

                <label><input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name" @if( in_array($value->id, $rolePermissions ) ) checked @endif">

                {{ $value->name }}</label>

            <br/>

            @endforeach

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>

</form>


@endsection