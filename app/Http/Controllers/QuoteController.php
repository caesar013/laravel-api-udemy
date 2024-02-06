<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Http\Resources\QuoteResource;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return a list of quotes pagination
        // return QuoteResource::collection(Quote::all());
        // return a paginated list of quotes
        return QuoteResource::collection(Quote::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteRequest $request)
    {
        //
        return new QuoteResource(Quote::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        //
        return new QuoteResource($quote);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        //
        $quote->update($request->validated());
        return new QuoteResource($quote);

        // we can also use the tap function to update the quote
        // return new QuoteResource(tap($quote)->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
