<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALOG</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
</head>
<body class="bg-no-repeat bg-center bg-cover min-h-screen flex items-center justify-center flex-col gap-5 p-5" style="background-image: url('{{ asset('images/Login BG.png') }} ') ; background-size: cover; background-position: center;">
    <h1 class="p-4 rounded-lg bg-white text-green-800 font-bold text-2xl text-center shadow-lg">
        ALOG AGRICULTURAL SUPPLY
    </h1>

    <div class="bg-white p-10 rounded-3xl w-full max-w-2xl flex flex-col-reverse md:flex-row items-center gap-5 relative shadow-2xl">
        
        <div class="w-full md:max-w-[60%]">
            <h1 class="text-3xl text-green-800 font-semibold">Owner Login</h1>
            
            <form method="POST" action="{{ route('login') }}" class="mt-8">
                @csrf <div class="mb-4">
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           placeholder="Enter your Email" 
                           required 
                           autofocus
                           class="outline-none p-3 border-2 border-green-800 w-full rounded-lg focus:ring-2 focus:ring-green-500">
                    
                    @error('email')
                        <span class="text-red-600 text-sm mt-1 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative mt-5 mb-4">
                    <input type="password" 
                           name="password" 
                           id="passwordInput"
                           placeholder="Enter your Password" 
                           required
                           class="outline-none p-3 border-2 border-green-800 w-full rounded-lg mt-3 focus:ring-2 focus:ring-green-500 pr-12">
                    
                    <div class="cursor-pointer w-fit absolute top-9.5 right-3 -translate-y-1/2" onclick="togglePassword()">
                        <img src="{{ asset('images/eye closed.png') }}" id="eyeIcon" alt="showpassword" class="w-6 h-6 opacity-70 hover:opacity-100 transition">
                    </div>

                    @error('password')
                        <span class="text-red-600 text-sm mt-1 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center gap-2 mt-5">
                    <input type="checkbox" 
                           id="remember_me" 
                           name="remember" 
                           class="w-5 h-5 outline-none border-2 border-green-800 rounded text-green-700 focus:ring-green-600">
                    <label for="remember_me" class="text-green-800 font-semibold text-lg cursor-pointer">Remember Me</label>
                </div>

                <button type="submit" class="bg-[#EB7100] text-white font-semibold px-8 py-2 rounded-2xl mt-8 hover:bg-orange-600 transition hover:-translate-y-1 w-full md:w-fit text-xl flex items-center justify-center shadow-md cursor-pointer z-1">
                    Sign In
                </button>
            </form>
            </div>

        <div class="w-full md:max-w-[40%] h-fit md:h-72 flex flex-col items-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="w-40 drop-shadow-lg">
        </div>

        <div class="absolute bottom-0 right-0 w-24 md:w-46 opacity-80 pointer-events-none z-0">
            <img src="{{ asset('images/Flower 4 - Green.png') }}" alt="Flower">
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                // Optional: Change icon opacity or image source to indicate "open"
                eyeIcon.style.opacity = '1'; 
            } else {
                passwordInput.type = 'password';
                eyeIcon.style.opacity = '0.7'; 
            }
        }
    </script>
</body>
</html>