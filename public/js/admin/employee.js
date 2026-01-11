function createemployeemodal() {
    const addEmployeeBtn = document.getElementById('addemployeebtn');
    const modalContainer = document.querySelector('#createemployeemodal').parentElement;
    const closeBtn = document.getElementById('closecreateemployeemodal');

    if (!addEmployeeBtn || !modalContainer || !closeBtn) return;

    addEmployeeBtn.addEventListener('click', () => {
        modalContainer.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        modalContainer.classList.add('hidden');
    });

    modalContainer.addEventListener('click', (e) => {
        if (e.target === modalContainer) {
            modalContainer.classList.add('hidden');
        }
    });
}

function editemployeemodal() {
    const editEmployeeBtn = document.getElementById('editemployeebtn');
    const modalContainer = document.querySelector('#editemployeemodal').parentElement;
    const closeBtn = document.getElementById('closeeditemployeemodal');

    if (!editEmployeeBtn || !modalContainer || !closeBtn) return;

    editEmployeeBtn.addEventListener('click', () => {
        modalContainer.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        modalContainer.classList.add('hidden');
    });

    modalContainer.addEventListener('click', (e) => {
        if (e.target === modalContainer) {
            modalContainer.classList.add('hidden');
        }
    });
}


function addrole() {
    const createRoleBtn = document.getElementById('createrolebtn');
    const modalContainer = document.querySelector('#createrolemodal').parentElement;
    const closeBtn = document.getElementById('closecreaterolemodal');

    if (!createRoleBtn || !modalContainer || !closeBtn) return;

    createRoleBtn.addEventListener('click', () => {
        modalContainer.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        modalContainer.classList.add('hidden');
    });

    modalContainer.addEventListener('click', (e) => {
        if (e.target === modalContainer) {
            modalContainer.classList.add('hidden');
        }
    });
}
function createemployeerole() {
    const createEmployeeRoleBtn = document.getElementById('rolemanagementcreatebtn');
    const modalContainer = document.querySelector('#createemployeerolemodal').parentElement;
    const closeBtn = document.getElementById('closecreateemployeerolemodal');

    if (!createEmployeeRoleBtn || !modalContainer || !closeBtn) return;

    createEmployeeRoleBtn.addEventListener('click', () => {
        modalContainer.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        modalContainer.classList.add('hidden');
    });

    modalContainer.addEventListener('click', (e) => {
        if (e.target === modalContainer) {
            modalContainer.classList.add('hidden');
        }
    });
}


document.addEventListener('DOMContentLoaded', createemployeemodal);
document.addEventListener('DOMContentLoaded', editemployeemodal);
document.addEventListener('DOMContentLoaded', addrole);
document.addEventListener('DOMContentLoaded', createemployeerole);