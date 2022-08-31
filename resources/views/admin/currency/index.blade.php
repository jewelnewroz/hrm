@extends('madmin.layout._layout')

@section('content')
    <article class="content items-list-page">
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title"> {{ $title ?? '' }} <a href="{{ route('currency.create')}}" class="btn btn-primary btn-sm rounded-s"> Add New </a>
                            <div class="action dropdown">
                                <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-file-export icon"></i> Export</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-file-import icon"></i> Import</a>
                                </div>
                            </div>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="items-search" id="customFilters">
            </div>
        </div>
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
                    @if($currencyLists->count())
                        @foreach( $currencyLists as $currency )
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
