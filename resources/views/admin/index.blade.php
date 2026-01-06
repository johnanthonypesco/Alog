<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <title>AAS</title>
</head>
<body class="bg-gradient-to-r from-[#076637] to-[#12A65A] min-h-screen flex items-center justify-center flex-col gap-5 p-5">
    <h1 class="p-4 rounded-lg bg-white text-green-800 font-bold text-2xl text-center">
        ALOG AGRICULTURAL SUPPLY
    </h1>
    <div class="bg-white p-10 rounded-3xl w-full max-w-3xl flex flex-col-reverse md:flex-row items-center gap-5 relative">
        <div class="w-full md:max-w-[60%]">
            <h1 class="text-3xl text-green-800 font-semibold">Owner Login</h1>
            <form action="" class="mt-10">
                <input type="text" placeholder="Enter your Email" class="outline-none p-3 border-2 border-green-800 w-full rounded-lg">
                <div class="relative mt-5">
                    <input type="password" placeholder="Enter your Password" class="outline-none p-3 border-2 border-green-800 w-full rounded-lg mt-3">
                    <div class="cursor-pointer w-fit absolute top-9.5 right-3 -translate-y-1/2">
                        <img src="{{ asset('images/eye closed.png') }}" alt="showpassword" class="w-8 h-8">
                    </div>
                </div>

                <div class="flex items-center gap-2 mt-5">
                    <input type="checkbox" id="rememberme" class="w-7 h-7 outline-none border-2 border-green-800">
                    <label for="rememberme" class="text-green-800 font-semibold text-xl">Remember Me</label>
                </div>

                <button class="bg-[#EB7100] text-white font-semibold px-8 py-2 rounded-2xl mt-8 hover:bg-green-900 transition hover:-translate-y-1 w-fit text-xl flex items-center justify-center">
                    Sign In
                </button>
            </form>
        </div>

        <div class="w-full md:max-w-[40%] h-fit md:h-72 flex flex-col items-center">
            <img src="{{asset('images/Logo.png')}}" alt="Logo" class="w-36">
        </div>

        <div class="absolute bottom-0 right-0 w-36 md:w-48">
            <img src="{{asset('images/Flower 4 - Green.png')}}" alt="Flower">
        </div>
    </div>
</body>
</html>