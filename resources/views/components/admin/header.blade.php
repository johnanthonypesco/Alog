@props(['title' => 'Title', 'subtitle' => 'Subtitle'])

<header id="header" class="bg-[#046636] fixed top-0 left-0 right-0 ml-0 md:left-64 h-20 flex items-center justify-between px-10 transition-all duration-300 ease-in-out z-1">
    <h1 class="text-xl font-bold text-white p-5 relative">
        <span>{{ $title }}</span> 
        <i class="fa-solid fa-angle-right mx-2"></i> 
        <span>{{ $subtitle }}</span>
         <button class="bg-white p-2 rounded-lg items-center justify-center absolute bottom-0 -right-20 shadow-md hover:bg-gray-100 transition hidden" id="shrink2">
            <i class="fa-solid fa-arrows-maximize text-[#EB7100] text-xl"></i>
        </button>
    </h1>
    <div class="bg-white p-2 rounded-xl shadow-md hidden md:block">
        <h1 class="font-bold text-[#EB7100] text-lg text-center">Owner</h1>
        <p class="text-sm text-center text-gray-600">owner@gmail.com</p>
    </div>

    <div id="burger-menu" class="md:hidden">
        <i class="fa-solid fa-bars text-white text-2xl cursor-pointer"></i>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const burgerMenu = document.getElementById('burger-menu');
        const nav = document.getElementById('nav');
        const shrink2 = document.getElementById('shrink2');
        const shrink = document.getElementById('shrink');

        burgerMenu.addEventListener('click', () => {
            nav.classList.toggle('w-0');
            nav.classList.toggle('w-64');
            shrink2.classList.add('hidden');
            shrink.classList.add('hidden');

        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                nav.classList.remove('w-0');
                nav.classList.add('w-64');
            } else {
                nav.classList.remove('w-64');
                nav.classList.add('w-0');
            }
        });

        // if click outside nav and burgerMenu, close nav
        document.addEventListener('click', (event) => {
            const isClickInsideNav = nav.contains(event.target);
            const isClickOnBurgerMenu = burgerMenu.contains(event.target);

            if (!isClickInsideNav && !isClickOnBurgerMenu && window.innerWidth <= 768) {
                nav.classList.add('w-0');
                nav.classList.remove('w-64');
            }
        });
    });
</script>