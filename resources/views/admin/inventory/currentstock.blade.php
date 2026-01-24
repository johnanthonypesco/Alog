<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock In Entry</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">

    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen pb-20">
        <x-admin.header title="Inventory" subtitle="Receive Stocks (Stock In)" />

        @if(session('success'))
            <div class="mt-24 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex items-center gap-2">
                <i class="fa-solid fa-check-circle"></i> {{ session('success') }}
            </div>
        @else
            <div class="mt-24"></div>
        @endif

        <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-[#046636] p-4 text-white flex justify-between items-center">
                    <h2 class="font-bold text-lg"><i class="fa-solid fa-truck-ramp-box"></i> New Delivery Entry</h2>
                </div>

                <form action="{{ route('stock_in.store') }}" method="POST" class="p-6 space-y-6"
                      x-data="stockInHandler()">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="font-bold text-gray-700 text-sm">Supplier</label>
                            <select name="supplier_id" class="w-full border p-2 rounded-lg bg-gray-50 outline-none focus:border-green-500" required>
                                <option value="">-- Select Supplier --</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="font-bold text-gray-700 text-sm">Date Received</label>
                            <input type="date" name="received_date" value="{{ date('Y-m-d') }}" class="w-full border p-2 rounded-lg bg-gray-50 outline-none focus:border-green-500" required>
                        </div>
                    </div>

                    <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                        <label class="font-bold text-gray-700 text-sm">Product</label>
                        <select name="product_id" x-model="selectedProductId" @change="updateUnits()" class="w-full border p-2 rounded-lg bg-white outline-none focus:border-green-500 mb-4" required>
                            <option value="">-- Select Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} ({{ $product->brand }})
                                </option>
                            @endforeach
                        </select>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="font-bold text-gray-600 text-xs uppercase">Unit Type</label>
                                <select name="unit_type" class="w-full border p-2 rounded outline-none text-sm" required>
                                    <option value="base">Base Unit (Tingi)</option>
                                    <template x-for="unit in currentUnits">
                                        <option :value="unit.unit_name" x-text="unit.unit_name + ' (x' + unit.conversion_factor + ')'"></option>
                                    </template>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label class="font-bold text-gray-600 text-xs uppercase">Expiry Date (Optional)</label>
                                <input type="date" name="expiry_date" class="w-full border p-2 rounded outline-none text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-t pt-4">
                        <div>
                            <label class="font-bold text-gray-700 text-sm">Qty Purchased</label>
                            <input type="number" name="quantity" min="1" class="w-full border p-2 rounded-lg outline-none focus:border-blue-500" placeholder="e.g. 10" required>
                        </div>
                        <div>
                            <label class="font-bold text-gray-700 text-sm">Qty Free (+)</label>
                            <input type="number" name="free_quantity" min="0" class="w-full border p-2 rounded-lg outline-none focus:border-blue-500" placeholder="e.g. 1">
                            <p class="text-[10px] text-gray-500">Free items lower your effective cost.</p>
                        </div>
                        <div>
                            <label class="font-bold text-gray-700 text-sm">Total Cost (₱)</label>
                            <input type="number" step="0.01" name="total_cost" min="0" class="w-full border p-2 rounded-lg outline-none focus:border-blue-500" placeholder="Total Receipt Amount" required>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 border-t pt-4">
                         <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_consignment" id="consignment" class="w-5 h-5 text-green-600 rounded">
                            <label for="consignment" class="font-bold text-gray-700 text-sm">Is this Consignment?</label>
                        </div>
                        <input type="text" name="batch_code" placeholder="Batch Code (Optional)" class="border-b p-1 text-sm outline-none">
                    </div>

                    <button type="submit" class="w-full bg-[#046636] text-white py-3 rounded-xl font-bold hover:bg-[#035128] transition shadow-lg">
                        Confirm Stock In
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                <h3 class="font-bold text-gray-700 mb-4">Recent Entries</h3>
                <div class="text-sm text-gray-500 italic text-center py-10">
                    No recent logs yet.
                </div>
            </div>
        </div>
    </main>

    <script>
        function stockInHandler() {
            return {
                selectedProductId: '',
                currentUnits: [],
                
                // Embed PHP data into JS variable
                allProducts: @json($products),

                updateUnits() {
                    // Find the selected product object
                    const product = this.allProducts.find(p => p.id == this.selectedProductId);
                    
                    if (product && product.units) {
                        this.currentUnits = product.units;
                    } else {
                        this.currentUnits = [];
                    }
                }
            }
        }
    </script>
</body>
</html>