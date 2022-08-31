@extends('layouts.app')

@section('content')
    <article class="content items-list-page">
        <div class="card items" style="padding: 15px">
            <div class="box">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th><div>ID#</div></th>
                        <th><div>Name</div></th>
                        <th><div>Symbol</div></th>
                        <th style="width:135px;v-align:middle;text-align:center;" class="align-middle"><div><i class="fa fa-wrench"></i></div></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($currencies->count())
                        @foreach( $currencies as $currency )
                            <tr>
                                <td>{{ $currency->id }}</td>
                                <td>{{ $currency->name }}</td>
                                <td>{{ $currency->symbol }}</td>
                                <td>
                                    <a href="{{ route('currency.edit', $currency->id)}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">Sorry! no currency found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </article>
@endsection

@section('header')
    <style type="text/css">
        .sidebar-title {
            margin: 0;
        }
        hr {
            margin: 10px 0;
        }
    </style>
@endsection

@section('footer')

@endsection
