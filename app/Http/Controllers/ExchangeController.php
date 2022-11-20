<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExchangeRequest;
use App\Models\Exchange;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $exchanges = Auth::user()->exchanges()->latest()->paginate();

        return view('pages.panel.exchanges.indexExchange', compact('exchanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.panel.exchanges.createExchange');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExchangeRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ExchangeRequest $request): RedirectResponse
    {
        Auth::user()->exchanges()->create($request->validated());

        toast(__('The exchange successfully created.'), 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Exchange $exchange
     *
     * @return View
     */
    public function show(Exchange $exchange): View
    {
        return view('pages.panel.exchanges.showExchange', compact('exchange'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Exchange $exchange
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Exchange                 $exchange
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exchange $exchange
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
    }
}
