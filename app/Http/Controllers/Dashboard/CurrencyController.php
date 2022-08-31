<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        return view('admin.currency.index')->with(['title' => 'Currencies']);
    }

    public function create()
    {
        return view('admin.currency.create')->with(['title' => 'Add new currency']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('admin.currency.show')->with(['title' => 'View currency']);
    }

    public function edit(Currency $currency)
    {
        return view('admin.currency.edit', compact('currency'))->with(['title' => 'Update currency']);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
