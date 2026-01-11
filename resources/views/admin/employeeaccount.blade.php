<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/employee.css') }}">
    <title>AAS</title>
</head>
<body>
    <x-admin.navbar />

    <main class="ml-0 md:ml-64 px-5 md:px-10 min-h-screen transition-all duration-300 ease-in-out" id="main">
        <x-admin.header title="Accounts" subtitle="Employees" />

        <div class="flex flex-col md:flex-row gap-2 justify-between items-center mt-32">
            <div>
                <button id="addemployeebtn" class="bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-lg text-2xl font-bold text-[#046636]">Create Employee</button>
            </div>
            <div class="flex gap-5">
                <button id="createrolebtn" class="border-2 border-[#046636] p-2 rounded-lg text-2xl font-bold text-[#046636]">Manage Roles</button>
                <button class="border-2 border-[#046636] p-2 rounded-lg text-2xl font-bold text-[#046636]">View Archived</button>
            </div>
        </div>
        
        <div class="mt-16 flex justify-between items-center gap-2">
            <button class="bg-[#046636]/20 border-2 border-[#046636] p-1 rounded-3xl px-5 text-[#046636]"><i class="fa-regular fa-filter text-[#046636]"></i>Filters</button>
            <div class="relative w-full md:w-1/4">
                <input type="search" placeholder="Search ref no or supplier name" class="w-full bg-[#046636]/20 border-2 border-[#046636] p-2 rounded-3xl px-5 text-[#046636] focus:outline-2 outline-[#046636]">
                <div class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-[#046636] text-white p-1 rounded-full px-2">
                    <i class="fa-regular fa-magnifying-glass text-sm"></i>
                </div>
            </div>
        </div>

        <div class="w-full overflow-auto border-2 border-[#046636] rounded-lg mt-5">
            <table class="w-full">
                <thead class="bg-[#046636]/20">
                    <tr>
                        <th class="p-5 text-left">
                            <div class="flex items-center gap-2">
                                <h1>Name</h1>
                                <button>
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                        </th>
                        <th class="p-5 text-left">
                            <div class="flex items-center gap-2">
                                <h1>Email</h1>
                                <button>
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </div>
                        </th>
                        <th class="p-5 text-left">Role</th>
                        <th class="p-5 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Secret</td>
                        <td>secretary@gmail.com</td>
                        <td>Secretary</td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-2 bg-green-200 rounded-md"><i class="fa-whiteboard fa-semibold fa-dollar-sign text-green-700"></i></button>
                                <button id="editemployeebtn" class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Encorito</td>
                        <td>encoder@gmail.com</td>
                        <td>Encoder</td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-2 bg-green-200 rounded-md"><i class="fa-whiteboard fa-semibold fa-dollar-sign text-green-700"></i></button>
                                <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Warren</td>
                        <td>warehouse@gmail.com</td>
                        <td>Warehouseman</td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-2 bg-green-200 rounded-md"><i class="fa-whiteboard fa-semibold fa-dollar-sign text-green-700"></i></button>
                                <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Cashero</td>
                        <td>cashier@gmail.com</td>
                        <td>Cashier</td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-2 bg-green-200 rounded-md"><i class="fa-whiteboard fa-semibold fa-dollar-sign text-green-700"></i></button>
                                <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Secret</td>
                        <td>secretary@gmail.com</td>
                        <td>Secretary</td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-2 bg-green-200 rounded-md"><i class="fa-whiteboard fa-semibold fa-dollar-sign text-green-700"></i></button>
                                <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Create Employee Modal --}}
        <x-admin.modal modalid="createemployeemodal" modaltitle="Create Employee" closemodal="closecreateemployeemodal" >
            <form action="" class="mt-5">
                <div class="relative">
                    <label for="name" class="text-lg font-bold text-[#046636]">Name:</label>
                    <input type="text" id="name" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Enter Employee's Name">
                    <h1 class="absolute text-xl text-red-700 font-bold top-10 right-2">*</h1>
                </div>
                <div class="mt-2 relative">
                    <label for="email" class="text-lg font-bold text-[#046636]">Email:</label>
                    <input type="email" id="email" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Enter Employee's Email">
                    <h1 class="absolute text-xl text-red-700 font-bold top-10 right-2">*</h1>
                </div>
                <div class="mt-2">
                    <div class="relative">
                        <label for="password" class="text-lg font-bold text-[#046636]">Password:</label>
                        <input type="password" id="password" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Enter Employee's Password">
                        <h1 class="absolute text-xl text-red-700 font-bold top-10 right-2">*</h1>
                    </div>
                    <div class="relative">
                        <input type="password" id="password_confirmation" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Re-type Password">
                        <h1 class="absolute text-xl text-red-700 font-bold top-3 right-2">*</h1>
                    </div>
                </div>

                <div class="mt-5 flex items-center justify-between">
                    <select name="role" class="p-2 border-2 border-[#046636] rounded-lg cursor-pointer">
                        <option value="" selected disabled hidden>Choose Role</option>
                        <option value="secretary">Secretary</option>
                        <option value="encoder">Encoder</option>
                        <option value="warehouseman">Warehouseman</option>
                        <option value="cashier">Cashier</option>
                    </select>

                    <button type="submit" class="bg-[#046636] text-white p-2 rounded-lg px-12 font-bold">Create</button>
                </div>
            </form>
        </x-admin.modal>

        <x-admin.modal modalid="editemployeemodal" modaltitle="Edit Employee" closemodal="closeeditemployeemodal">
            <form action="" class="mt-5">
                <div class="relative">
                    <label for="name" class="text-lg font-bold text-[#046636]">Name:</label>
                    <input type="text" id="name" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Enter Employee's Name">
                    <h1 class="absolute text-xl text-red-700 font-bold top-10 right-2">*</h1>
                </div>
                <div class="mt-2 relative">
                    <label for="email" class="text-lg font-bold text-[#046636]">Email:</label>
                    <input type="email" id="email" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Enter Employee's Email">
                    <h1 class="absolute text-xl text-red-700 font-bold top-10 right-2">*</h1>
                </div>
                <div class="mt-2">
                    <div class="relative">
                        <label for="password" class="text-lg font-bold text-[#046636]">Password:</label>
                        <input type="password" id="password" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Enter Employee's Password">
                        <h1 class="absolute text-xl text-red-700 font-bold top-10 right-2">*</h1>
                    </div>
                    <div class="relative">
                        <input type="password" id="password_confirmation" class="w-full px-5 border-2 border-[#046636] p-2 rounded-lg mt-2 focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold" placeholder="Re-type Password">
                        <h1 class="absolute text-xl text-red-700 font-bold top-3 right-2">*</h1>
                    </div>
                </div>

                <div class="mt-5 flex items-center justify-between">
                    <select name="role" class="p-2 border-2 border-[#046636] rounded-lg cursor-pointer">
                        <option value="" selected disabled hidden>Choose Role</option>
                        <option value="secretary">Secretary</option>
                        <option value="encoder">Encoder</option>
                        <option value="warehouseman">Warehouseman</option>
                        <option value="cashier">Cashier</option>
                    </select>

                    <button type="submit" class="bg-[#046636] text-white p-2 rounded-lg px-12 font-bold">Save</button>
                </div>
            </form>
        </x-admin.modal>

        {{-- Role Management Modal --}}
        <x-admin.modal modalid="createrolemodal" modaltitle="Role Management" closemodal="closecreaterolemodal">
            <div class="mt-5 flex gap-2">
                <button id="rolemanagementcreatebtn" class="bg-[#046636]/20 text-[#046636] border-2 border-[#046636] p-2 rounded-lg px-8 font-bold">Create Role</button>
                <button class="border-2 text-[#046636] border-[#046636] p-2 rounded-lg px-8 font-bold">View Archived</button>

            </div>
            <div class="w-full overflow-auto border-2 border-[#046636] rounded-lg mt-5">
                <table class="w-full">
                    <thead class="bg-[#046636]/20">
                        <tr>
                            <th class="p-5">
                                <div class="flex gap-2 items-center justify-center">
                                    <h1>Role</h1>
                                    <button><i class="fa-solid fa-angle-down"></i></button>
                                </div>
                            </th>
                            <th class="p-5 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center!">Secretary</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                    <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center!">Encoder</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                    <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center!">Warehouseman</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                    <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center!">Cashier</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <button class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
                                    <button class="p-2 bg-red-200 rounded-md"><i class="fa-solid fa-trash text-red-700"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-admin.modal>

        {{-- Create Employee Role --}}
        <x-admin.modal  modalid="createemployeerolemodal" modaltitle="Create Employee Role" 
            closemodal="closecreateemployeerolemodal" modalwidth="max-w-5xl mx-auto overflow-y-auto max-h-[90vh]">

            <form action="" class="mt-6 px-2 sm:px-4 pb-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                    <input type="text" name="name" placeholder="Enter the role's name" class="w-full sm:w-96 px-5 py-2.5 border-2 border-[#046636] rounded-lg focus:outline-2 outline-[#046636] placeholder:text-lg placeholder:text-[#046636]/40 placeholder:font-semibold text-base"required>
                    <button type="submit"class="w-full sm:w-auto bg-[#046636] text-white px-8 py-2.5 rounded-lg font-bold hover:bg-[#035128] transition">
                        Create Role
                    </button>
                </div>

                <h1 class="text-2xl font-bold text-[#046636] mt-8 mb-4">Page Permission:</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                    <!-- Main Pages -->
                    <div class="flex flex-col gap-3">
                        <h2 class="text-lg text-[#046636] font-bold">Main Pages</h2>
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="dashboard" name="permissions[]" value="dashboard"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Dashboard Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="all_inventory" name="permissions[]" value="all_inventory"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access ALL Inventory Pages</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="orders" name="permissions[]" value="orders"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Orders Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="all_accounting" name="permissions[]" value="all_accounting"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access ALL Accounting Pages</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="all_accounts" name="permissions[]" value="all_accounts"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access ALL Account Pages</span>
                            </label>
                        </div>
                    </div>

                    <!-- Inventory Pages -->
                    <div class="flex flex-col gap-3">
                        <h2 class="text-lg text-[#046636] font-bold">Inventory Pages</h2>
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="current_stocks" name="permissions[]" value="current_stocks"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Current Stocks Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="for_release" name="permissions[]" value="for_release"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access For Release Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="products" name="permissions[]" value="products"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Product Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="suppliers_branches" name="permissions[]" value="suppliers_branches"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Suppliers & Branches Page</span>
                            </label>
                        </div>
                    </div>

                    <!-- Account Management Pages -->
                    <div class="flex flex-col gap-3">
                        <h2 class="text-lg text-[#046636] font-bold">Account Management Pages</h2>
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="employees" name="permissions[]" value="employees"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Employees Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="agents_dealers" name="permissions[]" value="agents_dealers"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Agents & Dealers Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="cooperatives" name="permissions[]" value="cooperatives"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Cooperatives Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="big_land_owners" name="permissions[]" value="big_land_owners"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Big Land Owners Page</span>
                            </label>
                        </div>
                    </div>

                    <!-- Accounting Pages -->
                    <div class="flex flex-col gap-3">
                        <h2 class="text-lg text-[#046636] font-bold">Accounting Pages</h2>
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="customer_ledger" name="permissions[]" value="customer_ledger"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Customer Ledger Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="cheques" name="permissions[]" value="cheques"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Cheques Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="sales" name="permissions[]" value="sales"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Sales Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="expenses" name="permissions[]" value="expenses"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Expenses Page</span>
                            </label>

                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" id="returns_exchanges" name="permissions[]" value="returns_exchanges"
                                    class="w-6 h-6 border-2 border-[#046636] rounded checked:bg-[#046636] checked:border-[#046636] focus:ring-[#046636]/30">
                                <span class="text-[#046636]/80 font-semibold">Can access Returns & Exchanges Page</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>

        </x-admin.modal>
        
    </main>

</body>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
<script src="{{ asset('js/admin/employee.js') }}"></script>
</html>