@extends('layouts.app')

@section('content')

    <article class="content items-list-page">
        <div class="card items">

            <div class="col-sm-12">
                <div class="clearfix"></div>
                <div class="box" style="padding:15px 0;">
                    <form action="{{ route('currency.update', $currency->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-sm-5">
                            <div class="form-group float-label-control">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name', $currency->name) }}" placeholder="Name" required>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group float-label-control">
                                <label for="">Symbol</label>
                                <input name="symbol" class="form-control @if($errors->has('symbol')) is-invalid @endif" value="{{ old('symbol', $currency->symbol) }}" placeholder="Exp. $" required>
                                @if($errors->has('symbol'))
                                    <div class="invalid-feedback" style="display:block;">
                                        {{ $errors->first('symbol') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group float-label-control">
                                <button class="btn btn-primary btn-block" type="submit">Save</button>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div><!--/col-->
            <div class="clearfix"></div>
        </div>
    </article>
@endsection

@section('header')
@endsection

@section('footer')
    <script>

    </script>
@endsection
