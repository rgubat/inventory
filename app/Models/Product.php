<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function process_products(Request $request){
        $this->validate($request,[
            'code'  => 'required|min:3',
            'product_name'  => 'required|min:3'
        ]);

        $product_data = array(
            'product_code'     => $request->get('code'),
            'prduct_name'  => $request->get('product_name')
        );
        DB::beginTransaction();
        DB::insert('insert into inventory.products (product_code, prduct_name) values (?, ?)', $product_data);
        DB::commit();
    }
}
