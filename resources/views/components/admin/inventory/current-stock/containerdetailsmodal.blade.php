<x-admin.modal modalid="containerdetailsmodal" modaltitle="Container's Details" closemodal="closecontainerdetailsmodal" modalwidth="max-w-3xl">
    <div class="w-full overflow-x-auto border-2 border-[#046636] rounded-xl mt-4">
        <table class="w-full text-[#046636]">
            <thead class="bg-[#046636]/10 text-[#046636] font-semibold">
                <tr>
                    <th class="p-5 text-center">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Type</div>
                            <div class="text-[#EB7100] text-sm font-medium">On Bag</div>
                        </div>
                    </th>

                    <th class="p-5 text-center">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">UoM</div>
                            <div class="text-[#EB7100] text-sm font-medium">On Hand</div>
                        </div>
                    </th>

                    <th class="p-5 text-center">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">Type</div>
                            <div class="text-[#EB7100] text-sm font-medium">Reserved</div>
                        </div>
                    </th>

                    <th class="p-5 text-center">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">UoM</div>
                            <div class="text-[#EB7100] text-sm font-medium">Reserved</div>
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 text-gray-700">
                <tr class="hover:bg-[#046636]/5 transition-colors">
                    <td class="p-5 text-center">
                        <div class="flex flex-col items-center">
                            <div>Bag</div>
                            <div class="font-bold text-[#EB7100]">78</div>
                        </div>
                    </td>

                    <td class="p-5 text-center">
                        <div class="flex flex-col items-center">
                            <div>Kilo</div>
                            <div class="font-bold text-[#EB7100]">40</div>
                        </div>
                    </td>

                    <td class="p-5 text-center">
                        <div class="flex flex-col items-center">
                            <div>Bag</div>
                            <div class="font-bold text-[#EB7100]">78</div>
                        </div>
                    </td>

                    <td class="p-5 text-center">
                        <div class="flex flex-col items-center">
                            <div>Kilo</div>
                            <div class="font-bold text-[#EB7100]">40</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin.modal>