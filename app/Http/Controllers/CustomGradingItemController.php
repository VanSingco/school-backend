<?php

namespace App\Http\Controllers;

use App\Actions\CustomGradingItemAction\CustomGradingItemChangeOrder;
use App\Actions\CustomGradingItemAction\CustomGradingItemCreate;
use App\Actions\CustomGradingItemAction\CustomGradingItemDelete;
use App\Actions\CustomGradingItemAction\CustomGradingItemList;
use App\Actions\CustomGradingItemAction\CustomGradingItemShow;
use App\Actions\CustomGradingItemAction\CustomGradingItemUpdate;
use App\Models\CustomGradingItem;
use Illuminate\Http\Request;

class CustomGradingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json(CustomGradingItemList::run($request), 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(CustomGradingItemCreate::run($request), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(CustomGradingItemShow::run($id), 200);
    }

    public function changeOrder(Request $request)
    {
        return response()->json(CustomGradingItemChangeOrder::run($request));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(CustomGradingItemUpdate::run($id, $request), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json(CustomGradingItemDelete::run($id), 200);
    }
}
