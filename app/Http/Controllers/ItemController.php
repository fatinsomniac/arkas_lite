<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index', [
            // 'item'  => new Item,
            'items' => Item::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(ItemRequest $request)
    {
        $uuid = strtolower(Str::uuid(32));

        Item::create([
            'uuid'          => $uuid,
            'item_code'     => $request->item_code,
            'item_name'     => $request->item_name,
            'item_category' => $request->item_category,
            'price'         => $request->price,
        ]);

        return back()->with('success', 'Data anda berhasil disimpan.');
    }

    public function edit($uuid)
    {
        $item = Item::where('uuid', $uuid)->first();

        return view('items.edit', [
            'item' => $item
        ]);
    }

    public function update(ItemRequest $request, $uuid)
    {
        Item::where('uuid', $uuid)->update([
            'item_code'     => $request->item_code,
            'item_name'     => $request->item_name,
            'item_category' => $request->item_category,
            'price'         => $request->price,
        ]);

        return redirect('items')->with('update', 'Data berhasil diupdate.');
    }

    public function destroy($uuid)
    {
        Item::where('uuid', $uuid)->delete();

        return back()->with('delete', 'Data berhasil dihapus.');
    }
}
