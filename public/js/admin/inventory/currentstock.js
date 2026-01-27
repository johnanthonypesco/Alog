function addStockModal() {
    const modal = document.getElementById('addstockmodal');
    const openBtn = document.getElementById('addstockbtn');
    const closeBtn = document.getElementById('closeaddstockmodal');

    if (!modal || !openBtn || !closeBtn) return;

    openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
}

function archivedStockModal() {
    const modal = document.getElementById('archivedstockmodal');
    const openBtn = document.getElementById('archivedstockbtn');
    const closeBtn = document.getElementById('closearchivedstockmodal');

    if (!modal || !openBtn || !closeBtn) return;

    openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
}

function auditMode() {
    const auditBtn       = document.getElementById('auditmodebtn');
    const exitNoSaveBtn  = document.getElementById('exitauditnosave');
    const exitSaveBtn    = document.getElementById('exitauditbtn');
    const auditContainer = document.getElementById('auditmode');
    const normalFilters  = document.getElementById('filters');
    const auditFilters   = document.getElementById('filters2');
    const addarchivebtn  = document.getElementById('addarchivebtn');
    const actionth       = document.getElementById('actionth');
    const containerth    = document.getElementById('containerth');
    const actionbtn      = document.getElementById('actionbtn');
    const containerbtn   = document.getElementById('containerbtn');
    const discrepancy     = document.getElementById('discrepancy');
    const discrepancytitle= document.getElementById('discrepancytitle');
    const reseredth      = document.getElementById('reservedth');
    const reservedtd     = document.getElementById('reservedtd');
    const containerdetailsmodal = document.getElementById('containerdetailsmodal');
    const closecontainerdetailsmodal = document.getElementById('closecontainerdetailsmodal');


    if (!auditBtn || !auditContainer || !normalFilters || !auditFilters) {
        console.warn('Audit mode elements missing');
        return;
    }

    auditBtn.addEventListener('click', () => {
        auditContainer.classList.remove('hidden');
        normalFilters.classList.add('hidden');
        auditFilters.classList.remove('hidden');
        addarchivebtn.classList.add('hidden');
        actionth.classList.add('hidden');
        containerth.classList.remove('hidden');
        actionbtn.classList.add('hidden');
        containerbtn.classList.remove('hidden');
        discrepancy.classList.remove('hidden');
        discrepancytitle.classList.remove('hidden');
        reseredth.classList.remove('hidden');
        reservedtd.classList.remove('hidden');
    });

    [exitNoSaveBtn, exitSaveBtn].forEach(btn => {
        if (btn) {
            btn.addEventListener('click', () => {
                auditContainer.classList.add('hidden');
                normalFilters.classList.remove('hidden');
                auditFilters.classList.add('hidden');
                addarchivebtn.classList.remove('hidden');
                actionth.classList.remove('hidden');
                containerth.classList.add('hidden');
                actionbtn.classList.remove('hidden');
                containerbtn.classList.add('hidden');
                discrepancy.classList.add('hidden');
                discrepancytitle.classList.add('hidden');
                reseredth.classList.add('hidden');
                reservedtd.classList.add('hidden');
            });
        }
    });

    containerbtn.addEventListener('click', () => {
        containerdetailsmodal.classList.remove('hidden');
    });

    closecontainerdetailsmodal.addEventListener('click', () => {
        containerdetailsmodal.classList.add('hidden');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    addStockModal();
    archivedStockModal();
    auditMode();
});