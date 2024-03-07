<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function cust_orders()
    {
        $cust_orders = Customer::find(3)->orders;
        //$cust_orders = $customer_data->orders;
        foreach ($cust_orders as $order) {
            echo $order->Order_desc . " : " . $order->order_date . " : " . $order->Total_amount . "<br>";
        }
    }

    public function order()
    {
        $customer = Order::find(1)->customer;
        echo $customer->Customer_name;
    }
}


//1. create orders_migration
//2. create Order model
//3. create relation customer model->order model
//4. creat order controller
//5. retreive data
//6. create route for customer_orders(web.php)