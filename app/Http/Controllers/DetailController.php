<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DetailRequest;
use App\Detail;
use App\Product;

class DetailController extends Controller
{
    

    public function index()
    {
    	$data['products'] = Detail::with(['product'])->get()->toArray();
    	//dd($data);
    	return view('details.index',$data);
    }

    public function store($id){
    	
    	$result = Detail::where('product_id', $id)->first();

    	if (is_null($result)){
	    	$product = Product::find($id);
	    	$detail = new Detail;
	    	$detail->product_id = $id;
	    	$detail->quantity = 1;
	    	$detail->price = $product->price;

	    	$detail->save();
    	}

		return redirect()->route('detail.index');
    }

    public function update(DetailRequest $request, $id)
    {
    	$detail = Detail::find($id);
    	$detail->quantity = $request->get('quantity');
    	$detail->save();

    	return redirect()->route('detail.index');
    }

    public function destroy($id)
    {
        $detail = Detail::find($id);
        $detail->delete();

        return redirect()->route('detail.index');
    }
}
