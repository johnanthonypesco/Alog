<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAS - Suppliers</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">

    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out pb-20" id="main">
        <x-admin.header title="Partners" subtitle="Supplier Management" />

        @if(session('success'))
        <div class="success mt-24 fixed top-0 right-10 z-50 bg-green-100 border-2 border-green-600 text-green-800 px-5 py-3 rounded-xl flex items-center gap-3 shadow-sm">
            <i class="fa-solid fa-check-circle text-xl text-green-600"></i>
            <div class="flex flex-col">
                <strong class="font-bold">Success!</strong>
                <span>{{ session('success') }}</span>
            </div>
            <script>
                setTimeout(() => {
                    document.querySelector('.success').classList.add('hidden')
                }, 1500)
            </script>
        </div>
        @else
        <div class="mt-24"></div>
        @endif

        <!-- Filters & Search -->
        <div class="pt-10 flex flex-col lg:flex-row justify-between gap-4">
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="document.getElementById('addsuppliermodal').classList.remove('hidden')"
                        class="bg-[#046636] text-white px-6 py-2.5 rounded-xl font-bold shadow hover:bg-[#035128] transition flex items-center gap-2">
                    <i class="fa-solid fa-building-user"></i> Register Supplier
                </button>

                <button class="border-2 border-[#046636] bg-[#046636]/10 text-[#046636] px-5 py-2.5 rounded-xl font-bold hover:bg-[#046636]/20 transition flex items-center gap-2">
                    <i class="fa-solid fa-file-invoice-dollar"></i> Consignment Due
                </button>
            </div>

            <div class="w-full lg:w-80">
                <div class="relative">
                    <input type="search" placeholder="Search supplier, contact person, or number..."
                           class="w-full bg-[#046636]/10 border-2 border-[#046636] p-3 pl-5 pr-12 rounded-3xl text-[#046636] font-medium focus:outline-none focus:ring-2 focus:ring-[#046636]/50">
                    <button class="absolute top-1/2 right-2 -translate-y-1/2 bg-[#046636] text-white p-2 rounded-full hover:bg-[#035128]">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="mt-8 overflow-x-auto border-2 border-[#046636] rounded-xl bg-white shadow-sm">
            <table class="w-full min-w-[1100px] text-[#046636]">
                <thead class="bg-[#046636]/10">
                    <tr class="font-semibold text-sm uppercase tracking-wide">
                        <th class="p-5 text-left">Company Profile</th>
                        <th class="p-5 text-left">Contact Directory</th>
                        <th class="p-5 text-center">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Terms</div>
                                <div class="text-[#EB7100] text-xs">Payment</div>
                            </div>
                        </th>
                        <th class="p-5 text-center">Status</th>
                        <th class="p-5 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">

                    @forelse ($suppliers as $supplier)
                        <tr class="hover:bg-[#046636]/5 transition-colors">
                            <td class="p-5">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 rounded-xl bg-gray-100 border-2 border-[#046636]/30 flex-shrink-0 flex items-center justify-center overflow-hidden">
                                        @if($supplier->logo)
                                            <img src="{{ asset('storage/' . $supplier->logo) }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-solid fa-building text-2xl text-[#046636]/50"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-lg text-gray-800">{{ $supplier->name }}</div>
                                        <div class="text-sm text-gray-600 mt-1 flex items-center gap-1.5">
                                            <i class="fa-solid fa-location-dot text-[#046636]"></i>
                                            {{ Str::limit($supplier->address ?? 'No address provided', 45) }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="p-5">
                                @if($supplier->contact_info && count($supplier->contact_info) > 0)
                                    <div class="space-y-4">
                                        @foreach($supplier->contact_info as $person)
                                            <div class="border-l-4 border-[#046636]/30 pl-3">
                                                <div class="font-medium text-gray-800">
                                                    {{ $person['name'] ?? 'Unnamed' }}
                                                    <span class="text-xs bg-[#046636]/10 text-[#046636] px-2 py-0.5 rounded-full ml-2">
                                                        {{ $person['position'] ?? 'Staff' }}
                                                    </span>
                                                </div>

                                                @if(!empty($person['numbers']))
                                                    <div class="flex flex-wrap gap-2 mt-2">
                                                        @foreach($person['numbers'] as $num)
                                                            <span class="text-xs bg-gray-100 px-2.5 py-1 rounded-lg border border-gray-200 flex items-center gap-1.5">
                                                                <i class="fa-solid fa-phone text-[#046636] text-xs"></i>
                                                                <span class="font-medium">{{ $num['label'] ?? 'Mobile' }}:</span> {{ $num['number'] ?? '—' }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                @if(!empty($person['email']))
                                                    <div class="text-sm text-gray-600 mt-1.5 flex items-center gap-1.5">
                                                        <i class="fa-solid fa-envelope text-[#046636]"></i> {{ $person['email'] }}
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-sm text-gray-500 italic flex items-center gap-2">
                                        <i class="fa-solid fa-circle-exclamation text-[#EB7100]"></i> No contact info
                                    </span>
                                @endif
                            </td>

                            <td class="p-5 text-center">
                                @if($supplier->is_consignment_provider ?? false)
                                    <div class="inline-flex flex-col items-center">
                                        <span class="bg-purple-100 text-purple-700 px-4 py-1.5 rounded-full text-sm font-bold border border-purple-200">
                                            Consignment
                                        </span>
                                        <span class="mt-2 text-sm font-medium text-gray-700">
                                            {{ $supplier->default_term_days ?? '?' }} Days
                                        </span>
                                    </div>
                                @else
                                    <span class="bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-sm font-bold border border-blue-200">
                                        Cash / COD
                                    </span>
                                @endif
                            </td>

                            <td class="p-5 text-center">
                                <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-sm font-bold border border-green-200">
                                    <div class="w-2 h-2 rounded-full bg-green-600"></div> Active
                                </span>
                            </td>

                            <td class="p-5 text-center">
                                <div class="flex justify-center gap-3">
                                    <button class="p-2.5 bg-blue-100 hover:bg-blue-200 rounded-lg transition" title="Edit">
                                        <i class="fa-solid fa-pencil text-blue-700"></i>
                                    </button>
                                    <button class="p-2.5 bg-red-100 hover:bg-red-200 rounded-lg transition" title="Delete">
                                        <i class="fa-solid fa-trash-can text-red-700"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-16 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-3">
                                    <i class="fa-solid fa-handshake text-6xl text-[#046636]/30"></i>
                                    <p class="text-xl font-bold text-gray-700">No suppliers found</p>
                                    <p class="text-gray-600">Click "Register Supplier" to add your first partner.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Add Supplier Modal -->
        <div id="addsuppliermodal"
             class="fixed inset-0 z-50 hidden bg-gray-900/70 backdrop-blur-sm flex items-center justify-center p-4 overflow-y-auto"
             x-data="{ contacts: [{ name: '', position: '', email: '', numbers: [{ label: 'Mobile', number: '' }] }], isConsignment: false }">

            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[90vh] flex flex-col overflow-hidden">

                <!-- Header -->
                <div class="bg-[#046636] px-6 py-5 md:px-8 flex justify-between items-center text-white shrink-0">
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold flex items-center gap-3">
                            <i class="fa-solid fa-building-user"></i> Register Supplier
                        </h2>
                        <p class="text-sm text-green-100 mt-1 opacity-90">Add supplier details for purchasing & consignment</p>
                    </div>
                    <button @click="$el.closest('#addsuppliermodal').classList.add('hidden')"
                            class="bg-white/20 hover:bg-white/30 p-2.5 rounded-full transition text-lg">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>

                <!-- Form with scroll -->
                <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data"
                      class="flex-1 overflow-y-auto p-6 md:p-8 space-y-7">
                    @csrf

                    <!-- Basic Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-gray-800 font-bold mb-2">Company / Supplier Name <span class="text-red-600">*</span></label>
                            <input type="text" name="name" required
                                   class="w-full border-2 border-gray-300 rounded-xl p-3 focus:border-[#046636] focus:ring-[#046636]/30 outline-none transition"
                                   placeholder="e.g. Swire Agrotech Inc.">
                        </div>

                        <div>
                            <label class="block text-gray-800 font-bold mb-2">Company Address</label>
                            <textarea name="address" rows="2"
                                      class="w-full border-2 border-gray-300 rounded-xl p-3 focus:border-[#046636] focus:ring-[#046636]/30 outline-none resize-none transition"
                                      placeholder="Office Address..."></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-800 font-bold mb-2">Company Logo</label>
                            <input type="file" name="logo"
                                   class="w-full p-2.5 border-2 border-gray-300 rounded-xl text-gray-600 file:mr-4 file:py-2 file:px-5 file:rounded-lg file:border-0 file:bg-[#046636]/10 file:text-[#046636] hover:file:bg-[#046636]/20 transition">
                        </div>
                    </div>

                    <!-- Contact Directory -->
                    <div class="bg-gray-50 rounded-xl p-6 border-2 border-gray-200">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-5">
                            <h3 class="font-bold text-lg text-gray-800 flex items-center gap-3">
                                <div class="bg-[#046636] text-white w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold">2</div>
                                Contact Directory
                            </h3>
                            <button type="button" @click="contacts.push({ name: '', position: '', email: '', numbers: [{ label: 'Mobile', number: '' }] })"
                                    class="bg-[#046636]/10 border-2 border-[#046636] text-[#046636] px-5 py-2.5 rounded-xl font-bold hover:bg-[#046636]/20 transition flex items-center gap-2 whitespace-nowrap">
                                <i class="fa-solid fa-user-plus"></i> Add Person
                            </button>
                        </div>

                        <div class="space-y-5">
                            <template x-for="(contact, index) in contacts" :key="index">
                                <div class="bg-white p-5 rounded-xl border-2 border-gray-200 relative shadow-sm">
                                    <button type="button" @click="contacts.splice(index, 1)"
                                            class="absolute top-3 right-3 text-gray-400 hover:text-red-600 transition">
                                        <i class="fa-solid fa-times"></i>
                                    </button>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                                        <div>
                                            <label class="block text-xs font-bold text-gray-600 uppercase mb-1.5">Name *</label>
                                            <input type="text" :name="`contacts[${index}][name]`" required
                                                   class="w-full border-2 border-gray-300 rounded-lg p-2.5 focus:border-[#046636] transition"
                                                   placeholder="e.g. Juan Cruz">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-gray-600 uppercase mb-1.5">Position</label>
                                            <input type="text" :name="`contacts[${index}][position]`"
                                                   class="w-full border-2 border-gray-300 rounded-lg p-2.5 focus:border-[#046636] transition"
                                                   placeholder="e.g. Sales Manager">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-xs font-bold text-gray-600 uppercase mb-1.5">Email (Optional)</label>
                                            <input type="email" :name="`contacts[${index}][email]`"
                                                   class="w-full border-2 border-gray-300 rounded-lg p-2.5 focus:border-[#046636] transition"
                                                   placeholder="email@company.com">
                                        </div>
                                    </div>

                                    <div class="bg-gray-100 p-4 rounded-xl border border-gray-200">
                                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-3">
                                            <label class="text-xs font-bold text-gray-600 uppercase flex items-center gap-2">
                                                <i class="fa-solid fa-phone"></i> Phone Numbers
                                            </label>
                                            <button type="button" @click="contact.numbers.push({ label: 'Mobile', number: '' })"
                                                    class="text-[#046636] text-xs font-bold hover:underline flex items-center gap-1">
                                                <i class="fa-solid fa-plus"></i> Add Number
                                            </button>
                                        </div>

                                        <div class="space-y-3">
                                            <template x-for="(num, numIndex) in contact.numbers" :key="numIndex">
                                                <div class="flex flex-col sm:flex-row gap-3">
                                                    <select :name="`contacts[${index}][numbers][${numIndex}][label]`"
                                                            class="border-2 border-gray-300 rounded-lg p-2 text-sm w-full sm:w-32 focus:border-[#046636]">
                                                        <option>Mobile</option>
                                                        <option>Office</option>
                                                        <option>Viber</option>
                                                        <option>Fax</option>
                                                    </select>
                                                    <input type="text" :name="`contacts[${index}][numbers][${numIndex}][number]`" required
                                                           class="border-2 border-gray-300 rounded-lg p-2 flex-1 focus:border-[#046636] font-mono"
                                                           placeholder="0912...">
                                                    <button type="button" @click="contact.numbers.splice(numIndex, 1)"
                                                            class="text-red-500 hover:text-red-700 sm:self-center">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Consignment -->
                    <div class="bg-purple-50 p-6 rounded-xl border-2 border-purple-200">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                            <div class="flex items-center gap-4">
                                <div class="relative inline-block w-14 h-8 select-none">
                                    <input type="checkbox" name="is_consignment_provider" x-model="isConsignment"
                                           class="absolute w-7 h-7 rounded-full bg-white border-2 border-gray-400 appearance-none cursor-pointer checked:border-[#046636] checked:bg-[#046636] transition-all duration-300"/>
                                    <label class="block w-full h-8 rounded-full bg-gray-300 cursor-pointer"></label>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-800 cursor-pointer block">Offers Consignment?</label>
                                    <p class="text-sm text-gray-600">Enable if payment is made days after delivery</p>
                                </div>
                            </div>

                            <div x-show="isConsignment" x-transition class="flex items-center gap-3">
                                <label class="text-sm font-bold text-purple-800 uppercase whitespace-nowrap">Default Terms:</label>
                                <div class="relative">
                                    <input type="number" name="default_term_days" placeholder="30"
                                           class="w-20 border-2 border-purple-300 p-2.5 rounded-xl text-center font-bold focus:border-purple-500 outline-none">
                                    <span class="absolute right-2 top-1/2 -translate-y-1/2 text-xs text-purple-600 font-medium">Days</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="w-full bg-[#046636] text-white py-4 rounded-xl font-bold text-lg hover:bg-[#035128] transition shadow-lg flex items-center justify-center gap-3 mt-4">
                        <i class="fa-solid fa-check"></i> Register Supplier
                    </button>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('addsuppliermodal');
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        }
    </script>
    <script src="{{ asset('js/admin/navbar.js') }}"></script>
</body>
</html>