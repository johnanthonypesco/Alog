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
