function closeAllSubmenus(exceptId = null) {
    const menuIds = ['inventory', 'accounting', 'accounts'];
    
    menuIds.forEach(id => {
        if (id === exceptId) return;
        
        const menu = document.getElementById(id + '-menu');
        const icon = document.getElementById(id + '-icon');
        if (!menu || !icon) return;
        
        menu.classList.remove('max-h-[24rem]');
        menu.classList.add('max-h-0');
        icon.classList.remove('rotate-180');
    });
}

function autoCloseWhenNoActiveLink() {
    const menuIds = ['inventory', 'accounting', 'accounts'];
    
    menuIds.forEach(id => {
        const menuEl = document.getElementById(id + '-menu');
        const iconEl = document.getElementById(id + '-icon');
        if (!menuEl || !iconEl) return;
        
        const hasActive = menuEl.querySelector('a.active');
        
        if (!hasActive) {
            menuEl.classList.remove('max-h-[24rem]');
            menuEl.classList.add('max-h-0');
            iconEl.classList.remove('rotate-180');
        }
    });
}

function autoOpenActiveSubmenus() {
    const menuIds = ['inventory', 'accounting', 'accounts'];
    
    menuIds.forEach(id => {
        const menuEl = document.getElementById(id + '-menu');
        const iconEl = document.getElementById(id + '-icon');
        if (!menuEl || !iconEl) return;
        
        const hasActive = menuEl.querySelector('a.active');
        
        if (hasActive) {
            closeAllSubmenus(id);
            menuEl.classList.remove('max-h-0');
            menuEl.classList.add('max-h-[24rem]');
            iconEl.classList.add('rotate-180');
        }
    });
}

function openmenu(event, menuId) {
    event.preventDefault();
    
    const menu = document.getElementById(menuId + '-menu');
    const icon = document.getElementById(menuId + '-icon');
    if (!menu || !icon) return;
    
    const isCurrentlyOpen = !menu.classList.contains('max-h-0');
    
    closeAllSubmenus(menuId);
    
    if (isCurrentlyOpen) {
        menu.classList.remove('max-h-[24rem]');
        menu.classList.add('max-h-0');
        icon.classList.remove('rotate-180');
    } else {
        menu.classList.remove('max-h-0');
        menu.classList.add('max-h-[24rem]');
        icon.classList.add('rotate-180');
    }
}

function shrink() {
    const nav = document.getElementById('nav');
    const main = document.getElementById('main');
    const header = document.getElementById('header');
    const shrinkBtn = document.getElementById('shrink');
    const logout = document.getElementById('logout');
    const logouttext = document.getElementById('logouttext');
    const navlinks = nav.querySelectorAll('a');
    const shrink2 = document.getElementById('shrink2');

    if (!shrinkBtn) return;

    shrinkBtn.addEventListener('click', () => {
        if (nav.classList.contains('md:w-64')) {
            shrink2?.classList.remove('hidden');
            shrinkBtn.classList.add('hidden');
            nav.classList.remove('md:w-64');
            nav.classList.add('md:w-0');
            main?.classList.remove('md:ml-64');
            main?.classList.add('md:ml-0');
            header?.classList.remove('md:left-64');
            header?.classList.add('md:left-0');
            logouttext.style.display = 'none';
            logout.classList.add('md:w-0');
            logout.classList.remove('md:w-58');
            navlinks.forEach(link => link.classList.add('hidden'));
        }
    });

    shrink2?.addEventListener('click', () => {
        if (nav.classList.contains('md:w-0') || nav.classList.contains('md:w-20')) {
            shrinkBtn?.classList.remove('hidden');
            shrink2.classList.add('hidden');
            nav.classList.remove('md:w-0', 'md:w-20');
            nav.classList.add('md:w-64');
            main?.classList.remove('md:ml-0', 'md:ml-20');
            main?.classList.add('md:ml-64');
            header?.classList.remove('md:left-0', 'md:left-20');
            header?.classList.add('md:left-64');
            logouttext.style.display = 'inline';
            logout.classList.remove('md:w-0', 'md:w-12');
            logout.classList.add('md:w-58');
            navlinks.forEach(link => link.classList.remove('hidden'));
        }
    });
}

window.addEventListener('load', () => {
    autoOpenActiveSubmenus();
    autoCloseWhenNoActiveLink();
    shrink();
});