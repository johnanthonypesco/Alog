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