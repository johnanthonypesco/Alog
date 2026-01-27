<x-admin.modal modalid="createreleasesmodal" modalwidth="max-w-lg" modaltitle="Create Release" closemodal="closecreatereleasesmodal">
    <form action="" class="w-full mt-5 max-h-[80vh] overflow-auto p-2">
        <div class="relative">
            <select name="releases" id="releases" class="w-full border-2 border-[#046636] rounded-lg p-3 text-[#046636] font-bold bg-[#046636]/20">
                <option value="releases">Select Releases</option>
                <option value="release1">14-14-14 Swire</option>
            </select>
            <h1 class="text-red-700 text-xl absolute top-2 right-5">*</h1>
        </div>

        <hr class="border-2 border-blue-700 mt-5">

        <h1 class="text-2xl font-bold text-blue-700 mt-5">Container 1</h1>
        <div class="flex flex-col w-full mt-2">
            <label for="quantity" class="text-[#046636] font-bold">Quantity:</label>
            <div class="flex gap-2">
                <div class="relative">
                    <input type="text" name="quantity" id="quantity" placeholder="Enter Quantity" class="w-full border-2 border-[#046636] rounded-lg p-3 text-[#046636] font-bold bg-[#046636]/20">
                    <h1 class="text-red-700 text-xl absolute top-2 right-5">*</h1>
                </div>
                <div class="bg-[#046636]/20 w-1/2 rounded-lg p-3 ">
                    <h1 class="text-[#046636] font-bold">Type: Box</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full mt-2">
            <label for="quantity" class="text-[#046636] font-bold">Quantity:</label>
            <div class="flex gap-2">
                <div class="relative">
                    <input type="text" name="quantity" id="quantity" placeholder="Enter Quantity" class="w-full border-2 border-[#046636] rounded-lg p-3 text-[#046636] font-bold bg-[#046636]/20">
                    <h1 class="text-red-700 text-xl absolute top-2 right-5">*</h1>
                </div>
                <div class="bg-[#046636]/20 w-1/2 rounded-lg p-3 ">
                    <h1 class="text-[#046636] font-bold">UoM: Box</h1>
                </div>
            </div>
        </div>

        <hr class="border-2 border-blue-700 mt-5">

        <h1 class="text-2xl font-bold text-blue-700 mt-5">Container 2</h1>
        <div class="bg-[#046636]/20 w-full rounded-lg p-3 ">
            <h1 class="text-[#046636] font-bold">Inside: Boxes</h1>
        </div>

        <div class="flex flex-col w-full mt-2">
            <label for="quantity" class="text-[#046636] font-bold">Quantity:</label>
            <div class="flex gap-2">
                <div class="relative">
                    <input type="text" name="quantity" id="quantity" placeholder="Enter Quantity" class="w-full border-2 border-[#046636] rounded-lg p-3 text-[#046636] font-bold bg-[#046636]/20">
                    <h1 class="text-red-700 text-xl absolute top-2 right-5">*</h1>
                </div>
                <div class="bg-[#046636]/20 w-1/2 rounded-lg p-3 ">
                    <h1 class="text-[#046636] font-bold">UoM: Box</h1>
                </div>
            </div>
        </div>

        <hr class="border-2 border-blue-700 mt-5">

        <div class="relative mt-2">
            <select name="from" id="from" class="w-full border-2 border-[#046636] rounded-lg p-3 text-[#046636] font-bold bg-[#046636]/20">
                <option value="from">Choose Where It Was Taken From</option>
                <option value="from">Main Warehouse</option>
                <option value="from">Storage 1</option>
            </select>
            <h1 class="text-red-700 text-xl absolute top-2 right-5">*</h1>
        </div>

        <div class="relative mt-5">
            <select name="status" id="status" class="w-full border-2 border-[#046636] rounded-lg p-3 text-[#046636] font-bold bg-[#046636]/20">
                <option value="status">Choose Release's Status</option>
                <option value="status">Packing</option>
                <option value="status">Packed</option>
                <option value="status">Delivered</option>
            </select>
            <h1 class="text-red-700 text-xl absolute top-2 right-5">*</h1>
        </div>

        <div class="relative mt-5">
            <label for="customer" class="text-[#046636] font-bold">Customer:</label>
            <select name="customer" id="customer" class="w-full border-2 border-[#046636] rounded-lg p-3 text-[#046636] font-bold bg-[#046636]/20">
                <option value="customer">Select Customer</option>
                <option value="customer">Packing</option>
                <option value="customer">Packed</option>
                <option value="customer">Delivered</option>
            </select>
            <h1 class="text-red-700 text-xl absolute top-7 right-5">*</h1>
        </div>

        <button type="submit" class="w-full border-2 border-[#046636] p-2 rounded-lg text-lg font-bold text-[#046636] mt-8">Create & Add Another Release</button>
        <button type="submit" class="w-full bg-[#046636] text-white p-2 rounded-lg text-lg font-bold mt-2">Create</button>
    </form>
</x-admin.modal>