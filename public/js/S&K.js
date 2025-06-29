(function ($) {
    "use strict";
    
    // S&K Section Logic
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Ambil semua elemen yang kita butuhkan
        const modalElement = document.getElementById('syaratKetentuanModal');
        const modalBody = document.getElementById('modalBodyContent');
        const modalCheckbox = document.getElementById('modalAgreementCheck');
        const btnMengerti = document.getElementById('btnMengerti');
        const mainFormCheckbox = document.getElementById('agreement');
        const infoScroll = document.getElementById('scroll-to-bottom-info'); // Elemen petunjuk baru

        // 2. Event listener untuk mendeteksi scroll di dalam modal
        modalBody.addEventListener('scroll', function() {
            if (modalBody.scrollHeight - modalBody.scrollTop <= modalBody.clientHeight + 5) {
                // Aktifkan checkbox
                modalCheckbox.disabled = false;
                // Sembunyikan tulisan petunjuk
                infoScroll.style.display = 'none';
            }
        });

        // 3. Event listener untuk checkbox di dalam modal
        modalCheckbox.addEventListener('change', function() {
            if (this.checked) {
                btnMengerti.disabled = false;
            } else {
                btnMengerti.disabled = true;
            }
        });

        // 4. Event listener untuk tombol "SAYA MENGERTI"
        btnMengerti.addEventListener('click', function() {
            mainFormCheckbox.checked = true;
            const modalInstance = bootstrap.Modal.getInstance(modalElement);
            modalInstance.hide();
        });

        // 5. Event listener untuk mereset modal jika ditutup
        modalElement.addEventListener('hide.bs.modal', function () {
            modalCheckbox.disabled = true;
            modalCheckbox.checked = false;
            btnMengerti.disabled = true;
            modalBody.scrollTop = 0;
            // Tampilkan kembali tulisan petunjuk
            infoScroll.style.display = 'block';
        });
    });

    
})(jQuery);