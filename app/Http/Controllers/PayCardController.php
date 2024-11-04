<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;
use App\Models\Cart;
use App\Models\Product;
use DB;
class PayCardController extends Controller
{
    public function payment()
    {
        $cart = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get()->toArray();
        
        $data = [];
        
        // return $cart;
        $data['items'] = array_map(function ($item) use($cart) {
            $name=Product::where('id',$item['product_id'])->pluck('title');
            return [
                'name' =>$name ,
                'price' => $item['price'],
                'desc'  => 'Vă mulțumim pentru achiziție!',
                'qty' => $item['quantity']
            ];
        }, $cart);

        $data['invoice_id'] ='ORD-'.strtoupper(uniqid());
        $data['invoice_description'] = "Comanda #{$data['invoice_id']} Factură";
      

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;
        if(session('coupon')){
            $data['shipping_discount'] = session('coupon')['value'];
        }
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => session()->get('id')]);

        // Afișează un mesaj de confirmare pentru plata cu cardul
        request()->session()->flash('success', 'Vă mulțumim pentru achiziție! Comanda dvs. a fost plasată cu succes.');

        // Golește sesiunile pentru coș și cupon după finalizarea comenzii
        session()->forget('cart');
        session()->forget('coupon');

        // Redirecționează utilizatorul la pagina de acasă
        return redirect()->route('home');
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
       
        request()->session()->flash('error', 'Plata dvs. a fost anulată. Puteți încerca din nou!');

        return redirect()->route('home');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
       
    }
}
