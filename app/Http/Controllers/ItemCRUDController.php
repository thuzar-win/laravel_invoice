<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Item;

class ItemCRUDController extends Controller
{
    public function index(Request $request)
    {
        $search=$request->get('search');
        $items = Item::where('invoice_name','like','%'.$search.'%')->orderBy('id','ASC')->paginate(5);

        return view('ItemCRUD.index',['items'=>$items]);
    }

    public function create()
    {
        return view('ItemCRUD.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'invoice_name' => 'required',

            'item_name' => 'required',

            'price' => 'required',

            'qty' => 'required',

            'tax' => 'required',

        ]);

        Item::create($request->all());

        return redirect()->route('itemCRUD.index')

                        ->with('success','Item created successfully');
    }

    public function show($id)
    {
        $item = Item::find($id);

        return view('ItemCRUD.show',compact('item'));

    }

    public function edit($id)
    {
        $item = Item::find($id);

        return view('ItemCRUD.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

                      'invoice_name' => 'required',

                      'item_name' => 'required',

                      'price' => 'required',

                      'qty' => 'required',

                      'tax' => 'required',

        ]);

        Item::find($id)->update($request->all());

        return redirect()->route('itemCRUD.index')

                        ->with('success','Item updated successfully');

    }

    public function destroy($id)
    {
        Item::find($id)->delete();

        return redirect()->route('itemCRUD.index')

                        ->with('success','Item deleted successfully');
    }

}
