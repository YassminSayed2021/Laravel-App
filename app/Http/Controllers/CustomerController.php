<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function index()
    {
        $custs = Customer::all();       //select * from customers;
        return view('customers.index', ['customers' => $custs]);
    }

    public function create()
    {
        return view('customers.insert');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'Customer_name' => 'required|unique:customers|max:150',
            'email' => 'required|unique:customers'
        ], [
            'required' => 'The :attribute field is required.',
            'Customer_name.size' => 'The :attribute must be exactly :size.',
        ]);

        $customr = new Customer();
        $customr->Customer_name = $request->Customer_name;
        $customr->Email = $request->email;
        $customr->save();
        //return response('Added Succ');
        return back()->with('success', 'Customer Add Successfully');
        //return redirect()->route('customers')->with('success', 'Customer Add Successfully');
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.update', ['customer' => $customer]);
    }

    public function update(Request $request, string $id)
    {
        Customer::where('id', $id)->update([
            'Customer_name' => $request->cust_name,
            'Email' => $request->email
        ]);     //update table customer set Customer_name=$request where customerid=$id
        //return response('Customer Updated Succ');
        return redirect('/customers');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Customer::where('id', $id)->delete();        //delete from customers where id=$id
        return redirect('/customers');
    }
    public function deleteCust(string $id)
    {
        Customer::findOrFail($id)->delete();
        return redirect('/customers');
    }
}




/**
 * 1- index view ->click Edit(id)->route(/edit/{id})
 * 2-CustContr->edit->get id from route
 * 3-Search customer data, return view with customer data
 * 
 * return view with data
 * 4.Update data ->click update button ->action
 * 5- Call route update with id -> Call Update func form controller
 * 
 */
