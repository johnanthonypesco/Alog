<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Stocks & Inventory</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">

    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out pb-20" 
          id="main"
          x-data="inventoryHandler()">
          
        <x-admin.header title="Inventory" subtitle="Current Stocks" />

        @if(session('success'))
            <div class="mt-24 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative flex items-center gap-3 shadow-sm animate-fade-in-down">
                <i class="fa-solid fa-check-circle text-xl"></i>
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @else
            <div class="mt-24"></div>
        @endif

        <form method="GET" action="{{ route('stock_in.index') }}">
            <div class="mt-6 flex flex-col lg:flex-row justify-between gap-4">
                
                <div class="w-full lg:max-w-1/2 flex flex-col gap-2">
                    <div class="flex gap-2">
                         <select name="category" onchange="this.form.submit()" class="border-2 border-[#046636] rounded-lg w-1/2 pl-4 py-2 text-[#046636] font-bold bg-[#046636]/10 outline-none cursor-pointer hover:bg-[#046636]/20 transition">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                         <button type="button" class="border-2 border-[#046636] p-2 rounded-lg w-42 font-bold text-[#046636] bg-[#046636]/10 hover:bg-[#046636] hover:text-white transition">
                            <i class="fa-solid fa-clock-rotate-left"></i> History Log
                        </button>
                    </div>
                </div>

                <div class="w-full lg:w-1/3 flex flex-col gap-2 items-end">
                    <div class="relative w-full">
                        <input type="search" name="search" value="{{ request('search') }}" placeholder="Search Product Name or Brand..." 
                               class="w-full bg-white border-2 border-[#046636] p-2 rounded-full px-5 text-[#046636] placeholder-[#046636]/50 font-semibold focus:outline-none focus:ring-2 focus:ring-[#046636] shadow-sm">
                        <button type="submit" class="absolute top-1.5 right-2 w-8 h-8 bg-[#046636] rounded-full flex items-center justify-center hover:bg-[#035128] transition text-white">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="flex flex-col md:flex-row justify-between items-end md:items-center mt-10 mb-4 border-b border-gray-200 pb-2">
            <div>
                <h1 class="text-3xl font-bold text-[#EB7100]">
                    {{ request('category') ? $categories->find(request('category'))->name : 'All Products' }}
                </h1>
                <p class="text-gray-400 text-xs mt-1">Manage stock levels, costs, and deliveries.</p>
            </div>
            
            <div class="flex gap-2 items-center mt-4 md:mt-0">
                <button @click="openModal()" 
                        class="bg-[#046636] p-2.5 rounded-lg px-6 text-white font-bold shadow-md hover:bg-[#035128] transition flex items-center gap-2 transform hover:-translate-y-0.5">
                   <i class="fa-solid fa-plus-circle"></i> Add Stock (Stock In)
                </button>
            </div>
        </div>

        <div class="w-full overflow-x-auto border border-gray-200 rounded-xl shadow-lg bg-white">
            <table class="w-full min-w-[1200px] text-[#046636]">
                <thead class="bg-[#046636]/5 text-[#046636] font-bold uppercase text-xs tracking-wider border-b border-[#046636]/10">
                    <tr>
                        <th class="p-5 text-center w-12"></th> <th class="p-5 text-left">Product Details</th>
                        <th class="p-5 text-right">Selling Price (SRP)</th>
                        <th class="p-5 text-right">Current Market Cost</th>
                        <th class="p-5 text-right">Avg Inventory Cost</th>
                        <th class="p-5 text-center">Total Assets</th>
                        <th class="p-5 text-center">Container Stock</th>
                        <th class="p-5 text-center">Loose Stock</th>
                        <th class="p-5 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse($products as $product)
                        
                        <tr class="hover:bg-[#046636]/5 transition-colors group cursor-pointer"
                            @click="toggleRow({{ $product->id }})">
                            
                            <td class="p-5 text-center">
                                <button class="w-6 h-6 rounded-full bg-green-50 text-green-700 border border-green-200 flex items-center justify-center transition-transform duration-200"
                                        :class="expandedRows.includes({{ $product->id }}) ? 'rotate-90 bg-green-600 text-white' : ''">
                                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                                </button>
                            </td>

                            <td class="p-5">
                                <div class="flex flex-col">
                                    <span class="font-bold text-[#046636] text-lg leading-tight">{{ $product->name }}</span>
                                    <span class="text-[10px] font-bold text-[#EB7100] bg-orange-50 w-fit px-2 py-0.5 rounded-md border border-orange-100 mt-1 uppercase tracking-wide">
                                        {{ $product->brand ?? 'Generic' }}
                                    </span>
                                </div>
                            </td>
                            
                            <td class="p-5 text-right font-bold text-gray-800">
                                ₱{{ number_format($product->retail_price, 2) }}
                            </td>

                            <td class="p-5 text-right text-sm text-gray-600">
                                ₱{{ number_format($product->unit_cost, 2) }}
                                <div class="text-[9px] text-gray-400">Latest List Price</div>
                            </td>

                            <td class="p-5 text-right text-sm font-semibold text-blue-600">
                                ₱{{ number_format($product->avg_cost, 2) }}
                                <div class="text-[9px] text-blue-300">Blended Avg</div>
                            </td>

                            <td class="p-5 text-center bg-gray-50/50">
                                <div class="flex flex-col items-center">
                                    <div class="font-bold text-gray-800">₱{{ number_format($product->total_asset_value, 2) }}</div>
                                    <div class="text-[#EB7100] text-[10px] font-bold uppercase tracking-wider">{{ number_format($product->on_hand) }} Total Units</div>
                                </div>
                            </td>

                            <td class="p-5 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">{{ $product->stock_breakdown['major_name'] }}</span>
                                    <span class="font-bold text-2xl text-[#EB7100] leading-none">{{ $product->stock_breakdown['major_qty'] }}</span>
                                </div>
                            </td>

                            <td class="p-5 text-center">
                                <div class="flex flex-col items-center">
                                    <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">{{ $product->stock_breakdown['minor_name'] }}</span>
                                    <span class="font-bold text-2xl text-[#046636] leading-none">{{ $product->stock_breakdown['minor_qty'] }}</span>
                                </div>
                            </td>

                            <td class="p-5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="w-8 h-8 rounded-full bg-white border border-gray-200 text-blue-600 hover:bg-blue-50 transition shadow-sm">
                                        <i class="fa-solid fa-pencil text-xs"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr x-show="expandedRows.includes({{ $product->id }})" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="bg-gray-50 border-b border-gray-200 shadow-inner">
                            
                            <td colspan="9" class="p-4 md:px-12">
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                                    <div class="bg-gray-100 px-4 py-2 text-xs font-bold text-gray-500 uppercase tracking-wider flex justify-between items-center border-b border-gray-200">
                                        <span><i class="fa-solid fa-layer-group text-gray-400 mr-1"></i> Stock Breakdown (Active Batches)</span>
                                        <span>{{ $product->batches->count() }} Entries</span>
                                    </div>
                                    
                                    <table class="w-full text-sm text-left">
                                        <thead class="bg-gray-50 text-gray-500 font-medium border-b border-gray-200 text-xs uppercase">
                                            <tr>
                                                <th class="p-3 pl-4">Date / Supplier</th>
                                                <th class="p-3 text-right">List Price (Supplier)</th>
                                                <th class="p-3 text-right">Effective Cost (Net)</th>
                                                <th class="p-3 text-right">SRP (At Arrival)</th>
                                                <th class="p-3 text-center">Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100">
                                            @forelse($product->batches as $batch)
                                                <tr class="hover:bg-blue-50/20">
                                                    
                                                    <td class="p-3 pl-4">
                                                        <div class="text-gray-700 font-bold text-xs">{{ \Carbon\Carbon::parse($batch->received_date)->format('M d, Y') }}</div>
                                                        <div class="text-[#046636] font-semibold text-[11px]">{{ $batch->supplier->name }}</div>
                                                        @if($batch->is_consignment)
                                                            <span class="text-[9px] text-purple-600 bg-purple-100 px-1 rounded border border-purple-200 font-bold">CONSIGNMENT</span>
                                                        @endif
                                                    </td>

                                                    <td class="p-3 text-right">
                                                        <div class="text-gray-600 font-medium">₱{{ number_format($batch->unit_cost_snapshot, 2) }}</div>
                                                        @if($batch->quantity_free > 0)
                                                            <span class="text-[9px] text-orange-500 bg-orange-100 px-1.5 rounded border border-orange-200 font-bold">
                                                                +{{ $batch->quantity_free }} Free
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td class="p-3 text-right">
                                                        <div class="text-red-600 font-bold">₱{{ number_format($batch->effective_cost_per_unit, 2) }}</div>
                                                        @if($batch->unit_cost_snapshot > $batch->effective_cost_per_unit)
                                                            <div class="text-[9px] text-green-600 font-bold bg-green-50 px-1 rounded inline-block mt-1">
                                                                <i class="fa-solid fa-arrow-down"></i>
                                                                Saved {{ number_format((($batch->unit_cost_snapshot - $batch->effective_cost_per_unit) / $batch->unit_cost_snapshot) * 100, 0) }}%
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <td class="p-3 text-right text-blue-600 font-medium">
                                                        ₱{{ number_format($batch->srp_snapshot, 2) }}
                                                    </td>

                                                    <td class="p-3 text-center">
                                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold border border-green-200">
                                                            {{ number_format($batch->remaining_quantity) }}
                                                        </span>
                                                        <span class="block text-[9px] text-gray-400 mt-0.5">Original: {{ number_format($batch->total_quantity) }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="p-4 text-center text-gray-400 italic text-xs">No active batches. Stock is zero.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="9" class="p-12 text-center text-gray-400">
                                <div class="flex flex-col items-center">
                                    <i class="fa-solid fa-box-open text-4xl mb-3 text-gray-300"></i>
                                    <p class="font-medium">No products found.</p>
                                    <p class="text-xs mt-1">Try adjusting your filters or search.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $products->links() }}
        </div>


        <div x-show="isModalOpen" 
             style="display: none;"
             class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/60 backdrop-blur-sm transition-opacity"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">

            <div class="bg-white rounded-xl shadow-2xl w-full max-w-3xl overflow-hidden transform scale-100 transition-transform"
                 @click.away="closeModal()">
                 
                <div class="bg-[#046636] p-4 px-6 flex justify-between items-center text-white shadow-md z-10 relative">
                    <h2 class="text-xl font-bold flex items-center gap-2">
                        <i class="fa-solid fa-truck-ramp-box"></i> Receive Stocks (Stock In)
                    </h2>
                    <button @click="closeModal()" class="hover:text-gray-200 bg-white/10 p-1 rounded-full w-8 h-8 flex items-center justify-center transition">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>

                <form action="{{ route('stock_in.store') }}" method="POST" class="p-6 space-y-5 overflow-y-auto max-h-[85vh]">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="font-bold text-gray-700 text-xs uppercase mb-1 block">Supplier <span class="text-red-500">*</span></label>
                            <select name="supplier_id" class="w-full border border-gray-300 p-2.5 rounded-lg bg-gray-50 outline-none focus:ring-2 focus:ring-[#046636] text-sm" required>
                                <option value="">-- Select Supplier --</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="font-bold text-gray-700 text-xs uppercase mb-1 block">Date Received <span class="text-red-500">*</span></label>
                            <input type="date" name="received_date" value="{{ date('Y-m-d') }}" class="w-full border border-gray-300 p-2.5 rounded-lg bg-gray-50 outline-none focus:ring-2 focus:ring-[#046636] text-sm" required>
                        </div>
                    </div>

                    <div class="bg-green-50/50 p-5 rounded-xl border border-green-200 shadow-sm">
                        <label class="font-bold text-gray-800 text-sm mb-1 block">Select Product <span class="text-red-500">*</span></label>
                        
                        <select name="product_id" x-model="selectedProductId" @change="updateUnits()" 
                                class="w-full border border-gray-300 p-2.5 rounded-lg bg-white outline-none focus:ring-2 focus:ring-green-500 mb-4 shadow-sm text-sm font-semibold text-gray-700" required>
                            <option value="">-- Search/Select Product --</option>
                            @foreach($allProducts as $p)
                                <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->brand }})</option>
                            @endforeach
                        </select>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="font-bold text-gray-600 text-[10px] uppercase mb-1 block">Unit Type (What arrived?)</label>
                                <select name="unit_type" class="w-full border border-gray-300 p-2 rounded outline-none text-sm focus:border-green-500 bg-white" required>
                                    <option value="base">Base Unit (Tingi)</option>
                                    <template x-for="unit in currentUnits" :key="unit.id">
                                        <option :value="unit.unit_name" x-text="unit.unit_name + ' (Contains ' + unit.conversion_factor + ')'"></option>
                                    </template>
                                </select>
                            </div>

                            <div>
                                <label class="font-bold text-gray-600 text-[10px] uppercase mb-1 block">Expiry Date (Optional)</label>
                                <input type="date" name="expiry_date" class="w-full border border-gray-300 p-2 rounded outline-none text-sm focus:border-green-500 bg-white">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 border-t border-gray-100 pt-4">
                        <div>
                            <label class="font-bold text-gray-700 text-xs uppercase block mb-1">Qty Purchased <span class="text-red-500">*</span></label>
                            <input type="number" name="quantity" min="1" class="w-full border border-gray-300 p-2.5 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 text-sm" placeholder="10" required>
                        </div>
                        <div>
                            <label class="font-bold text-gray-700 text-xs uppercase block mb-1">Qty Free (+)</label>
                            <input type="number" name="free_quantity" min="0" class="w-full border border-gray-300 p-2.5 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 text-sm" placeholder="0">
                        </div>
                        <div>
                            <label class="font-bold text-gray-700 text-xs uppercase block mb-1">Total Amount (₱) <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-gray-500 font-bold">₱</span>
                                <input type="number" step="0.01" name="total_cost" min="0" class="w-full border border-gray-300 p-2.5 pl-7 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 font-bold text-sm" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4 pt-2">
                         <div class="flex items-center gap-2 bg-gray-50 p-3 rounded-lg border border-gray-200 w-full md:w-1/2 cursor-pointer hover:bg-gray-100 transition">
                            <input type="checkbox" name="is_consignment" id="consignment" class="w-4 h-4 text-green-600 rounded focus:ring-green-500 cursor-pointer">
                            <label for="consignment" class="font-bold text-gray-700 text-xs uppercase cursor-pointer select-none">Mark as Consignment?</label>
                        </div>
                        <input type="text" name="batch_code" placeholder="Batch Code (e.g. BATCH-001)" class="w-full md:w-1/2 border border-gray-300 p-3 rounded-lg outline-none text-sm focus:border-green-500 uppercase">
                    </div>

                    <div class="pt-2 border-t border-gray-100 mt-4">
                        <button type="submit" class="w-full bg-[#046636] text-white py-3.5 rounded-xl font-bold hover:bg-[#035128] transition shadow-lg text-lg flex justify-center items-center gap-2">
                            <i class="fa-solid fa-check"></i> Confirm Stock In
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script>
        function inventoryHandler() {
            return {
                isModalOpen: false,
                expandedRows: [], // Stores IDs of expanded products
                selectedProductId: '',
                currentUnits: [],
                allProductsData: @json($allProducts),

                // TOGGLE ROW FUNCTION (Drill-down)
                toggleRow(id) {
                    if (this.expandedRows.includes(id)) {
                        this.expandedRows = this.expandedRows.filter(rowId => rowId !== id);
                    } else {
                        this.expandedRows.push(id);
                    }
                },

                // MODAL FUNCTIONS
                openModal() { this.isModalOpen = true; },
                closeModal() { this.isModalOpen = false; },

                // DYNAMIC UNIT DROPDOWN
                updateUnits() {
                    const product = this.allProductsData.find(p => p.id == this.selectedProductId);
                    this.currentUnits = (product && product.units) ? product.units : [];
                }
            }
        }
    </script>
</body>
</html>