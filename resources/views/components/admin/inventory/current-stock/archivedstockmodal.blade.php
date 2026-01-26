<x-admin.modal modalid="archivedstockmodal" modaltitle="Archived Stock" closemodal="closearchivedstockmodal" modalwidth="max-w-6xl">
    <div class="w-full overflow-x-auto border-2 border-[#046636] rounded-xl mt-4">
        <table class="w-full text-[#046636]">
            <thead class="bg-[#046636]/10 text-[#046636] font-semibold">
                <tr>
                    <th class="p-5 text-left">
                        <div class="flex items-center gap-2">
                            Product
                            <button type="button">
                                <i class="fa-solid fa-angle-down text-sm"></i>
                            </button>
                        </div>
                    </th>
                    <th class="p-5 text-right">SRP</th>
                    <th class="p-5 text-right">Unit Cost</th>
                    <th class="p-5 text-right">Avg Cost</th>

                    <!-- Amount / Contents column -->
                    <th class="p-5 text-center">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">
                                Amount
                            </div>
                            <div class="text-[#EB7100] text-sm font-medium">
                                Contents
                            </div>
                        </div>
                    </th>

                    <!-- Type / On Bag -->
                    <th class="p-5 text-center">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">
                                Type
                            </div>
                            <div class="text-[#EB7100] text-sm font-medium">
                                On Bag
                            </div>
                        </div>
                    </th>

                    <!-- UoM / On Hand -->
                    <th class="p-5 text-center">
                        <div class="flex flex-col items-center leading-tight">
                            <div class="border-b-2 border-[#EB7100] pb-0.5 mb-1 w-fit">
                                UoM
                            </div>
                            <div class="text-[#EB7100] text-sm font-medium">
                                On Hand
                            </div>
                        </div>
                    </th>

                    <th class="p-5 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 text-gray-700">
                <tr class="hover:bg-[#046636]/5 transition-colors">
                    <td class="p-5 font-medium">
                        14-14-14<br>
                        <span class="font-bold text-[#046636]">Swire</span>
                    </td>
                    <td class="p-5 text-right">₱1,500.00</td>
                    <td class="p-5 text-right">₱1,500.00</td>
                    <td class="p-5 text-right">₱1,500.00</td>

                    <td class="p-5 text-center">
                        <div class="flex flex-col items-center">
                            <div>₱138,372.12</div>
                            <div class="font-bold text-[#EB7100]">50</div>
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

                    <td class="p-5 text-center">
                        <div class="flex items-center justify-center gap-3">
                            {{-- restore btn but icon and text --}}
                            <button class="text-[#046636] font-bold text-lg p-2 rounded-lg border-2 border-[#046636]"><i class="fa-solid fa-rotate-left text-[#046636]"></i> Restore</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin.modal>