// Helper: Close all submenus except the one we want to keep open (optional param)
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

// Auto-open submenus that contain an active link (runs on load)
function autoOpenActiveSubmenus() {
    const menuIds = ['inventory', 'accounting', 'accounts'];
    
    menuIds.forEach(id => {
        const menuEl = document.getElementById(id + '-menu');
        const iconEl = document.getElementById(id + '-icon');
        if (!menuEl || !iconEl) return;
        
        // Check if ANY <a> inside this submenu has .active
        const hasActive = menuEl.querySelector('a.active');
        
        if (hasActive) {
            closeAllSubmenus(id);           // close others
            menuEl.classList.remove('max-h-0');
            menuEl.classList.add('max-h-[24rem]');
            iconEl.classList.add('rotate-180');
        }
    });
}

// Toggle single menu when clicking parent
function openmenu(event, menuId) {
    event.preventDefault();
    
    const menu = document.getElementById(menuId + '-menu');
    const icon = document.getElementById(menuId + '-icon');
    if (!menu || !icon) return;
    
    const isCurrentlyOpen = !menu.classList.contains('max-h-0');
    
    // Always close others first
    closeAllSubmenus(menuId);
    
    if (isCurrentlyOpen) {
        // Close this one
        menu.classList.remove('max-h-[24rem]');
        menu.classList.add('max-h-0');
        icon.classList.remove('rotate-180');
    } else {
        // Open this one
        menu.classList.remove('max-h-0');
        menu.classList.add('max-h-[24rem]');
        icon.classList.add('rotate-180');
    }
}

// Shrink toggle function (unchanged, but included for completeness)
function shrink() {
    const nav = document.getElementById('nav');
    const main = document.getElementById('main');
    const header = document.getElementById('header');
    const shrinkBtn = document.getElementById('shrink');
    const logout = document.getElementById('logout');
    const logouttext = document.getElementById('logouttext');
    const navlinks = nav.querySelectorAll('a');

    if (!shrinkBtn) return;

    shrinkBtn.addEventListener('click', () => {
        if (nav.classList.contains('md:w-64')) {
            nav.classList.remove('md:w-64');
            nav.classList.add('md:w-20');
            main?.classList.remove('md:ml-64');
            main?.classList.add('md:ml-20');
            header?.classList.remove('md:left-64');
            header?.classList.add('md:left-20');
            logouttext.style.display = 'none';
            logout.classList.add('md:w-12');
            logout.classList.remove('md:w-58');  // assuming w-58 is typo for w-60 or similar
            navlinks.forEach(link => link.classList.add('hidden'));
        } else {
            nav.classList.remove('md:w-20');
            nav.classList.add('md:w-64');
            main?.classList.remove('md:ml-20');
            main?.classList.add('md:ml-64');
            header?.classList.remove('md:left-20');
            header?.classList.add('md:left-64');
            logouttext.style.display = 'inline';
            logout.classList.remove('md:w-12');
            logout.classList.add('md:w-58');
            navlinks.forEach(link => link.classList.remove('hidden'));
        }
    });
}

// Run on page load
window.addEventListener('load', () => {
    autoOpenActiveSubmenus();
    shrink();
});