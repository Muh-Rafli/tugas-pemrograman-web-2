<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index', [
            'title' => 'customer',
            'customers' => customer::latest()->get(),
            //'customers' => customer::orderBy('name',)->get()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create', ['title' => 'Customer Create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:25',
        'No_telepon' => 'required|numeric|digits_between:10,15',
        'Alamat' => 'required|string',
        'pekerjaan' => 'required|string|max:100',
    ],[
        'name.required' => 'Nama Tidak Boleh Kosong',
        'name.max' => 'Nama Tidak boleh lebih dari karakter',
        'email.required' => 'Email Tidak Boleh Kosong',
        'email.email' => 'Format Email Tidak Valid',
        'email.max' => 'Email Tidak boleh lebih dari karakter',
        'No_telepon.required' => 'No_teleponTidak Boleh Kosong',
        'No_telepon.numeric' => 'No_telepon harus berupa angka',
        'Alamat.required' => 'Alamat Tidak Boleh Kosong',
        'pekerjaan.required' => 'pekerjaan Tidak Boleh Kosong',
        'pekerjaan.max' => 'pekerjaan Tidak boleh lebih dari 100 karakter',

    ]);

    Customer::create($validated);

    return to_route('customer.index')->withSuccess('Data Telah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'title' => 'Edit customer',
            'customer' => $customer,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:25',
        'No_telepon' => 'required|numeric|digits_between:10,15',
        'Alamat' => 'required|string',
        'pekerjaan' => 'required|string|max:100',
    ],[
        'name.required' => 'Nama Tidak Boleh Kosong',
        'name.max' => 'Nama Tidak boleh lebih dari karakter',
        'email.required' => 'Email Tidak Boleh Kosong',
        'email.email' => 'Format Email Tidak Valid',
        'email.max' => 'Email Tidak boleh lebih dari karakter',
        'No_telepon.required' => 'No_telepon Tidak Boleh Kosong',
        'No_telepon.numeric' => 'No_telepon harus berupa angka',
        'Alamat.required' => 'Alamat Tidak Boleh Kosong',
        'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong',
        'pekerjaan.max' => 'Pekerjaan Tidak boleh lebih dari 100 karakter',

    ]);

    $customer->update($validated);

    return to_route('customer.index')->withSuccess('Data Telah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
    $customer->delete();
    return to_route('customer.index')->withSuccess('Data Telah Berhasil Dihapus');
    }
}
