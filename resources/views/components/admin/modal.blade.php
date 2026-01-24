@props(['modalid' => '', 'modaltitle' => '', 'closemodal' => '', 'modalwidth' => 'max-w-lg'])

<div class="bg-black/50 backdrop-blur-[3px] w-full h-full fixed top-0 left-0 flex items-center justify-center px-5 z-2 hidden" id="{{$modalid}}">
    <div class="modal bg-white w-full p-5 rounded-2xl {{$modalwidth}}">
        <div class="flex justify-between items-center sticky top-0 bg-white">
            <h1 class="text-3xl text-[#046636] font-bold">{{$modaltitle}}</h1>
            <button class="border-2 border-[#046636] text-[#EB7100] p-2 rounded-lg px-4 font-bold" id="{{$closemodal}}">Close</button>
        </div>

        {{ $slot }}
    </div>
</div>

