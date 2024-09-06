<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\order;
use App\Models\orderdatail;
class cartController extends Controller
{
    public function cart()
    {

        $user_id = auth()->user()->id;
        $cartproduct =  Cart::with('Product')->where('user_id', $user_id)->get();
        return view('/cart', ['cartproduct' => $cartproduct]);
    }
    public  function addcart($productid)
    {
        $user_id = auth()->user()->id;
        $resalt = Cart::with('Product')->where('user_id', $user_id)->where('product_id', $productid)->get();
        if ($resalt->count() > 0) {
            $resalt->first()->quantity += 1;
            $resalt->first()->save();
            return redirect('/cart');
        } else {
            $newcart = new Cart();
            $newcart->product_id = $productid;
            $newcart->quantity = 1;
            $newcart->user_id = auth()->user()->id;
            $newcart->save();
            return redirect('/cart');
        }
    }

    public function increaseQuantity($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        }

        return redirect()->back();
    }

    public function decreaseQuantity($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        } elseif ($cartItem && $cartItem->quantity == 1) {
            $cartItem->delete(); // حذف العنصر من السلة إذا كان الكمية 1
        }

        return redirect()->back();
    }


    public function completeorder(){
        $user_id = auth()->user()->id;
        $cartproduct =  Cart::with('Product')->where('user_id', $user_id)->get();
return view('completeorder' , ['cartproduct' => $cartproduct]);
    }
    public function StorOrder(Request $request)
    {
        $user_id = auth()->user()->id;

        // إنشاء الطلب الجديد
        $newOrder = new Order();
        $newOrder->name = $request->name;
        $newOrder->email = $request->email;
        $newOrder->address = $request->address;
        $newOrder->phone = $request->phone;
        $newOrder->note = $request->note;
        $newOrder->user_id = $user_id;
        $newOrder->save();


        $cartProducts = Cart::with('product')->where('user_id', $user_id)->get();

        foreach ($cartProducts as $item) {

            $newOrderDetail = new orderdatail();
            $newOrderDetail->product_id = $item->product_id;
            $newOrderDetail->price = $item->product->price;
            $newOrderDetail->name = $item->product->name;
            $newOrderDetail->quantity = $item->quantity;
            $newOrderDetail->order_id = $newOrder->id;
            $newOrderDetail->save();
        }


        Cart::where('user_id', $user_id)->delete();


        return redirect('/');
    }

    public function deletorder($orderId)
    {
        // البحث عن الطلب المطلوب
        $order = Order::find($orderId);

        if (!$order) {
            // إذا لم يتم العثور على الطلب، يمكن إعادة توجيه المستخدم برسالة
            return redirect()->back()->with('error', 'Order not found.');
        }

        // حذف تفاصيل الطلب المرتبطة
        $order->orderDetails()->delete();

        // حذف الطلب نفسه
        $order->delete();

        // إعادة توجيه المستخدم مع رسالة نجاح
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

    public function orderdatail()
{
    return $this->hasMany(orderdatail::class, 'order_id');
}

}
