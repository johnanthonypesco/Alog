<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/products.css') }}">
    <title>AAS</title>
</head>
<body>
    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out" id="main">
        <x-admin.header title="Inventory" subtitle="Products" />

        <div class="mt-24 flex flex-col lg:flex-row lg:justify-between">
            <div class="flex flex-col gap-5">
                <div class="flex gap-5">
                    <button id="addnewcategorybtn" class="bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-lg font-bold text-[#046636]">
                        Register Category
                    </button>
                    <button class="bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-lg font-bold text-[#046636]">
                        Archived Category
                    </button>
                </div>
                <select name="category" id="category" class="bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-lg font-bold text-[#046636]">
                    <option value="fertilizer">Fertilizer</option>
                    <option value="fertilizer">Chemicals</option>
                </select>
            </div>
            <div class="flex gap-2 flex-col items-end w-ful lg:w-1/3 mt-5 md:mt-5">
                <div class="relative w-full">
                    {{-- search bar --}}
                    <div class="bg-[#046636] w-fit py-1 px-2 text-white rounded-full absolute right-2 top-1"><i class="fa-solid fa-search"></i></div>
                    <input type="search" placeholder="Search" class="w-full bg-[#046636]/20 border-2 border-[#046636] p-2 px-4 font-bold text-[#046636] rounded-3xl">
                </div>
                <button class="bg-[#046636]/20 border-2 border-[#046636] p-1 rounded-3xl px-5 text-[#046636] w-full md:w-fit items-end"><i class="fa-solid fa-filter text-[#046636]"></i>Filters</button>
            </div>
        </div>
        
        
        {{-- category button --}}
        <div class="mt-10 flex flex-col md:flex-row md:justify-between gap-5">
            {{-- Category Title --}}
            <div class="flex gap-2 items-center">
                <h1 class="text-2xl font-semibold text-[#EB7100]">Fertilizers</h1>
                <button id="editcategorybtn" class="p-2 bg-blue-200 rounded-md">
                    <i class="fa-solid fa-pencil text-blue-700"></i>
                </button>
                <button class="p-2 bg-red-200 rounded-md">
                    <i class="fa-solid fa-trash text-red-700"></i>
                </button>
            </div>

            {{-- archived and add product --}}
            <div class="flex gap-2">
                <button class="bg-[#046636]/20 border-2 border-[#046636] p-1 rounded-lg px-5 text-[#046636] font-bold w-fit items-end">
                    Add Product
                </button>
                <button class="bg-[#046636]/20 border-2 border-[#046636] p-1 rounded-lg px-5 text-[#046636] font-bold w-fit items-end">
                    Archived Products
                </button>
            </div>
        </div>

        {{-- table --}}
        <div class="overflow-auto mt-5 rounded-lg border-2 border-[#046636] ">
            <table class="w-full sticky top-0">
                <thead class="bg-[#046636]/20">
                    <tr>
                        <th class="text-md">
                            <div class="flex items-center gap-2">
                                <h1>Product</h1>
                                <button>
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                        </th>
                        <th>
                             <div class="flex items-center gap-2">
                                <h1>Type</h1>
                                <button>
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                        </th>
                        <th>
                             <div class="flex items-center gap-2">
                                <h1>UoM</h1>
                                <button>
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                        </th>
                        <th>SRP</th>
                        <th>Unit Cost</th>
                        <th>Average Cost</th>
                        <th class="flex items-center flex-col">
                            <p class="border-b-2 border-[#EB7100] w-fit ">Amounts</p>
                            <p class="text-[#EB7100]">Contents</p>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="flex flex-col">
                            <div class="flex gap-2 items-center">
                                <h1>14-14-14</h1>
                                <button id="productdetailsbtn" class="p-2 bg-orange-200 rounded-md">
                                    <i class="fa-solid fa-folders text-orange-700"></i>
                                </button>
                            </div>
                            <h1 class="font-bold">Swire</h1>
                        </td>
                        <td class="text-center">Box</td>
                        <td class="text-center">Boxes</td>
                        <td class="text-center">
                            ₱ 1,204.04
                        </td>
                        <td class="text-center">
                            ₱ 1,190.12
                        </td>
                        <td class="text-center">
                            ₱ 12.30
                        </td>
                        <td>
                            <p class="text-center">₱ 138,372.12</p>
                            <p class="text-[#EB7100] font-bold text-center">50</p>
                        </td>
                        <td class="flex items-center justify-center gap-2">
                            <button class="p-2 bg-blue-200 rounded-md">
                                <i class="fa-solid fa-pencil text-blue-700"></i>
                            </button>
                            <button class="p-2 bg-red-200 rounded-md">
                                <i class="fa-solid fa-trash text-red-700"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- add new category modal --}}
        <x-admin.modal modalid="addnewcategorymodal" modaltitle="Create Category" closemodal="closeaddnewcategorymodal" modalwidth="max-w-md">
            {{-- form --}}
            <form action="#" class="w-full">
                <label for="name" class="text-[#046636] font-semibold text-xl">Name:</label>
                <div class="mt-2 relative">
                    <input type="text" name="name" id="name" class="w-full px-5 py-2.5 border-2 border-[#046636] rounded-lg focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold text-base" placeholder="Enter category's name">
                    <p class="text-red-700 font-bold text-xl absolute top-1 right-2">*</p>
                </div>

                <button type="submit" class="w-full mt-5 bg-[#046636] text-white px-8 py-2.5 rounded-lg font-bold hover:bg-[#035128] transition">Create</button>
            </form>
        </x-admin.modal>

        {{-- edit category modal --}}
        <x-admin.modal modalid="editcategorymodal" modaltitle="Edit Category" closemodal="closeeditcategorymodal" modalwidth="max-w-md">
            {{-- form --}}
            <form action="#" class="w-full">
                <label for="name" class="text-[#046636] font-semibold text-xl">Name:</label>
                <div class="mt-2 relative">
                    <input type="text" name="name" id="name" class="w-full px-5 py-2.5 border-2 border-[#046636] rounded-lg focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold text-base" placeholder="Enter category's name">
                    <p class="text-red-700 font-bold text-xl absolute top-1 right-2">*</p>
                </div>

                <button type="submit" class="w-full mt-5 bg-[#046636] text-white px-8 py-2.5 rounded-lg font-bold hover:bg-[#035128] transition">Create</button>
            </form>
        </x-admin.modal>
        
        <x-admin.modal modalid="productdetailsmodal" modaltitle="Product's Details" closemodal="closeproductdetailsmodal" modalwidth="max-w-2xl">
            <h1 class="mt-5 text-[#046636] font-bold text-xl">Container Inside:</h1>
            {{-- table --}}
            <div class="mt-2 max-h-[30vh] rounded-lg border-2 border-[#046636]">
                <table class="w-full">
                    <thead class="bg-gray-200 sticky top-0">
                        <tr>
                            <th class="text-md text-center">
                                Type
                            </th>
                            <th class="text-center">
                                UoM
                            </th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center">Sache</td>
                            <td class="text-center">None</td>
                            <td>
                                <button class="bg-blue-200 p-2 rounded-lg">
                                    <i class="fa-solid fa-pencil text-blue-700"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h1 class="mt-5 text-[#046636] font-bold text-xl">Container Inside:</h1>
            <h1 class="mt-2 text-[#EB7100] font-bold text-lg">Received On: <span class="font-semibold text-[#046636]">January 14,2026</span></h1>

            <div class="mt-2 max-h-[30vh] overflow-auto  rounded-lg border-2 border-[#046636]">
                <table class="w-full">
                    <thead class="bg-gray-200 sticky top-0">
                        <tr>
                            <th class="text-md text-center flex item-center gap-2 justify-center">
                                <h1>Supplier</h1>
                                <button>
                                    <i class="fa-solid fa-angle-down text-[#EB7100]"></i>
                                </button>
                            </th>
                            <th class="text-center">
                                Ref No.
                            </th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="text-center">AgriCompnay</td>
                            <td class="text-center">128732</td>
                            <td class="flex gap-2 justify-center items-center">
                                <button class="bg-[#046636] p-1 px-3 text-white font-semibold rounded-lg">View Details</button>
                                <button class="border-2 border-[#046636] p-1 px-3 rounded-lg">
                                    <i class="fa-solid fa-print text-[#046636]"></i>
                                    <span>Print</span>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">AgriCompnay</td>
                            <td class="text-center">128732</td>
                            <td class="flex gap-2 justify-center items-center">
                                <button class="bg-[#046636] p-1 px-3 text-white font-semibold rounded-lg">View Details</button>
                                <button class="border-2 border-[#046636] p-1 px-3 rounded-lg">
                                    <i class="fa-solid fa-print text-[#046636]"></i>
                                    <span>Print</span>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">AgriCompnay</td>
                            <td class="text-center">128732</td>
                            <td class="flex gap-2 justify-center items-center">
                                <button class="bg-[#046636] p-1 px-3 text-white font-semibold rounded-lg">View Details</button>
                                <button class="border-2 border-[#046636] p-1 px-3 rounded-lg">
                                    <i class="fa-solid fa-print text-[#046636]"></i>
                                    <span>Print</span>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">AgriCompnay</td>
                            <td class="text-center">128732</td>
                            <td class="flex gap-2 justify-center items-center">
                                <button class="bg-[#046636] p-1 px-3 text-white font-semibold rounded-lg">View Details</button>
                                <button class="border-2 border-[#046636] p-1 px-3 rounded-lg">
                                    <i class="fa-solid fa-print text-[#046636]"></i>
                                    <span>Print</span>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center">AgriCompnay</td>
                            <td class="text-center">128732</td>
                            <td class="flex gap-2 justify-center items-center">
                                <button class="bg-[#046636] p-1 px-3 text-white font-semibold rounded-lg">View Details</button>
                                <button class="border-2 border-[#046636] p-1 px-3 rounded-lg">
                                    <i class="fa-solid fa-print text-[#046636]"></i>
                                    <span>Print</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.modal>

    </main>

</body>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
<script>
    function addnewcategory(){
        const modal = document.getElementById('addnewcategorymodal');
        const closemodal = document.getElementById('closeaddnewcategorymodal');
        const btn = document.getElementById('addnewcategorybtn');

        btn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closemodal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }

    function editcategory(){
        const modal = document.getElementById('editcategorymodal');
        const closemodal = document.getElementById('closeeditcategorymodal');
        const btn = document.getElementById('editcategorybtn');

        btn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closemodal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }
    
    function productdetailsmodal(){
        const modal = document.getElementById('productdetailsmodal');
        const closemodal = document.getElementById('closeproductdetailsmodal');
        const btn = document.getElementById('productdetailsbtn');

        btn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closemodal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }
    
    addnewcategory();
    editcategory(); 
    productdetailsmodal();
</script>
</html>