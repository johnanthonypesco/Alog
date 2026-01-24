<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/current-stock.css') }}">
    <title>AAS</title>
</head>
<body>
    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out" id="main">
        <x-admin.header title="Accounts" subtitle="Employees" />

        <div class="mt-24 flex flex-col lg:flex-row justify-between gap-2">
            <div class="w-full lg:max-w-1/2 flex flex-col gap-2">
                <div class="flex gap-2">
                    <select name="category" id="" class="border-2 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                        <option value="">All Branches</option>
                    </select>
                    <button class="border-2 border-[#046636] p-2 rounded-lg text-lg w-42 font-bold text-[#046636] bg-[#046636]/20">Stock History</button>
                </div>
                <div class="flex gap-2">
                    <select name="category" id="" class="border-2 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                        <option value="">All Categories</option>
                    </select>
                    <button class="border-2 border-[#046636] p-2 rounded-lg text-lg w-42 text-[#046636] font-bold bg-[#046636]/20">Audit Mode</button>
                </div>
            </div>

            <div class="w-full lg:w-1/4 flex flex-col gap-2 items-end">
                <div class="relative w-full">
                    <input type="search" placeholder="Search Product Name" class="w-full bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-3xl px-5 text-[#046636] focus:outline-2 outline-[#046636]">
                    <button class="w-fit bg-[#046636] p-1 px-2 rounded-full absolute top-1/2 right-2 transform -translate-y-1/2"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                </div>
                <button class="w-fit bg-[#046636]/20 border-2 border-[#046636] p-1 rounded-3xl px-5 text-[#046636]"><i class="fa-regular fa-filter text-[#046636]"></i>Filters</button>   
            </div>
        </div>

        <div class="flex flex-col lg:flex-row justify-between items-center mt-10">
            <h1 class="text-3xl font-bold text-[#EB7100]">Fertilizers</h1>
            <div class="flex gap-2 items-center">
                <button id="addstockbtn" class="w-fit h-fit bg-[#046636] p-1 rounded-lg px-5 text-white font-bold">
                    Add Stock
                </button>
                <button class="w-fit h-fit bg-[#046636]/20 border-2 border-[#046636] p-1 rounded-lg px-5 text-[#046636] font-bold">
                    Archived Stock
                </button>
            </div>
        </div>

        <div class="w-full overflow-x-auto border-2 border-[#046636] rounded-xl mt-4">
            <table class="w-full min-w-[1100px] text-[#046636]">
                <thead class="bg-[#046636]/10 text-[#046636] font-semibold">
                    <tr>
                        <th class="p-5 text-left">
                            <div class="flex items-center gap-2">
                                Product
                                <button type="button">
                                    <i class="fa-solid fa-angle-down text-sm"></i>
                                </button>
                            </div>
                        </th>
                        <th class="p-5 text-right">SRP</th>
                        <th class="p-5 text-right">Unit Cost</th>
                        <th class="p-5 text-right">Avg Cost</th>

                        <!-- Amount / Contents column -->
                        <th class="p-5 text-center">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">
                                    Amount
                                </div>
                                <div class="text-[#EB7100] text-sm font-medium">
                                    Contents
                                </div>
                            </div>
                        </th>

                        <!-- Type / On Bag -->
                        <th class="p-5 text-center">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">
                                    Type
                                </div>
                                <div class="text-[#EB7100] text-sm font-medium">
                                    On Bag
                                </div>
                            </div>
                        </th>

                        <!-- UoM / On Hand -->
                        <th class="p-5 text-center">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">
                                    UoM
                                </div>
                                <div class="text-[#EB7100] text-sm font-medium">
                                    On Hand
                                </div>
                            </div>
                        </th>

                        <th class="p-5 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr class="hover:bg-[#046636]/5 transition-colors">
                        <td class="p-5 font-medium">
                            14-14-14<br>
                            <span class="font-bold text-[#046636]">Swire</span>
                        </td>
                        <td class="p-5 text-right">₱1,500.00</td>
                        <td class="p-5 text-right">₱1,500.00</td>
                        <td class="p-5 text-right">₱1,500.00</td>

                        <td class="p-5 text-center">
                            <div class="flex flex-col items-center">
                                <div>₱138,372.12</div>
                                <div class="font-bold text-[#EB7100]">50</div>
                            </div>
                        </td>

                        <td class="p-5 text-center">
                            <div class="flex flex-col items-center">
                                <div>Bag</div>
                                <div class="font-bold text-[#EB7100]">78</div>
                            </div>
                        </td>

                        <td class="p-5 text-center">
                            <div class="flex flex-col items-center">
                                <div>Kilo</div>
                                <div class="font-bold text-[#EB7100]">40</div>
                            </div>
                        </td>

                        <td class="p-5 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <button class="p-2 bg-green-100 hover:bg-green-200 rounded-md transition">
                                    <i class="fa-solid fa-folders text-green-700"></i>
                                </button>
                                <button class="p-2 bg-blue-100 hover:bg-blue-200 rounded-md transition">
                                    <i class="fa-solid fa-pencil text-blue-700"></i>
                                </button>
                                <button class="p-2 bg-orange-100 hover:bg-orange-200 rounded-md transition">
                                    <i class="fa-thin fa-paper-plane-top text-[#EB7100] -rotate-40"></i>
                                </button>
                                <button class="p-2 bg-red-100 hover:bg-red-200 rounded-md transition">
                                    <i class="fa-solid fa-trash-can text-red-700"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- add stock modal --}}

        <x-admin.modal modalid="addstockmodal" modaltitle="Add Stock" closemodal="closeaddstockmodal">
            <form action="" class="mt-5 max-h-[80vh] overflow-auto px-2">
                <div class="relative">
                    <select name="products" id="products" class="border-2 border-[#046636] rounded-lg w-full px-4 text-[#046636] font-bold bg-[#046636]/20 text-center p-2">
                        <option value="">Choose a supplier</option>
                        <option value="">Mang Karding</option>
                    </select>
                    <span class="absolute top-1 right-5 text-red-700 font-bold text-xl">*</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <div class="w-1/2">
                        <label for="ref" class="text-[#046636] font-bold">Ref No.</label>
                        <input type="text" name="ref" id="ref" class="border-2 border-[#046636] placeholder:font-semibold placeholder:text-[#046636]/50 rounded-lg w-full px-4 text-[#046636] p-2" placeholder="e.g 123456">
                    </div>
                    <div class="w-1/2">
                        <label for="ref" class="text-[#046636] font-bold">Date:</label>
                        <input type="date" name="date" id="date" class="border-2 border-[#046636] placeholder:font-semibold placeholder:text-[#046636]/50 rounded-lg w-full px-4 text-[#046636] p-2" placeholder="e.g 123456">
                    </div>
                </div>
                <div class="mt-3">
                    <select name="products" id="products" class="border-2 border-[#046636] rounded-lg w-full px-4 text-[#046636] font-bold bg-[#046636]/20 text-center p-2">
                        <option value="">Choose a supplier</option>
                        <option value="">Mang Karding</option>
                    </select>
                    <span class="absolute top-1 right-5 text-red-700 font-bold text-xl">*</span>
                </div>

                <div class="mt-5 border-t-2 border-blue-700">
                    <h1 class="text-blue-700 font-bold text-xl mt-3">Container 1:</h1>

                    <div class=" mt-3">
                        <label for="boxesqty" class="text-[#046636] font-bold">Quantity:</label>
                        <div class="flex gap-2">
                            <div class="relative w-1/2">
                                <input type="boxesqty" name="date" id="date" class="border-2 border-[#046636] placeholder:font-semibold placeholder:text-[#046636]/50 rounded-lg w-full px-4 text-[#046636] p-2.5" placeholder="e.g 123">
                                <span class="absolute top-2 right-5 text-red-700 font-bold text-xl">*</span>
                            </div>
                            <h1 class="w-1/2 text-[#046636] font-bold text-lg p-2 bg-[#046636]/20 rounded-lg border-2 border-[#046636]">Type:Boxes</h1>
                        </div>
                        <label for="uomqty" class="text-[#046636] font-bold">Quantity:</label>
                        <div class="flex gap-2 mt-2">
                            <div class="relative w-1/2">
                                <input type="uomqty" name="date" id="date" class="border-2 border-[#046636] placeholder:font-semibold placeholder:text-[#046636]/50 rounded-lg w-full px-4 text-[#046636] p-2.5" placeholder="e.g 123">
                                <span class="absolute top-2 right-5 text-red-700 font-bold text-xl">*</span>
                            </div>
                            <h1 class="w-1/2 text-[#046636] font-bold text-lg p-2 bg-[#046636]/20 rounded-lg border-2 border-[#046636]">UoM:Boxes</h1>
                        </div>
                    </div>
                </div>

                <div class="mt-5 border-t-2 border-blue-700">
                    <h1 class="text-blue-700 font-bold text-xl mt-3">Container 1:</h1>
                    <h1 class="text-[#046636] font-bold text-lg mt-3 p-2 bg-[#046636]/20 rounded-lg border-2 border-[#046636]">Inside:Boxes</h1>

                    <div class=" mt-3">
                        <label for="ref" class="text-[#046636] font-bold">Quantity:</label>
                        <div class="flex gap-2">
                            <div class="relative w-1/2">
                                <input type="text" name="date" id="date" class="border-2 border-[#046636] placeholder:font-semibold placeholder:text-[#046636]/50 rounded-lg w-full px-4 text-[#046636] p-2.5" placeholder="e.g 123">
                                <span class="absolute top-2 right-5 text-red-700 font-bold text-xl">*</span>
                            </div>
                            <h1 class="w-1/2 text-[#046636] font-bold text-lg p-2 bg-[#046636]/20 rounded-lg border-2 border-[#046636]">Type:Boxes</h1>
                        </div>
                    </div>
                </div>

                <div class="mt-5 border-t-2 border-blue-700">
                    <div class=" mt-3">
                        <label for="expirydate" class="text-[#046636] font-bold">Expirty Date:</label>
                        <div class="flex gap-2">
                            <div class="relative w-1/2">
                                <input type="date" name="expirydate" id="expirydate" class="border-2 border-[#046636] placeholder:font-semibold placeholder:text-[#046636]/50 rounded-lg w-full px-4 text-[#046636] p-2.5" placeholder="e.g 123">
                            </div>
                            <button class="w-1/2 text-[#046636] font-bold text-lg p-2 rounded-lg border-2 border-[#046636]"><i class="fa-regular fa-print text-[#046636]"></i> Print Copy</button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2 mt-5">
                    <button class="text-[#046636] font-bold text-lg p-2 rounded-lg border-2 border-[#046636]">Create and Add Stock Again</button>
                    <button class="text-white font-bold text-lg p-2 rounded-lg border-2 bg-[#046636]">Create</button>
                </div>
            </form>
        </x-admin.modal>
    </main>

</body>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
<script>
    function addStockModal() {
        const modal = document.getElementById('addstockmodal');
        const openModalButton = document.getElementById('addstockbtn');
        const closeModalButton = document.getElementById('closeaddstockmodal');

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }
    
    addStockModal();
</script>
</html>