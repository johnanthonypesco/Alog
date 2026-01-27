function innerContainer() {
    const btns = document.querySelectorAll('#innercontainerbtn');
    const modal = document.getElementById('innercontainermdoal');
    const closeBtn = document.getElementById('closeinnercontainermodal');

    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }
}

function createreleases() {
    const btns = document.querySelectorAll('#createreleasebtn');
    const modal = document.getElementById('createreleasesmodal');
    const closeBtn = document.getElementById('closecreatereleasesmodal');

    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }
}

innerContainer();
createreleases();