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
            <div id="filters" class="w-full lg:max-w-1/2 flex flex-col gap-2">
                <div class="flex gap-2">
                    <select name="category" class="border-2 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                        <option value="">All Branches</option>
                    </select>
                    <button class="border-2 border-[#046636] p-2 rounded-lg text-lg w-42 font-bold text-[#046636] bg-[#046636]/20">Stock History</button>
                </div>
                <div class="flex gap-2">
                    <select name="category" class="border-2 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                        <option value="">All Categories</option>
                    </select>
                    <button id="auditmodebtn" class="border-2 border-[#046636] p-2 rounded-lg text-lg w-42 text-[#046636] font-bold bg-[#046636]/20">
                        Audit Mode
                    </button>
                </div>
            </div>

            <!-- Audit Mode Controls & Info -->
            <div id="auditmode" class="w-full lg:max-w-1/2 flex flex-col gap-2 mt-5 hidden">
                <div class="flex gap-2">
                    <button id="exitauditnosave" class="border-2 p-2 border-blue-700 rounded-lg w-1/2 pl-4 text-white font-bold bg-blue-700">
                        Exit Audit Mode
                    </button>
                    <button id="exitauditbtn" class="border-2 p-2 border-blue-700 rounded-lg w-1/2 pl-4 text-blue-700 font-bold bg-white">
                        Exit & Save Changes
                    </button>
                </div>
                <h1 class="text-[#046636] font-bold text-md italic">
                    Audit mode allows you to see & change the <strong>Physical Quantity</strong>. 
                    If the <span class="text-[#EB7100]">Physical</span> and <span class="text-[#EB7100]">System’s Quantity</span> do not match, 
                    it becomes a <span class="text-red-700">Discrepancy</span>.
                </h1>
            </div>


            <div class="w-full lg:w-1/4 flex flex-col gap-2 items-end">
                <div class="relative w-full">
                    <input type="search" placeholder="Search Product Name" class="w-full bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-3xl px-5 text-[#046636] focus:outline-2 outline-[#046636]">
                    <button class="w-fit bg-[#046636] p-1 px-2 rounded-full absolute top-1/2 right-2 transform -translate-y-1/2">
                        <i class="fa-solid fa-magnifying-glass text-white"></i>
                    </button>
                </div>
                <button class="w-fit bg-[#046636]/20 border-2 border-[#046636] p-1 rounded-3xl px-5 text-[#046636]">
                    <i class="fa-regular fa-filter text-[#046636]"></i> Filters
                </button>   
            </div>
        </div>

        <!-- Audit-specific filters (shown only in audit mode) -->
        <div id="filters2" class="w-full flex justify-end gap-2 mt-5 hidden">
            <div class="flex gap-2">
                <select class="border-2 p-2 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                    <option value="">All Branches</option>
                </select>
                <select class="border-2 p-2 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                    <option value="">All Category</option>
                </select>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row justify-between items-center mt-10">
            <h1 class="text-3xl font-bold text-[#EB7100]">Fertilizers</h1>
            <div id="addarchivebtn" class="flex gap-2 items-center">
                <button id="addstockbtn" class="w-fit h-fit p-2 bg-[#046636] rounded-lg px-5 text-white font-bold">
                    Add Stock
                </button>
                <button id="archivedstockbtn" class="w-fit h-fit p-2 bg-[#046636]/20 border-2 border-[#046636] rounded-lg px-5 text-[#046636] font-bold">
                    Archived Stock
                </button>
            </div>
            <h1 id="discrepancytitle" class="text-xl font-bold text-red-600 border-2 p-2 rounded-lg border-red-700 hidden">Discrepancy Detected : 1</h1>
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

                        <th class="p-5 text-center">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Amount</div>
                                <div class="text-[#EB7100] text-sm font-medium">Contents</div>
                            </div>
                        </th>

                        <th class="p-5 text-center">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Type</div>
                                <div class="text-[#EB7100] text-sm font-medium">On Bag</div>
                            </div>
                        </th>

                        <th class="p-5 text-center">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">UoM</div>
                                <div class="text-[#EB7100] text-sm font-medium">On Hand</div>
                            </div>
                        </th>

                        <th id="reservedth" class="p-5 text-center hidden">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Type</div>
                                <div class="text-[#EB7100] text-sm font-medium">Reserved</div>
                            </div>
                        </th>

                        <th id="reservedth" class="p-5 text-center hidden">
                            <div class="flex flex-col items-center leading-tight">
                                <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">UoM</div>
                                <div class="text-[#EB7100] text-sm font-medium">Reserved</div>
                            </div>
                        </th>

                        <th id="actionth" class="p-5 text-center">Actions</th>
                        <th id="containerth" class="p-5 text-center hidden">Container</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr class="hover:bg-[#046636]/5 transition-colors">
                        <td class="p-5 font-medium flex flex-col">
                            <p id="discrepancy" class="text-sm text-red-700 border border-red-700 text-center p-1 bg-white rounded-lg font-bold w-fit hidden">
                                DISCREPANCY
                            </p>
                            <span>14-14-14</span>
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

                        <td id="reservedtd" class="p-5 text-center hidden">
                            <div class="flex flex-col items-center">
                                <div>Bag</div>
                                <div class="font-bold text-[#EB7100]">78</div>
                            </div>
                        </td>

                        <td id="reservedtd" class="p-5 text-center hidden">
                            <div class="flex flex-col items-center">
                                <div>Kilo</div>
                                <div class="font-bold text-[#EB7100]">40</div>
                            </div>
                        </td>

                        <td id="actionbtn" class="p-5 text-center">
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
                        <td id="containerbtn" class="p-5 text-center hidden">
                            <button class="p-2 bg-green-100 hover:bg-green-200 rounded-md transition">
                                <i class="fa-solid fa-folders text-green-700"></i> View
                            </button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- add stock modal --}}
        @include('components.admin.inventory.current-stock.addstockmodal')
        
        {{-- archived stock modal --}}
        @include('components.admin.inventory.current-stock.archivedstockmodal')
        
        {{-- Container Details Modal --}}
        @include('components.admin.inventory.current-stock.containerdetailsmodal')
        
    </main>

    <script src="{{ asset('js/admin/navbar.js') }}"></script>
    <script src="{{ asset('js/admin/inventory/currentstock.js') }}"></script>
</body>
</html>