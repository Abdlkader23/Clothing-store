<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\varieties;
use App\Models\product;
use App\Models\addProductimg;
use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public  function GetCtgoryProduct($catid = null)
    {
        if ($catid) {
            $result =  product::where('category_id', $catid)->get();
            return view('product', ['product' => $result]);
        } else {
            $result = Product::all();
            return view('product', ['product' => $result]);
        };
    }

    public function GetCategoryWhsesProduct()
    {
        $varieties = varieties::all();
        $product = product::all();
        return view('varieties', ['varieties' => $varieties, 'product' => $product]);
    }

    public function addProduct()
    {
        if (Auth::check()) {
            $varieties = varieties::all();
            return view('products.addProduct', ['varieties' => $varieties]);
        } else {
            return redirect()->route('login')->with('message', 'Please login to add a product.');
        }
    }

    public function editproduct($productid = null)
    {
        if (Auth::check()) {
            if ($productid != null) {
                $varieties = varieties::all();
                $currenproduct = product::find($productid);
                return view('products.editproduct', ['product' => $currenproduct, 'varieties' => $varieties]);
            } else {
                return redirect('products.addProduct');
            }
        } else {
            return redirect()->route('login')->with('message', 'Please login to add a product.');
        }
    }

    public function search(Request $request)
    {
        $product = product::where('name', 'like', '%' . $request->searchkay . '%')->get();

        return view('product', ['product' => $product]);
    }

    public function deletproduct($productid = null)
    {
        if ($productid != null) {
            $currenproduct = product::find($productid);
            $currenproduct->delete();
            return redirect()->back();
        } else {
            abort(404 . 'plasse enter product id in the route');
        }
    }

    public function removeproductimag($productid = null)
    {
        if ($productid != null) {
            $photo = addProductimg::find($productid);
            $photo->delete();
            return redirect()->back();
        } else {
            abort(404 . 'plasse enter product id in the route');
        }
    }

    public function Addproductstor(Request $request)

    {

        if ($request->id) {
            $updet = Product::find($request->id);
            $updet->name = $request->name;
            $updet->price = $request->price;
            $updet->quantity = $request->quantity;
            $updet->description = $request->description;

            // التحقق من وجود صورة جديدة للتحديث
            if ($request->hasFile('imagpath')) {
                $path = $request->file('imagpath')->move(
                    'uploads',
                    Str::uuid()->toString() . '-' . $request->file('imagpath')->getClientOriginalName()
                );
                $updet->imagpath = $path;
            }

            $updet->category_id = $request->category_id;
            $updet->save();
            return redirect('product');
        } else {
            $request->validate([
                'name' => ['required', 'unique:products', 'max:50'],
                'price' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'imagpath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required| ',
            ]);

            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->quantity = $request->quantity;
            $newProduct->description = $request->description;
            $newProduct->category_id = $request->category_id;

            // حفظ الصورة الجديدة
            $path = $request->file('imagpath')->move(
                'uploads',
                Str::uuid()->toString() . '-' . $request->file('imagpath')->getClientOriginalName()
            );
            $newProduct->imagpath = $path;

            $newProduct->save();
            return redirect('product');
        }

    }
        public function addproductimg($productid)
    {
        $product = product::find($productid);
        $porductimage = addProductimg::where('product_id', $productid)->get();
        return view('products.addproductimg',  ['product' => $product, 'porductimage' => $porductimage]);
    }





    public function storproductimag(Request $request)

    {
        $request->validate([
            'product_id' => 'required',
            'imag' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photo = new addProductimg();
        $photo->product_id = $request->product_id;

        if ($request->hasFile('imag')) { // تأكد من استخدام hasFile للتحقق من وجود الصورة

            $path = $request->file('imag')->move(
                'uploads',
                Str::uuid()->toString() . '-' . $request->file('imag')->getClientOriginalName()
            );
            $photo->imag = $path; // احفظ المسار الصحيح للصورة في قاعدة البيانات
        }

        $photo->save();
        return redirect()->back();

    }


    public function singleproduct($productid) {

        $product= Product::with('varieties', 'addProductimg')->find($productid);
        $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->inRandomOrder()
        ->take(3) // حدد عدد المنتجات المرتبطة التي تريد عرضها
        ->get();



       return view('products.singleproduct' , ['product'=> $product , 'relatedProducts' => $relatedProducts]);
    }
}
