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
                <button class="border-2 border-[#046636] p-2 rounded-lg text-2xl font-bold text-[#046636]">Manage Roles</button>
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

        <x-admin.modal modalid="createemployeemodal" modaltitle="Create Employee" closemodal="closecreateemployeemodal">
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
    </main>

</body>
<script src="{{ asset('js/admin/navbar.js') }}"></script>
<script src="{{ asset('js/admin/employee.js') }}"></script>
</html>