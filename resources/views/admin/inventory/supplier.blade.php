<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAS</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<style>
    .toggle-checkbox:checked {
        right: 0;
        border-color: #046636;
    }
    .toggle-checkbox:checked + .toggle-label {
        background-color: #046636;
    }
    .toggle-checkbox {
        right: 50%;
        transition: all 0.3s;
    }
    .toggle-label {
        width: 3rem;
    }
</style>
<body class="bg-gray-50">

    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out pb-20" id="main">
        <x-admin.header title="Partners" subtitle="Supplier Management" />

        @if(session('success'))
            <div class="mt-24 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow-sm flex items-center gap-2" role="alert">
                <i class="fa-solid fa-check-circle text-xl"></i>
                <div>
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @else
            <div class="mt-24"></div>
        @endif

        <div class="flex flex-col lg:flex-row lg:justify-between mt-5 gap-4">
            <div class="flex flex-col gap-4 w-full lg:w-auto">
                <div class="flex gap-3">
                    <button onclick="document.getElementById('addsuppliermodal').classList.remove('hidden')" 
                            class="bg-[#046636] text-white py-2 px-6 rounded-lg font-bold shadow-lg hover:bg-[#035128] transition flex items-center gap-2 transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-building-user"></i> Register Supplier
                    </button>
                    
                    <button class="bg-gray-100 border border-gray-300 py-2 px-4 rounded-lg font-bold text-gray-600 hover:bg-gray-200 transition flex items-center gap-2">
                        <i class="fa-solid fa-file-invoice-dollar"></i> Consignment Due
                    </button>
                </div>
            </div>
            
            <div class="flex gap-2 items-end w-full lg:w-1/3">
                <div class="relative w-full">
                    <input type="search" placeholder="Search supplier, contact person, or number..." class="w-full bg-white border border-gray-300 p-2 pl-4 pr-10 font-medium text-gray-700 rounded-full shadow-sm focus:outline-none focus:border-[#046636] focus:ring-1 focus:ring-[#046636]">
                    <div class="bg-[#046636] p-1.5 px-3 text-white rounded-full absolute right-1 top-1 cursor-pointer hover:bg-[#035128]">
                        <i class="fa-solid fa-search text-sm"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto mt-8 rounded-lg border border-gray-200 shadow-sm bg-white">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#046636]/5 text-[#046636] uppercase text-xs font-bold tracking-wider">
                    <tr>
                        <th class="p-4 border-b border-gray-200 w-1/3">Company Profile</th>
                        <th class="p-4 border-b border-gray-200 w-1/3">Contact Directory</th>
                        <th class="p-4 border-b border-gray-200 text-center">Terms</th>
                        <th class="p-4 border-b border-gray-200 text-center">Status</th>
                        <th class="p-4 border-b border-gray-200 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($suppliers as $supplier)
                        <tr class="hover:bg-green-50/30 transition duration-150 group">
                            <td class="p-4 align-top">
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex-shrink-0 flex items-center justify-center text-gray-400 font-bold text-xl border border-gray-200 overflow-hidden">
                                        @if($supplier->logo)
                                            <img src="{{ asset('storage/' . $supplier->logo) }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-solid fa-building"></i>
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800 text-lg leading-tight">{{ $supplier->name }}</span>
                                        <span class="text-xs text-gray-500 mt-1">
                                            <i class="fa-solid fa-location-dot text-[#046636] mr-1"></i> 
                                            {{ Str::limit($supplier->address, 40) ?? 'No Address' }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4 align-top">
                                <div class="flex flex-col gap-3">
                                    @if(!empty($supplier->contact_info))
                                        @foreach($supplier->contact_info as $person)
                                            <div class="border-l-2 border-green-200 pl-3">
                                                <div class="flex items-baseline gap-2">
                                                    <span class="font-bold text-sm text-gray-700">{{ $person['name'] }}</span>
                                                    <span class="text-[10px] text-gray-400 uppercase tracking-wide border border-gray-200 px-1 rounded">
                                                        {{ $person['position'] ?? 'Staff' }}
                                                    </span>
                                                </div>
                                                
                                                @if(!empty($person['numbers']))
                                                    <div class="flex flex-wrap gap-1.5 mt-1">
                                                        @foreach($person['numbers'] as $num)
                                                            <div class="text-[11px] bg-gray-50 text-gray-600 px-2 py-0.5 rounded border border-gray-100 flex items-center gap-1">
                                                                <i class="fa-solid fa-phone text-[9px] text-green-600"></i>
                                                                <span class="font-semibold text-gray-500">{{ $num['label'] }}:</span>
                                                                <span>{{ $num['number'] }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                @if(!empty($person['email']))
                                                    <div class="text-[11px] text-gray-400 mt-0.5">
                                                        <i class="fa-solid fa-envelope text-[9px] mr-1"></i> {{ $person['email'] }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-xs text-gray-400 italic flex items-center gap-1">
                                            <i class="fa-solid fa-circle-exclamation"></i> No contact info
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <td class="p-4 text-center align-top">
                                @if($supplier->is_consignment_provider)
                                    <div class="inline-flex flex-col items-center">
                                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold border border-purple-200">
                                            Consignment
                                        </span>
                                        <span class="text-xs text-gray-500 mt-1 font-medium bg-gray-50 px-2 rounded border border-gray-100">
                                            {{ $supplier->default_term_days }} Days
                                        </span>
                                    </div>
                                @else
                                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-100">
                                        Cash / COD
                                    </span>
                                @endif
                            </td>

                            <td class="p-4 text-center align-top">
                                <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded border border-green-200 flex items-center justify-center gap-1 w-fit mx-auto">
                                    <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div> Active
                                </span>
                            </td>

                            <td class="p-4 text-center align-top">
                                <div class="flex justify-center gap-2 opacity-100 lg:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 bg-white border border-gray-200 text-blue-600 rounded-lg hover:bg-blue-50 hover:border-blue-200 transition shadow-sm" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button class="p-2 bg-white border border-gray-200 text-red-600 rounded-lg hover:bg-red-50 hover:border-red-200 transition shadow-sm" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-16 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fa-solid fa-handshake text-3xl text-gray-300"></i>
                                    </div>
                                    <p class="text-lg font-bold text-gray-500">No suppliers found.</p>
                                    <p class="text-sm">Start by clicking "Register Supplier" to add your first partner.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div id="addsuppliermodal" class="fixed inset-0 z-50 hidden bg-gray-900/60 flex items-center justify-center backdrop-blur-sm overflow-y-auto py-10 transition-opacity">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden relative">
                
                <div class="bg-[#046636] p-4 px-6 flex justify-between items-center text-white sticky top-0 z-20 shadow-md">
                    <div>
                        <h2 class="text-xl font-bold flex items-center gap-2">
                            <i class="fa-solid fa-building-user"></i> Register Supplier
                        </h2>
                        <p class="text-xs text-green-100 opacity-80">Add details for purchasing & consignment</p>
                    </div>
                    <button onclick="document.getElementById('addsuppliermodal').classList.add('hidden')" class="hover:text-gray-200 bg-white/10 p-1 rounded-full w-8 h-8 flex items-center justify-center transition backdrop-blur-sm">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
                
                <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b border-gray-100 pb-6">
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-bold text-sm mb-1">Company / Supplier Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-[#046636] outline-none transition" placeholder="e.g. Swire Agrotech Inc.">
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-bold text-sm mb-1">Company Address</label>
                            <textarea name="address" rows="1" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-[#046636] outline-none transition resize-none" placeholder="Office Address..."></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold text-sm mb-1">Company Logo</label>
                            <input type="file" name="logo" class="w-full text-xs text-gray-500 file:mr-2 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 border border-gray-200 rounded-lg">
                        </div>
                    </div>

                    <div x-data="{ contacts: [{ name: '', position: '', email: '', numbers: [{ label: 'Mobile', number: '' }] }] }" class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                        
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-gray-800 text-sm flex items-center gap-2">
                                <div class="bg-blue-600 text-white w-5 h-5 rounded-full flex items-center justify-center text-xs">2</div>
                                Contact Directory
                            </h3>
                            <button type="button" @click="contacts.push({ name: '', position: '', email: '', numbers: [{ label: 'Mobile', number: '' }] })" 
                                    class="text-xs bg-white text-blue-600 px-3 py-1.5 rounded-lg font-bold border border-blue-200 hover:bg-blue-50 hover:border-blue-300 transition shadow-sm flex items-center gap-1">
                                <i class="fa-solid fa-user-plus"></i> Add Person
                            </button>
                        </div>

                        <div class="space-y-4">
                            <template x-for="(contact, index) in contacts" :key="index">
                                <div class="bg-white p-4 rounded-xl border border-gray-200 relative shadow-sm animate-fade-in-down">
                                    
                                    <button type="button" @click="contacts.splice(index, 1)" class="absolute top-2 right-2 text-gray-300 hover:text-red-500 transition p-1" title="Remove Person">
                                        <i class="fa-solid fa-times"></i>
                                    </button>

                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div class="col-span-2 md:col-span-1">
                                            <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1 block">Name</label>
                                            <input type="text" :name="`contacts[${index}][name]`" placeholder="e.g. Juan Cruz" required 
                                                   class="w-full border border-gray-300 rounded p-1.5 text-sm focus:border-blue-500 outline-none">
                                        </div>
                                        <div>
                                            <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1 block">Position</label>
                                            <input type="text" :name="`contacts[${index}][position]`" placeholder="e.g. Sales Manager" 
                                                   class="w-full border border-gray-300 rounded p-1.5 text-sm focus:border-blue-500 outline-none">
                                        </div>
                                        <div class="col-span-2">
                                             <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-1 block">Email (Optional)</label>
                                             <input type="email" :name="`contacts[${index}][email]`" placeholder="email@company.com" 
                                                    class="w-full border border-gray-300 rounded p-1.5 text-sm focus:border-blue-500 outline-none">
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 inner-shadow">
                                        <div class="flex justify-between items-center mb-2">
                                            <label class="text-[10px] font-bold text-gray-400 uppercase tracking-wider flex items-center gap-1">
                                                <i class="fa-solid fa-phone"></i> Numbers
                                            </label>
                                            <button type="button" @click="contact.numbers.push({ label: 'Mobile', number: '' })" 
                                                    class="text-[10px] text-green-600 font-bold hover:text-green-800 hover:underline flex items-center gap-1 transition">
                                                <i class="fa-solid fa-plus"></i> Add Number
                                            </button>
                                        </div>

                                        <div class="space-y-2">
                                            <template x-for="(num, numIndex) in contact.numbers" :key="numIndex">
                                                <div class="flex gap-2">
                                                    <select :name="`contacts[${index}][numbers][${numIndex}][label]`" 
                                                            class="border border-gray-300 rounded p-1 text-xs bg-white text-gray-600 focus:border-green-500 outline-none w-1/3 cursor-pointer">
                                                        <option value="Mobile">Mobile</option>
                                                        <option value="Office">Office</option>
                                                        <option value="Viber">Viber</option>
                                                        <option value="Fax">Fax</option>
                                                    </select>
                                                    <input type="text" :name="`contacts[${index}][numbers][${numIndex}][number]`" placeholder="0912..." required 
                                                           class="border border-gray-300 rounded p-1 text-xs w-full focus:border-green-500 outline-none font-mono">
                                                    <button type="button" @click="contact.numbers.splice(numIndex, 1)" class="text-gray-300 hover:text-red-500 transition px-1">
                                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                                    </button>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                </div>
                            </template>
                        </div>
                    </div>

                    <div x-data="{ isConsignment: false }" class="border-t border-gray-100 pt-6">
                        <div class="flex items-center justify-between bg-purple-50 p-4 rounded-xl border border-purple-100">
                            <div class="flex items-center gap-3">
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="is_consignment_provider" id="toggle_consignment" x-model="isConsignment" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300"/>
                                    <label for="toggle_consignment" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                </div>
                                <div>
                                    <label for="toggle_consignment" class="font-bold text-gray-800 cursor-pointer block">Offers Consignment?</label>
                                    <p class="text-xs text-gray-500">Enable if you pay them days after delivery.</p>
                                </div>
                            </div>

                            <div x-show="isConsignment" x-transition class="flex items-center gap-2 animate-fade-in-right">
                                 <label class="text-xs font-bold text-purple-800 uppercase">Default Terms:</label>
                                 <div class="relative">
                                     <input type="number" name="default_term_days" placeholder="30" class="border border-purple-300 p-2 rounded-lg w-20 text-center font-bold text-purple-900 focus:ring-2 focus:ring-purple-500 outline-none">
                                     <span class="text-xs text-purple-400 absolute right-8 top-10">Days</span>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <button type="submit" class="w-full bg-[#046636] text-white py-3.5 rounded-xl font-bold hover:bg-[#035128] transition shadow-lg text-lg flex justify-center items-center gap-2">
                            <i class="fa-solid fa-check"></i> Register Supplier
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script>
        window.onclick = function(event) {
            const modal = document.getElementById('addsuppliermodal');
            if (event.target == modal) {
                modal.classList.add('hidden');
            }
        }
    </script>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
</body>
</html>