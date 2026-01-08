function checkActiveSubmenu() {
    const allSubmenus = ['accounting', 'accounts'];
    
    allSubmenus.forEach(menuId => {
        const menu = document.getElementById(menuId + '-menu');
        const icon = document.getElementById(menuId + '-icon');
        
        const activeItem = menu.querySelector('a.active');
        
        if (activeItem) {
            menu.classList.remove('max-h-0');
            menu.classList.add('max-h-[24rem]');
            icon.classList.add('rotate-180');
        } else {
            menu.classList.remove('max-h-[24rem]');
            menu.classList.add('max-h-0');
            icon.classList.remove('rotate-180');
        }
    });
}

function openmenu(event, menuId) {
    event.preventDefault();
    
    const menu = document.getElementById(menuId + '-menu');
    const icon = document.getElementById(menuId + '-icon');
    const allmenu = ['accounting', 'accounts', 'inventory'];
    
    allmenu.forEach(id => {
        if (id !== menuId) {
            const otherMenu = document.getElementById(id + '-menu');
            const otherIcon = document.getElementById(id + '-icon');
            otherMenu.classList.remove('max-h-[24rem]');
            otherMenu.classList.add('max-h-0');
            otherIcon.classList.remove('rotate-180');
        }
    });
    
    if (menu.classList.contains('max-h-0')) {
        menu.classList.remove('max-h-0');
        menu.classList.add('max-h-[24rem]');
        icon.classList.add('rotate-180');
    } else {
        menu.classList.remove('max-h-[24rem]');
        menu.classList.add('max-h-0');
        icon.classList.remove('rotate-180');
    }
}

function shrink() {
    const nav = document.getElementById('nav');
    const main = document.getElementById('main');
    const header = document.getElementById('header');
    const shrink = document.getElementById('shrink');
    const logout = document.getElementById('logout');
    const logouttext = document.getElementById('logouttext');
    const navlinks = nav.querySelectorAll('a');

    // when click nav it will shrink
    shrink.addEventListener('click', () => {
        if (nav.classList.contains('md:w-64')) {
            nav.classList.remove('md:w-64');
            nav.classList.add('md:w-20');
            main.classList.remove('md:ml-64');
            main.classList.add('md:ml-20');
            header.classList.remove('md:left-64');
            header.classList.add('md:left-20');
            logouttext.style.display = 'none';
            logout.classList.add('md:w-12');
            logout.classList.remove('md:w-58');
            navlinks.forEach(link => {
                link.classList.add('hidden');
            });
        } else {
            nav.classList.remove('md:w-20');
            nav.classList.add('md:w-64');
            main.classList.remove('md:ml-20');
            main.classList.add('md:ml-64');
            header.classList.remove('md:left-20');
            header.classList.add('md:left-64');
            logouttext.style.display = 'inline';
            logout.classList.remove('md:w-12');
            logout.classList.add('md:w-58');
            navlinks.forEach(link => {
                link.classList.remove('hidden');
            })
        }
    });


}

window.onload = function() {
    checkActiveSubmenu();
    shrink();
};