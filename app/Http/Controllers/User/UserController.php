<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except('welcome');
    }

    public function userPage(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        return view('user.user_home_page')->withUser($user);
    }

    public function editFileForm(Request $request,$id){
        $user = User::findOrFail($id);
        $user->tanggal_lahir = date('d-m-Y', strtotime($user->tanggal_lahir));
        return view('user.user_profile_form')->withUser($user);
    }

    public function editProfile(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'alamat' => 'required|email:rfc,dns',
            'jenis_kelamin' => 'required|numeric|max:1',
            'tanggal_lahir' => 'required|date_format:d/m/Y',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $tanggal = date('Y-m-d', strtotime($request->tanggal_lahir));
        $user->tanggal_lahir = $tanggal;
        $img_type = $request->foto->extension();
        if (Storage::disk('local')->exists($user->foto)) {
          Storage::disk('local')->delete($user->foto);
        }
        $path = $request->file('foto')->storeAs('/image_profile', $request->user()->name.".".$img_type);
        $img = Image::make(storage_path('app/').$path);
        $img->resize(499, 498);
        $img->save();
        $user->foto = $path;

        if($user->save()){
          return redirect()->route('user_page');
        }

    }

    public function order(Request $request,$id){
      $order = new Order;
      $order->users_id = Auth::user()->id;
      $order->products_id = $id;
      $order->order_status = 1;
      $order->save();
      return redirect('/products')->with('status', 'Product has been ordered');
    }

    public function orderList(Request $request,$id){
      $orders = Order::where('users_id',$id)->orderBy('created_at')->get();
      return view('user.user_orders')->withOrders($orders);
    }

    public function orderDetail(Request $request,$id){
      $order = Order::findOrFail($id);
      return view('user.user_order_detail')->withOrder($order);
    }

    public function orderCancel(Request $request,$id){
      $order = Order::findOrFail($id);
      $order->order_status = 0;
      $order->save();
      return redirect('/user'.'/'.Auth::user()->id.'/orders')->with('status', 'Product has been canceled');
    }

}
