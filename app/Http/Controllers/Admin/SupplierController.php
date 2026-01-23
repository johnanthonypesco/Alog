<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::where('is_active', true)->get();
        return view('admin.inventory.supplier', compact('suppliers'));
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'contacts' => 'nullable|array', // Validating the input array
    ]);

    // Handle Logo
    $logoPath = $request->file('logo') ? $request->file('logo')->store('suppliers', 'public') : null;

    Supplier::create([
        'name' => $request->name,
        'address' => $request->address,
        'logo' => $logoPath,
        
        // DIRECTLY SAVE THE ARRAY (Laravel converts to JSON automatically)
        'contact_info' => $request->contacts, 
        
        'is_consignment_provider' => $request->has('is_consignment_provider'),
        'default_term_days' => $request->default_term_days ?? 0,
    ]);

    return redirect()->back()->with('success', 'Supplier registered successfully!');
}
}