// File: public/js/form-helpers.js

document.addEventListener('DOMContentLoaded', function () {
    
    // --- FUNGSI UNTUK HIDE/UNHIDE PASSWORD ---
    function initializePasswordToggle(toggleId, passwordId) {
        const toggleElement = document.getElementById(toggleId);
        const passwordElement = document.getElementById(passwordId);

        if (toggleElement && passwordElement) {
            toggleElement.addEventListener('click', function () {
                // Toggle tipe input
                const type = passwordElement.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordElement.setAttribute('type', type);
                
                // Toggle ikon mata
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    }

    // Inisialisasi untuk kedua input password
    initializePasswordToggle('togglePassword', 'password');
    initializePasswordToggle('togglePasswordConfirmation', 'password_confirmation');


    // --- FUNGSI UNTUK PENGHITUNG KARAKTER ---
    const inputsWithCounter = document.querySelectorAll('[data-counter-id]');

    inputsWithCounter.forEach(input => {
        const counterId = input.getAttribute('data-counter-id');
        const counterElement = document.getElementById(counterId);
        const maxLength = input.getAttribute('maxlength');

        if (counterElement) {
            const updateCounter = () => {
                const currentLength = input.value.length;
                counterElement.innerText = currentLength;

                if (currentLength >= maxLength) {
                    counterElement.parentElement.classList.add('text-danger');
                } else {
                    counterElement.parentElement.classList.remove('text-danger');
                }
            };
            
            updateCounter(); // Panggil saat awal untuk inisialisasi
            input.addEventListener('input', updateCounter); // Panggil setiap kali ada ketikan
        }
    });

});