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
    <h1 class="text-white font-semibold text-2xl text-center">
        <span>5 mins remaining</span>
    </h1>

    <div class="flex items-center gap-4">
        <a href="{{route ('admin.login')}}" class="p-4 bg-white rounded-lg flex items-center">
            <span class="text-green-700 font-bold text-2xl"><i class="fa-solid fa-angle-left"></i></span>
        </a>
        <h1 class="p-4 rounded-lg bg-white text-green-800 font-bold text-2xl text-center tracking-wider md:px-24">
            2-Factor Authentication
        </h1>
    </div>

    <div class="bg-white p-10 w-full max-w-2xl rounded-xl relative">
        <form action="" class="p-5 flex flex-col gap-8 items-center">
            <h1 class="text-center text-3xl font-bold text-green-700">
                Enter the 6-digit code sent to your email:
            </h1>

            <div class="flex gap-3 mt-5 justify-center">
                @for ($i = 0; $i < 6; $i++)
                    <input
                        type="text"
                        maxlength="1"
                        class="w-12 h-12 md:w-16 md:h-16 text-center text-3xl font-bold border-2 border-green-800 rounded-lg focus:border-green-700 focus:outline-none transition text-green-700"
                        inputmode="numeric"
                        pattern="[0-9]*"
                        autocomplete="one-time-code"
                        name="code[]"
                        autofocus="{{ $i === 0 ? 'autofocus' : '' }}"
                        placeholder="{{ $i + 0 }}"
                    />
                @endfor
            </div>

            <input type="hidden" name="verification_code" id="verification_code">

            <button
                class="bg-[#EB7100] text-white font-semibold px-8 py-3 rounded-2xl hover:bg-green-900 transition hover:-translate-y-1 w-fit text-xl flex items-center justify-center"
                type="submit"
            >
                Verify Code
            </button>
        </form>
        <div>
            <h1 class="mt-5 text-green-700 font-semibold">Didn't receive the code? <a href="#" class="text-green-700 underline font-bold">Click here to resend</a></h1>
        </div>

       <div class="absolute bottom-0 right-0 w-36 md:w-48">
            <img src="{{asset('images/Flower 4 - Green.png')}}" alt="Flower">
        </div>
    </div>  
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('input[name="code[]"]');
        const hiddenInput = document.getElementById('verification_code');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                const value = e.target.value;
                if (value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                updateHiddenInput();
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasted = (e.clipboardData || window.clipboardData).getData('text').trim();
                if (/^\d{1,6}$/.test(pasted)) {
                    const digits = pasted.split('');
                    inputs.forEach((inp, i) => {
                        if (i < digits.length) {
                            inp.value = digits[i];
                        }
                    });
                    if (digits.length < 6) {
                        inputs[digits.length].focus();
                    }
                    updateHiddenInput();
                }
            });
        });

        function updateHiddenInput() {
            const code = Array.from(inputs).map(inp => inp.value).join('');
            hiddenInput.value = code;
        }
    });
</script>
</html>