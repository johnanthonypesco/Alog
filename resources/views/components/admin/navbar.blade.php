<nav class="bg-[#046636] h-full w-0 md:w-64 flex flex-col justify-between items-center fixed left-0 top-0 py-5 overflow-hidden transition-all duration-300 ease-in-out z-1" id="nav">
    <div class="flex items-center justify-center relative">
        <img src="{{asset('images/Logo.png')}}" alt="Logo" class="w-32">
        <button class="bg-white rounded-sm p-1 absolute -bottom-10 -right-15 cursor-pointer hidden md:block" id="shrink">
            <i class="fa-solid fa-arrows-minimize text-[#EB7100] text-lg"></i>
        </button>
    </div>
    <ul class="flex flex-col gap-2 text-white w-full overflow-auto h-full">
        <a href="#" class="text-xl font-bold p-2 ml-5 mt-8 ">Dashboard</a>
        <li class="w-full pl-5">
            <a href="#" onclick="openmenu(event, 'inventory')" class="text-xl font-bold flex items-center justify-between p-2 pl-6">
                Inventory
                <i class="fa-solid fa-angle-down transition-transform duration-300" id="inventory-icon"></i>
            </a>
            <ul class="overflow-hidden max-h-0 transition-[max-height] duration-500 ease-in-out" id="inventory-menu">
                {{-- menu na ilalagay dito para sa accounting --}}
                <li class="flex flex-col gap-1 text-white text-sm font-semibold mt-2 w-full pl-6">
                    <a href="{{route('admin.inventory.currentstock')}}" class="text-lg {{ request()->routeIs('admin.inventory.currentstock') ? 'active' : '' }}">Current Stocks</a>
                    <a href="" class="text-lg">For Release</a>
                    <a href="{{route('admin.inventory.products')}}" class="text-lg {{ request()->routeIs('admin.inventory.products') ? 'active' : ''}}">Products</a>
                    <a href="{{route('admin.suppliers.index')}}" class="text-lg">Suppliers and Branches</a>
                </li>
            </ul>
        </li>
        <a href="#" class="text-xl font-bold p-2 ml-5">Orders</a>
        
        <li class="w-full pl-5">
            <a href="#" onclick="openmenu(event, 'accounting')" class="text-xl font-bold flex items-center justify-between p-2 pl-6">
                Accounting
                <i class="fa-solid fa-angle-down transition-transform duration-300" id="accounting-icon"></i>
            </a>
            <ul class="overflow-hidden max-h-0 transition-[max-height] duration-500 ease-in-out" id="accounting-menu">
                {{-- menu na ilalagay dito para sa accounting --}}
                <li class="flex flex-col gap-1 text-white text-sm font-semibold mt-2 w-full pl-6">
                    <a href="#" class="text-lg">Cooperatives</a>
                    <a href="#" class="text-lg">Big Land Owners</a>
                    <a href="#" class="text-lg">Individual</a>
                </li>
            </ul>
        </li>

        <a href="{{route('admin.employee')}}" class="text-xl font-bold p-2 ml-5 {{ request()->routeIs('admin.employee') ? 'active' : '' }}">Employees</a>
        
        <li class="w-full pl-5">
            <a href="#" onclick="openmenu(event, 'accounts')" class="text-xl font-bold flex items-center justify-between p-2 pl-6">
                Customers
                <i class="fa-solid fa-angle-down transition-transform duration-300 rotate-180" id="accounts-icon"></i>
            </a>
            <ul class="overflow-hidden max-h-[24rem] transition-[max-height] duration-500 ease-in-out" id="accounts-menu">
                <li class="flex flex-col gap-1 text-white text-sm font-semibold mt-2 w-full pl-6">
                    <a href="#" class="text-lg">Cooperatives</a>
                    <a href="#" class="text-lg">Big Land Owners</a>
                    <a href="#" class="text-lg">Individual</a>
                </li>
            </ul>
        </li>
    </ul>

    <form action="#">
        <button class="bg-[#EB7100] text-lg text-white p-3 w-58 rounded-xl" id="logout"><i class="fa-regular fa-arrow-right-from-bracket cursor-pointer"></i> <span id="logouttext">Logout</span></button>
    </form>
</nav>