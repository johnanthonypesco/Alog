<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/forrelease.css') }}">
    <title>AAS</title>
</head>
<body>
    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out" id="main">
        <x-admin.header title="Inventory" subtitle="For Release" />

        <div class="mt-24 flex flex-col lg:flex-row justify-between gap-2">
            <div class="w-full lg:max-w-1/2 flex flex-col gap-2">
                <div class="flex gap-2">
                    <select name="category" class="border-2 p-3 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                        <option value="">All Branches</option>
                    </select>
                    <button class="border-2 border-[#046636] p-3 rounded-lg text-lg w-42 font-bold text-[#046636] bg-[#046636]/20">Release History</button>
                </div>
                <div class="flex gap-2">
                    <select name="category" class="border-2 p-3 border-[#046636] rounded-lg w-1/2 pl-4 text-[#046636] font-bold bg-[#046636]/20">
                        <option value="">All Categories</option>
                    </select>
                </div>
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

        <h1 class="text-blue-700/70 text-3xl font-bold mt-10">Main Warehouse</h1>
        <div class="flex flex-col lg:flex-row justify-between items-center">
            <h1 class="text-3xl font-bold text-[#EB7100]">Fertilizers</h1>
            <div id="addarchivebtn" class="flex gap-2 items-center">
                <button id="addstockbtn" class="w-fit h-fit p-2 bg-[#046636] rounded-lg px-5 text-white font-bold">
                    Create Releases
                </button>
                <button id="archivedstockbtn" class="w-fit h-fit p-2 bg-[#046636]/20 border-2 border-[#046636] rounded-lg px-5 text-[#046636] font-bold">
                    Archived Releases
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
                                    <i class="fa-solid fa-angle-down text-sm text-[#EB7100]"></i>
                                </button>
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
                        <th>Taken From</th>
                        <th>Status</th>
                        <th>Customer</th>

                        <th class="p-5 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr class="hover:bg-[#046636]/5 transition-colors">
                        <td class="p-5 font-medium flex flex-col">
                            <span>14-14-14</span>
                            <span class="font-bold text-[#046636]">Swire</span>
                        </td>

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
                        <td class="text-center">on hand</td>
                        <td class="text-center">Pending</td>
                        <td class="text-center">John Doe</td>

                        <td id="actionbtn" class="p-5 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <button id="innercontainerbtn" class="p-2 bg-green-100 hover:bg-green-200 rounded-md transition">
                                    <i class="fa-solid fa-folders text-green-700"></i>
                                </button>
                                <button class="p-2 bg-blue-100 hover:bg-blue-200 rounded-md transition">
                                    <i class="fa-solid fa-pencil text-blue-700"></i>
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

        <x-admin.modal modalid="innercontainermdoal" modalwidth="max-w-2xl" modaltitle="Inner Container" closemodal="closeinnercontainermodal">
            <h1 class="text-[#EB7100] font-semibold text-xl md:text-2xl">From: 14-14-14 Swire</h1>

            <div class="w-full mt-4 overflow-x-auto border-2 border-[#046636] rounded-xl">
                <table class="w-full text-[#046636]">
                    <thead class="bg-[#046636]/10 text-[#046636] font-semibold">
                        <tr>
                            <th class="p-4 sm:p-5 text-center whitespace-nowrap">
                                <div class="flex flex-col items-center leading-tight">
                                    <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Type</div>
                                    <div class="text-[#EB7100] text-xs sm:text-sm font-medium">On Bag</div>
                                </div>
                            </th>

                            <th class="p-4 sm:p-5 text-center whitespace-nowrap">
                                <div class="flex flex-col items-center leading-tight">
                                    <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">UoM</div>
                                    <div class="text-[#EB7100] text-xs sm:text-sm font-medium">On Hand</div>
                                </div>
                            </th>

                            <th class="p-4 sm:p-5 text-center whitespace-nowrap">Taken From</th>

                            <th id="actionth" class="p-4 sm:p-5 text-center whitespace-nowrap">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        <tr class="hover:bg-[#046636]/5 transition-colors">
                            <td class="p-4 sm:p-5 text-center">
                                <div class="flex flex-col items-center">
                                    <div>Bag</div>
                                    <div class="font-bold text-[#EB7100] text-lg sm:text-xl">78</div>
                                </div>
                            </td>

                            <td class="p-4 sm:p-5 text-center">None</td>

                            <td class="p-4 sm:p-5 text-center">on hand</td>

                            <td id="actionbtn" class="p-4 sm:p-5 text-center">
                                <div class="flex items-center justify-center gap-2 sm:gap-3">
                                    <button class="p-2 bg-blue-100 hover:bg-blue-200 rounded-md transition">
                                        <i class="fa-solid fa-pencil text-blue-700"></i>
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
        </x-admin.modal>
    </main>

    <script src="{{ asset('js/admin/navbar.js') }}"></script>
    <script>
        function innerContainer() {
            const btns = document.querySelectorAll('#innercontainerbtn');
            const modal = document.getElementById('innercontainermdoal');
            const closeBtn = document.getElementById('closeinnercontainermodal');

            btns.forEach(btn => {
                btn.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                });
            });

            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            }
        }

        innerContainer();
    </script>
</body>
</html>