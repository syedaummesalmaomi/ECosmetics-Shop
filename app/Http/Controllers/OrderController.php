<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

session_start();

class OrderController extends Controller
{
    

    public function pending_order($order_id){
        $this->AdminAuthCheck();
            DB::table('tbl_order')
            ->where('order_id', $order_id)
            ->update(['order_status'=> "Pending"]);
            Session::put('message', 'Order is pending!');
            return Redirect::to('/manage_order');
}

     public function completed_order($order_id){
        $this->AdminAuthCheck();
      DB::table('tbl_order')
      ->where('order_id', $order_id)
      ->update(['order_status'=> "Completed"]);
      Session::put('message', 'Order completed successfully!');
      return Redirect::to('/manage_order');
    }


    public function view_order($order_id){
        $this->AdminAuthCheck();

        $order_by_id=DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.customer_id','=', 'tbl_customer.customer_id')
                    ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
                    ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
                    ->select('tbl_order.*', 'tbl_order_details.*','tbl_shipping.*', 'tbl_customer.*')
                    ->get();

        $view_order=view('admin.view_order')
                    ->with('order_by_id', $order_by_id);

          return view('admin_layout')
                 ->with('admin.view_order', $view_order);
    }

    public function delete_order($order_id){
        $this->AdminAuthCheck();
      DB::table('tbl_order')
      ->where('order_id', $order_id)
      ->delete();
      Session::get('message', 'Order deleted successfully!');
      return Redirect::to('/manage_order');

    }

    public function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    }

