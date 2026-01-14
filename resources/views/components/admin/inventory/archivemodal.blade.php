<x-admin.modal modalid="viewarchivemodal" modaltitle="Arhived Accounts" closemodal="closeviewarchivemodal" modalwidth="max-w-4xl">
    <div class="w-full overflow-auto border-2 border-[#046636] rounded-lg mt-5">
        <table class="w-full">
            <thead class="bg-[#046636]/20">
                <tr>
                    <th class="p-5">
                        <div class="flex gap-2 items-center justify-center">
                            <h1>Name</h1>
                            <button><i class="fa-solid fa-angle-down"></i></button>
                        </div>
                    </th>
                    <th class="p-5">
                        <div class="flex gap-2 items-center justify-center">
                            <h1>Email</h1>
                            <button><i class="fa-solid fa-angle-down"></i></button>
                        </div>
                    </th>
                    <th class="p-5">
                        Role
                    </th>
                    <th class="p-5 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center!">Cashero</td>
                    <td class="text-center!">cashier@gmail.com</td>
                    <td class="text-center!">Cashier</td>
                    <td>
                        <div class="flex items-center justify-center gap-2">
                            <button class="p-2 bg-blue-200 rounded-md flex gap-2 items-center text-blue-700"><i class="fa-solid fa-rotate-left text-blue-700"></i>Restore</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin.modal>