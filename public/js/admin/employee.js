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

    const editEmployeeBtns = document.querySelectorAll('#editemployeebtn');
    editEmployeeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modalContainer.classList.remove('hidden');
        });
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
function editemployeerole() {
    const editEmployeeRoleBtn = document.getElementById('editemployeerolebtn');
    const modalContainer = document.querySelector('#editemployeerolemodal').parentElement;
    const closeBtn = document.getElementById('closeeditemployeerolemodal');

    if (!editEmployeeRoleBtn || !modalContainer || !closeBtn) return;

    const editEmployeeRoleBtns = document.querySelectorAll('#editemployeerolebtn');
    editEmployeeRoleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modalContainer.classList.remove('hidden');
        });
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

function viewarchiverole() {
    const viewArchiveRoleBtn = document.getElementById('viewarchiverolebtn');
    const modalContainer = document.querySelector('#viewarchiverolemodal').parentElement;
    const closeBtn = document.getElementById('closeviewarchiverolemodal');

    if (!viewArchiveRoleBtn || !modalContainer || !closeBtn) return;

    viewArchiveRoleBtn.addEventListener('click', () => {
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
function viewarchive() {
    const viewArchiveBtn = document.getElementById('viewarchivebtn');
    const modalContainer = document.querySelector('#viewarchivemodal').parentElement;
    const closeBtn = document.getElementById('closeviewarchivemodal');

    if (!viewArchiveBtn || !modalContainer || !closeBtn) return;

    viewArchiveBtn.addEventListener('click', () => {
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
function cashadvancement() {
    const cashAdvancementBtns = document.querySelectorAll('#cashadvancementbtn');
    const modalContainer = document.querySelector('#cashadvancementmodal').parentElement;
    const closeBtn = document.getElementById('closecashadvancementmodal');

    if (!cashAdvancementBtns || !modalContainer || !closeBtn) return;

    cashAdvancementBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modalContainer.classList.remove('hidden');
        });
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
document.addEventListener('DOMContentLoaded', editemployeerole);
document.addEventListener('DOMContentLoaded', viewarchiverole);
document.addEventListener('DOMContentLoaded', viewarchive);
document.addEventListener('DOMContentLoaded', cashadvancement);