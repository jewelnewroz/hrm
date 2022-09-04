<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Services\CurrencyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CurrencyController extends Controller
{
    private CurrencyService $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        return view('admin.currency.index')->with(['title' => 'Currencies']);
    }

    public function create()
    {
        return view('admin.currency.create')->with(['title' => 'Add new currency']);
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $this->currencyService->create($request);
        } catch (\Exception $exception) {
            Log::error($exception);
        }

        return redirect()->back()->withInput($request->all());
    }

    public function show($id)
    {
        return view('admin.currency.show')->with(['title' => 'View currency']);
    }

    public function edit(Currency $currency)
    {
        return view('admin.currency.edit', compact('currency'))->with(['title' => 'Update currency']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $this->currencyService->update($request, $id);
        } catch (\Exception $exception) {
            Log::error($exception);
        }
        return redirect()->back()->withInput($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
