<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/orders.css') }}">
    {{-- logo link url --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <title>AAS</title>
</head>
<body>
    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out" id="main">
        <x-admin.header title="Orders" subtitle="Orders" />

        <div class="mt-24 flex flex-col lg:flex-row justify-between items-start">
            <div class="flex items-center gap-5">
                <button class="p-2 bg-[#046636] rounded-md font-bold text-xl text-white px-4">
                    Create Order
                </button>
                <button class="bg-white border-2 border-[#046636] p-2 px-4 text-[#046636] rounded-md font-bold">
                    Manage Custodanianship
                </button>
            </div>
            <div class="flex flex-col items-end gap-2 w-full lg:w-1/3 mt-5 lg:mt-0">
                <div class="relative w-full">
                    <input type="search" name="search" placeholder="Search by name or email..." class="w-full bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-full px-5 text-[#046636] focus:outline-2 outline-[#046636]">
                    <div class="bg-[#046636] flex items-center justify-center p-2 w-fit rounded-full absolute top-1/2 right-2 transform -translate-y-1/2">
                        <i class="fa-regular fa-magnifying-glass text-white"></i>
                    </div>
                </div>
                <button class="border-2 border-[#046636] p-2 px-4 text-[#046636] flex items-center justify-center rounded-full">
                    <i class="fa-regular fa-filter text-[#046636]"></i>
                    <h1 class="text-[#046636]">Filters</h1>
                </button>
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between mt-10">
            <h1 class="text-[#EB7100] font-bold text-xl">Orders On: <span class="font-semibold text-[#046636]">January 14, 2026</span></h1>
            <button class="bg-white border-2 border-[#046636] p-2 px-4 text-[#046636] rounded-md font-bold">
                View Archived
            </button>
        </div>
        <div class="w-full overflow-auto border-2 border-[#046636] rounded-lg mt-5">
            <table class="w-full">
                <thead class="bg-[#046636]/20">
                    <tr>
                        
                        <th class="p-5 text-left">Man. Doc</th>
                        <th class="p-5 text-left">Account</th>
                        <th class="p-5 text-left">Order Type</th>
                        <th class="p-5 text-left">Product</th>
                        <th class="p-5 text-left">Amount</th>
                        <th class="p-5 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-5 text-left">123</td>
                        <td class="p-5 text-left">Ronald Trump</td>
                        <td class="p-5 text-left">Walk In</td>
                        <td class="p-5 text-left flex flex-col">
                            <h1>14-14-14</h1>
                            <h1>Swire</h1>
                        </td>
                        <td class="p-5 text-left">
                            ₱ 12,123.00
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button id="cashadvancementbtn" class="p-2 bg-green-200 rounded-md">View Details</button>
                                <button id="editemployeebtn" class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-5 text-left">123</td>
                        <td class="p-5 text-left">Ronald Trump</td>
                        <td class="p-5 text-left">Walk In</td>
                        <td class="p-5 text-left flex flex-col">
                            <h1>14-14-14</h1>
                            <h1>Swire</h1>
                        </td>
                        <td class="p-5 text-left">
                            ₱ 12,123.00
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button id="cashadvancementbtn" class="p-2 bg-green-200 rounded-md">View Details</button>
                                <button id="editemployeebtn" class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-5 text-left">123</td>
                        <td class="p-5 text-left">Ronald Trump</td>
                        <td class="p-5 text-left">Walk In</td>
                        <td class="p-5 text-left flex flex-col">
                            <h1>14-14-14</h1>
                            <h1>Swire</h1>
                        </td>
                        <td class="p-5 text-left">
                            ₱ 12,123.00
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button id="cashadvancementbtn" class="p-2 bg-green-200 rounded-md">View Details</button>
                                <button id="editemployeebtn" class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-5 text-left">123</td>
                        <td class="p-5 text-left">Ronald Trump</td>
                        <td class="p-5 text-left">Walk In</td>
                        <td class="p-5 text-left flex flex-col">
                            <h1>14-14-14</h1>
                            <h1>Swire</h1>
                        </td>
                        <td class="p-5 text-left">
                            ₱ 12,123.00
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button id="cashadvancementbtn" class="p-2 bg-green-200 rounded-md">View Details</button>
                                <button id="editemployeebtn" class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
</html>