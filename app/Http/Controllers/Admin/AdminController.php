<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth.admin:admin');
    }

    public function homeAdmin(Request $request){
      return view('admin.admin-home');
    }

    public function listProduct(Request $request){
      $products = Product::all();
      return view('admin.admin-product-list')->withProducts($products);
    }

    public function formInputProduct(Request $request){
       return view('admin.admin-input-product');
    }

    public function submitProduct(Request $request){
      $validator = Validator::make($request->all(), [
          'product_name' => 'required|email:rfc,dns',
          'price' => 'required|numeric',
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $product = new Product;
      $product->product_name = $request->product_name;
      $product->price = $request->price;
      $img_type = $request->foto->extension();
      $path = $request->file('foto')->storeAs('/image_product', $request->product_name.".".time().".".$img_type);
      $img = Image::make(storage_path('app/').$path);
      $img->resize(499, 498);
      $img->save();
      $product->image_path = $path;

      if($product->save()){
        return redirect()->route('admin.product.list');
      }
    }

    public function addAdminForm(){
      return view('admin.admin-add-form');
    }

    public function addAdmin(Request $request){
      $validator = Validator::make($request->all(), [
          'admin_name' => 'required',
          'admin_email' => 'required|email:rfc,dns',
          'is_admin' => 'numeric',
          'is_staff' => 'numeric',
      ]);
      $admin = new Admin;
      $admin->name = $request->admin_name;
      $admin->email = $request->admin_email;
      $admin->is_admin = $request->is_admin;
      $admin->is_staff = $request->is_staff;
      $admin->password = Hash::make($request->admin_password);

      if($admin->save()){
        return redirect('/admins')->with('status', 'Data added!');
      }
    }

    public function allAdmin(){
      $admins = Admin::all();
      return view('admin.admin-all')->withAdmins($admins);
    }

    public function formEditAdmin($id){
      $admin = Admin::findOrFail($id);
      return view('admin.admin-profile-form')->withAdmin($admin);
    }

    public function editAdmin(Request $request,$id){
      $validator = Validator::make($request->all(), [
          'admin_name' => 'required',
          'admin_email' => 'required|email:rfc,dns',
          'is_admin' => 'numeric',
          'is_staff' => 'numeric',
      ]);
      $admin = Admin::findOrFail($id);
      $admin->name = $request->admin_name;
      $admin->email = $request->admin_email;
      $admin->is_admin = $request->is_admin;
      $admin->is_staff = $request->is_staff;

      if($admin->save()){
        return redirect()->route('admin.home');
      }
    }

    public function formUpdateProduct(Request $request,$id){
      $product = Product::findOrFail($id);
      return view('admin.admin-update-product')->withProduct($product);
    }

    public function updateProduct(Request $request,$id){
      $validator = Validator::make($request->all(), [
          'product_name' => 'required|email:rfc,dns',
          'price' => 'required|numeric',
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $product = Product::findOrFail($id);
      $product->product_name = $request->product_name;
      $product->price = $request->price;
      $img_type = $request->foto->extension();
      if (Storage::disk('local')->exists($product->image_path)) {
        Storage::disk('local')->delete($product->image_path);
      }
      $path = $request->file('foto')->storeAs('/image_product', $request->product_name.".".time().".".$img_type);
      $img = Image::make(storage_path('app/').$path);
      $img->resize(499, 498);
      $img->save();
      $product->image_path = $path;

      if($product->save()){
        return redirect()->route('admin.product.list');
      }
    }

    public function deleteProduct(Request $request, $id){
      $product = Product::findOrFail($id);
      if (Storage::disk('local')->exists($product->image_path)) {
        Storage::disk('local')->delete($product->image_path);
      }
      if($product->delete()){
        return redirect()->route('admin.product.list');
      }
    }

    public function usersList(Request $request){
      $users = User::all();
      return view('admin.admin-user-list')->withUsers($users);
    }

    public function userOrders(Request $request,$id){
      $orders = Order::where('users_id',$id)->orderByDesc('created_at')->get();
      return view('admin.admin-user-orders')->withOrders($orders);
    }

    public function ordersList(Request $request){
      $orders = Order::all()->sortByDesc('created_at');
      return view('admin.admin-orders-list')->withOrders($orders);
    }

}
