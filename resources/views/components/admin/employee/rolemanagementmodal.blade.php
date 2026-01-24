<x-admin.modal modalid="createrolemodal" modaltitle="Role Management" closemodal="closecreaterolemodal">
    <div class="mt-5 flex gap-2">
        <button id="rolemanagementcreatebtn" class="bg-[#046636]/20 text-[#046636] border-2 border-[#046636] p-2 rounded-lg px-8 font-bold">Create Role</button>
        <button id="viewarchiverolebtn" class="border-2 text-[#046636] border-[#046636] p-2 rounded-lg px-8 font-bold">View Archived</button>

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
                            <button id="editemployeerolebtn" class="p-2 bg-blue-200 rounded-md"><i class="fa-solid fa-pencil text-blue-700"></i></button>
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