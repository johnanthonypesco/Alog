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
