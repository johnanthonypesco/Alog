<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAS Inventory</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">

    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out pb-20" id="main">
        <x-admin.header title="Inventory" subtitle="Products" />

        @if(session('success'))
            <div class="mt-24 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow-sm" role="alert">
                <strong class="font-bold"><i class="fa-solid fa-check-circle"></i> Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @else
            <div class="mt-24"></div>
        @endif

        <div class="flex flex-col lg:flex-row lg:justify-between mt-5 gap-4">
            <div class="flex flex-col gap-4 w-full lg:w-auto">
                <div class="flex gap-3">
                    <button onclick="document.getElementById('addnewcategorymodal').classList.remove('hidden')" 
                            class="bg-[#046636]/10 border border-[#046636] p-2 px-4 rounded-lg font-bold text-[#046636] hover:bg-[#046636] hover:text-white transition">
                        + Register Category
                    </button>
                    <button class="bg-gray-100 border border-gray-300 p-2 px-4 rounded-lg font-bold text-gray-600 hover:bg-gray-200 transition">
                        <i class="fa-solid fa-archive"></i> Archived
                    </button>
                </div>

                <form method="GET" action="{{ route('admin.inventory.products') }}">
                    <div class="relative">
                        <i class="fa-solid fa-filter absolute left-3 top-3 text-[#046636]"></i>
                        <select name="category_id" onchange="this.form.submit()" 
                                class="bg-white border-2 border-[#046636] p-2 pl-10 rounded-lg font-bold text-[#046636] w-full cursor-pointer shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            @forelse($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $selectedCategoryId == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @empty
                                <option>No Categories Yet</option>
                            @endforelse
                        </select>
                    </div>
                </form>
            </div>
            
            <div class="flex gap-2 items-end w-full lg:w-1/3">
                <div class="relative w-full">
                    <input type="search" placeholder="Search product name..." class="w-full bg-white border border-gray-300 p-2 pl-4 pr-10 font-medium text-gray-700 rounded-full shadow-sm focus:outline-none focus:border-[#046636] focus:ring-1 focus:ring-[#046636]">
                    <div class="bg-[#046636] p-1.5 px-3 text-white rounded-full absolute right-1 top-1 cursor-pointer hover:bg-[#035128]">
                        <i class="fa-solid fa-search text-sm"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 flex flex-col md:flex-row md:justify-between gap-5 border-b border-gray-200 pb-4 items-end">
            <div class="flex gap-3 items-center">
                <h1 class="text-3xl font-bold text-[#EB7100]">
                    {{ $currentCategory ? $currentCategory->name : 'Inventory' }}
                </h1>
                
                @if($currentCategory)
                    <button class="p-1.5 px-3 bg-blue-50 border border-blue-200 rounded-md hover:bg-blue-100 transition text-blue-600">
                        <i class="fa-solid fa-pencil text-sm"></i>
                    </button>
                @endif
            </div>

            <div class="flex gap-2">
                <button onclick="document.getElementById('addproductmodal').classList.remove('hidden')" 
                        class="bg-[#046636] text-white py-2 px-6 rounded-lg font-bold shadow-lg hover:bg-[#035128] transition flex items-center gap-2 transform hover:-translate-y-0.5">
                    <i class="fa-solid fa-plus"></i> Add Product
                </button>
            </div>
        </div>

        <div class="overflow-x-auto mt-5 rounded-lg border border-gray-200 shadow-sm bg-white">
            <table class="w-full text-left border-collapse">
              <div class="overflow-x-auto mt-5 rounded-lg border border-gray-200 shadow-sm bg-white">
    <table class="w-full text-left border-collapse">
        <thead class="bg-[#046636]/5 text-[#046636] uppercase text-xs font-bold tracking-wider">
            <tr>
                <th class="p-4 border-b border-gray-200">Product Details</th>
                <th class="p-4 border-b border-gray-200 text-center">Base Unit (Tingi)</th>
                <th class="p-4 border-b border-gray-200 text-center">Structure</th>
                <th class="p-4 border-b border-gray-200 text-center">SRP (Selling)</th>
                <th class="p-4 border-b border-gray-200 text-center">Unit Cost (Buying)</th>
                <th class="p-4 border-b border-gray-200 text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($products as $product)
                <tr class="hover:bg-green-50/30 transition duration-150">
                    <td class="p-4">
                        <div class="flex flex-col">
                            <span class="font-bold text-gray-800 text-lg">{{ $product->name }}</span>
                            <span class="text-xs font-semibold text-gray-500 bg-gray-100 w-fit px-2 py-0.5 rounded-full mt-1">
                                {{ $product->brand ?? 'No Brand' }}
                            </span>
                        </div>
                    </td>

                    <td class="p-4 text-center">
                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-xs font-bold border border-orange-200">
                            {{ $product->base_unit }}
                        </span>
                    </td>

                    <td class="p-4">
                        <div class="flex flex-col gap-1 items-center">
                            @if($product->units->count() > 0)
                                @foreach($product->units as $unit)
                                    <div class="text-xs text-gray-600 bg-gray-50 px-2 py-1 rounded border border-gray-200 w-fit whitespace-nowrap">
                                        <i class="fa-solid fa-box-open text-[#046636]"></i> 
                                        1 {{ $unit->unit_name }} = 
                                        <span class="font-bold">{{ $unit->conversion_factor }}</span> {{ $product->base_unit }}s
                                    </div>
                                @endforeach
                            @else
                                <span class="text-xs text-gray-400 italic">No larger containers</span>
                            @endif
                        </div>
                    </td>

                    <td class="p-4 text-center">
                        <span class="font-bold text-[#046636] text-lg">
                            ₱ {{ number_format($product->retail_price, 2) }}
                        </span>
                    </td>

                    <td class="p-4 text-center">
                        <span class="text-gray-600 font-medium">
                            ₱ {{ number_format($product->unit_cost, 2) }}
                        </span>
                    </td>

                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition" title="Edit">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-12 text-center text-gray-400">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fa-solid fa-box-open text-5xl mb-4 text-gray-300"></i>
                            <p class="text-lg font-medium">No products found in {{ $currentCategory->name ?? 'this category' }}.</p>
                            <p class="text-sm">Click "Add Product" to get started.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
        <div id="addnewcategorymodal" class="fixed inset-0 z-50 hidden bg-gray-900/60 flex items-center justify-center backdrop-blur-sm transition-opacity">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform scale-100 transition-transform">
                <div class="bg-[#046636] p-4 flex justify-between items-center text-white">
                    <h2 class="text-lg font-bold"><i class="fa-solid fa-layer-group"></i> New Category</h2>
                    <button onclick="document.getElementById('addnewcategorymodal').classList.add('hidden')" class="hover:text-gray-200 transition">
                        <i class="fa-solid fa-times text-xl"></i>
                    </button>
                </div>
                
                <form action="{{ route('category.store') }}" method="POST" class="p-6">
                    @csrf
                    <label class="block text-gray-700 font-bold mb-2 text-sm">Category Name</label>
                    <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:border-[#046636] focus:ring-1 focus:ring-[#046636] outline-none" placeholder="e.g. Fertilizers">
                    
                    <button type="submit" class="w-full mt-6 bg-[#EB7100] text-white py-2.5 rounded-lg font-bold hover:bg-orange-600 transition shadow-md">
                        Create Category
                    </button>
                </form>
            </div>
        </div>

        <div id="addproductmodal" class="fixed inset-0 z-50 hidden bg-gray-900/60 flex items-center justify-center backdrop-blur-sm overflow-y-auto py-10">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden relative">
                
                <div class="bg-[#046636] p-4 px-6 flex justify-between items-center text-white sticky top-0 z-10">
                    <div>
                        <h2 class="text-xl font-bold">Create New Product</h2>
                        <p class="text-xs text-green-100 opacity-80">Define Base Unit & Containers</p>
                    </div>
                    <button onclick="document.getElementById('addproductmodal').classList.add('hidden')" class="hover:text-gray-200 bg-white/10 p-1 rounded-full w-8 h-8 flex items-center justify-center transition">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
                
                <form action="{{ route('product.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $selectedCategoryId }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-bold text-sm mb-1">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-[#046636] outline-none transition" placeholder="e.g. Roundup Herbicide">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold text-sm mb-1">Brand</label>
                            <input type="text" name="brand" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-[#046636] outline-none transition" placeholder="e.g. Monsanto">
                        </div>
                    </div>

                    <div class="bg-green-50 p-5 rounded-xl border border-green-200">
                        <div class="flex items-center gap-2 mb-3 border-b border-green-200 pb-2">
                            <div class="bg-green-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold">1</div>
                            <h3 class="text-green-800 font-bold">Base Unit (Tingi / Smallest)</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="text-xs font-bold text-gray-600 mb-1 block">Unit Name (Singular)</label>
                                <input type="text" name="base_unit" placeholder="e.g. Sachet" required class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:border-green-500 outline-none">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-600 mb-1 block">SRP (Per Piece)</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2 text-gray-500 text-xs">₱</span>
                                    <input type="number" step="0.01" name="retail_price" placeholder="0.00" required class="w-full border border-gray-300 rounded-lg p-2 pl-6 text-sm focus:border-green-500 outline-none">
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-600 mb-1 block">Cost (Per Piece)</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2 text-gray-500 text-xs">₱</span>
                                    <input type="number" step="0.01" name="unit_cost" placeholder="0.00" required class="w-full border border-gray-300 rounded-lg p-2 pl-6 text-sm focus:border-green-500 outline-none">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                             <label class="text-xs font-bold text-gray-600 mb-1 block">Low Stock Alert Level</label>
                             <input type="number" name="alert_level" value="10" class="w-full md:w-1/3 border border-gray-300 rounded-lg p-2 text-sm focus:border-green-500 outline-none">
                             <p class="text-[10px] text-gray-500 mt-1">Warn me when total base units drop below this number.</p>
                        </div>
                    </div>

                    <div x-data="{ units: [] }" class="border-t border-gray-200 pt-4">
                        
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center gap-2">
                                <div class="bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold">2</div>
                                <h3 class="text-gray-800 font-bold">Larger Containers (Optional)</h3>
                            </div>
                            
                            <button type="button" @click="units.push({name: '', factor: '', price: ''})" 
                                    class="text-xs bg-blue-50 text-blue-700 border border-blue-200 px-3 py-1.5 rounded-lg hover:bg-blue-100 font-bold transition flex items-center gap-1">
                                <i class="fa-solid fa-plus-circle"></i> Add Container Layer
                            </button>
                        </div>

                        <div class="space-y-3">
                            <template x-for="(unit, index) in units" :key="index">
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 relative animate-fade-in-down">
                                    
                                    <h4 class="font-bold text-xs text-blue-600 mb-3 uppercase tracking-wider">
                                        Container Level <span x-text="index + 1"></span>
                                    </h4>

                                    <div class="grid grid-cols-3 gap-3">
                                        <div>
                                            <label class="text-[10px] font-bold text-gray-500 uppercase">Container Name</label>
                                            <input type="text" :name="`units[${index}][name]`" placeholder="e.g. Box" required 
                                                   class="w-full border border-gray-300 rounded p-2 text-sm outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                        </div>

                                        <div>
                                            <label class="text-[10px] font-bold text-gray-500 uppercase">
                                                Qty inside (<span x-text="index === 0 ? 'Base Unit' : 'Prev Container'"></span>)
                                            </label>
                                            <input type="number" :name="`units[${index}][factor]`" placeholder="e.g. 10" required 
                                                   class="w-full border border-gray-300 rounded p-2 text-sm outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                        </div>

                                        <div>
                                            <label class="text-[10px] font-bold text-gray-500 uppercase">Wholesale SRP (Optional)</label>
                                            <div class="relative">
                                                <span class="absolute left-2 top-2 text-gray-400 text-xs">₱</span>
                                                <input type="number" step="0.01" :name="`units[${index}][price]`" placeholder="Auto-calc" 
                                                       class="w-full border border-gray-300 rounded p-2 pl-5 text-sm outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" @click="units.splice(index, 1)" 
                                            class="absolute top-3 right-3 text-gray-400 hover:text-red-500 transition p-1">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </template>

                            <div x-show="units.length === 0" class="text-center p-6 border-2 border-dashed border-gray-200 rounded-xl bg-gray-50/50">
                                <p class="text-sm text-gray-500 italic">No larger containers added.</p>
                                <p class="text-xs text-gray-400 mt-1">Example: If you sell individual sachets only, skip this section.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <button type="submit" class="w-full bg-[#046636] text-white py-3.5 rounded-xl font-bold hover:bg-[#035128] transition shadow-lg text-lg flex justify-center items-center gap-2">
                            <i class="fa-solid fa-save"></i> Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script>
        window.onclick = function(event) {
            const modals = ['addnewcategorymodal', 'addproductmodal'];
            modals.forEach(id => {
                const modal = document.getElementById(id);
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            });
        }
    </script>
</body>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
</html>