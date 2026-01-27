<x-admin.modal modalid="innercontainermdoal" modalwidth="max-w-2xl" modaltitle="Inner Container" closemodal="closeinnercontainermodal">
    <h1 class="text-[#EB7100] font-semibold text-xl md:text-2xl">From: 14-14-14 Swire</h1>

    <div class="w-full mt-4 overflow-x-auto border-2 border-[#046636] rounded-xl">
        <table class="w-full text-[#046636]">
            <thead class="bg-[#046636]/10 text-[#046636] font-semibold">
                <tr>
                    <th class="p-4 sm:p-5 text-center whitespace-nowrap">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Type</div>
                            <div class="text-[#EB7100] text-xs sm:text-sm font-medium">On Bag</div>
                        </div>
                    </th>

                    <th class="p-4 sm:p-5 text-center whitespace-nowrap">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">UoM</div>
                            <div class="text-[#EB7100] text-xs sm:text-sm font-medium">On Hand</div>
                        </div>
                    </th>

                    <th class="p-4 sm:p-5 text-center whitespace-nowrap">Taken From</th>

                    <th id="actionth" class="p-4 sm:p-5 text-center whitespace-nowrap">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 text-gray-700">
                <tr class="hover:bg-[#046636]/5 transition-colors">
                    <td class="p-4 sm:p-5 text-center">
                        <div class="flex flex-col items-center">
                            <div>Bag</div>
                            <div class="font-bold text-[#EB7100] text-lg sm:text-xl">78</div>
                        </div>
                    </td>

                    <td class="p-4 sm:p-5 text-center">None</td>

                    <td class="p-4 sm:p-5 text-center">on hand</td>

                    <td id="actionbtn" class="p-4 sm:p-5 text-center">
                        <div class="flex items-center justify-center gap-2 sm:gap-3">
                            <button class="p-2 bg-blue-100 hover:bg-blue-200 rounded-md transition">
                                <i class="fa-solid fa-pencil text-blue-700"></i>
                            </button>
                            <button class="p-2 bg-red-100 hover:bg-red-200 rounded-md transition">
                                <i class="fa-solid fa-trash-can text-red-700"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin.modal>