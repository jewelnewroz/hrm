@extends('madmin.layout._layout')

@section('content')

    <article class="content items-list-page">
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title"> {{ $title }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="items-search">
                <a href="{{ route('currency.index') }}" class="btn btn-secondary btn-sm rounded-s"><i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>
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
    <style type="text/css">
        /*search box css start here*/
        .list-search-btn {
            font-size: 23px;
        }
        .table-avatar {
            max-width: 50px;
        }
        .search-sec{
            padding: 2rem;
        }
        .search-slt{
            display: block;
            width: 100%;
            font-size: 1.5rem;
            line-height: 1.5;
            color: #55595c;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            height: calc(3rem + 2px) !important;
            border-radius:0;
        }
        .wrn-btn{
            width: 100%;
            font-size: 16px;
            font-weight: 400;
            text-transform: capitalize;
            height: calc(3rem + 2px) !important;
            border-radius:0;
        }
        @media (min-width: 992px){
            .search-sec{
                position: relative;
                top: -114px;
                background: rgba(26, 70, 104, 0.51);
            }
        }

        @media (max-width: 992px){
            .search-sec{
                background: #1A4668;
            }
        }
    </style>
@endsection

@section('footer')
    <script>

    </script>
@endsection
