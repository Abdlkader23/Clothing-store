<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\order;
use App\Models\orderdatail;
use App\Models\hader;
use Illuminate\Support\Str;

class adminController extends Controller
{
    public function admin()
    {

        return view('admin');
    }
    public function page()
    {
        $product = product::all();
        return view('pages.blank-page',  ['product' => $product]);
    }
    public function order()
    {
       $order= order::all();
       $orderdatail= orderdatail::all();
        return view('pages.order',  ['order' => $order , 'orderdatail'=> $orderdatail]);
    }
    public function Hader()
{

    $hader =  hader::all();
    return view('pages.Hader', ['hader'=> $hader]);
    }
    public function edithader($haderid = null)
    {
if ($haderid != null) {

        $hader = hader::find($haderid);
        return view('pages.edithader' ,['hader'=> $hader]);}
    }





    public function storhadersubtitle(Request $request)
    {
        // تحقق من صحة البيانات المدخلة


        $request->validate([
            'subtitle' => 'required|max:255',
            'titel' => 'required|max:255',
            'bottun_rad' => 'nullable|string|max:50',
            'bottun_with' => 'nullable|string|max:50',
            'imagpath' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // إذا كان هناك تحديث
        if ($request->id) {
            $header = hader::first($request->id);

            if ($header) {
                $header->subtitle = $request->subtitle;
                $header->titel = $request->titel;
                $header->bottun_rad = $request->bottun_rad;
                $header->bottun_with = $request->bottun_with;

                // التحقق من وجود صورة جديدة للتحديث
                if ($request->hasFile('imagpath')) {
                    // حذف الصورة القديمة إذا كانت موجودة
                    if ($header->imagpath && file_exists(public_path($header->imagpath))) {
                        unlink(public_path($header->imagpath));
                    }

                    // رفع الصورة الجديدة
                    $path = $request->file('imagpath')->move(
                        'uploads',
                        Str::uuid()->toString() . '-' . $request->file('imagpath')->getClientOriginalName()
                    );
                    $header->imagpath = $path;
                }

                $header->save();
                return redirect('/')->with('success', 'تم تحديث البيانات بنجاح.');
            } else {
                return redirect('/')->with('error', 'العنصر غير موجود.');
            }
        }


    }













    public function Footer()
    {
        return view('pages.Footer',  );
    }

}
