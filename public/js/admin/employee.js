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

document.addEventListener('DOMContentLoaded', createemployeemodal);
document.addEventListener('DOMContentLoaded', editemployeemodal);