@extends('layouts.pengguna_app')

@section('title', 'Keranjang Belanja')

@push('styles')
<style>
    .quantity-input-group {
        max-width: 120px;
    }
    .product-image-cart {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Keranjang Belanja</h5>
            <h1 class="mb-5">Detail Pesanan Anda</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col" class="text-center">Jumlah</th>
                                <th scope="col" class="text-end">Subtotal</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="cart-table-body">
                            {{-- Baris-baris item keranjang akan dirender oleh JavaScript di sini --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                {{-- Form untuk Voucher --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Kode Voucher" id="voucher-code-input">
                            <button class="btn btn-outline-primary" type="button" id="apply-voucher-btn">Terapkan</button>
                        </div>
                        <div id="voucher-status" class="mt-2"></div>
                    </div>
                </div>

                {{-- Ringkasan Pesanan --}}
                <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Ringkasan Pesanan</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between px-0">
                                <span>Subtotal</span>
                                <span id="summary-subtotal">Rp 0</span>
                            </li>
                            <li id="discount-row" class="list-group-item d-flex justify-content-between px-0 text-success" style="display: none;">
                                <span>Diskon (<span id="discount-code-text"></span>)</span>
                                <span id="discount-amount">- Rp 0</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between px-0">
                                <span>Biaya Layanan</span>
                                <span>Rp 2.000</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between px-0 fw-bold border-top pt-3">
                                <span>Total</span>
                                <strong id="summary-total">Rp 2.000</strong>
                            </li>
                        </ul>
                        <button class="btn btn-primary w-100 mt-3" id="checkout-btn" disabled>
                            Lanjutkan ke Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // === ELEMEN-ELEMEN PENTING ===
    const cartTableBody = document.getElementById('cart-table-body');
    const summarySubtotal = document.getElementById('summary-subtotal');
    const summaryTotal = document.getElementById('summary-total');
    const checkoutBtn = document.getElementById('checkout-btn');
    const voucherInput = document.getElementById('voucher-code-input');
    const applyVoucherBtn = document.getElementById('apply-voucher-btn');
    const voucherStatus = document.getElementById('voucher-status');
    const discountRow = document.getElementById('discount-row');
    const discountCodeText = document.getElementById('discount-code-text');
    const discountAmountText = document.getElementById('discount-amount');
    
    const serviceFee = 2000;
    let appliedVoucher = JSON.parse(localStorage.getItem('applied_voucher')) || null;

    // === FUNGSI UTAMA UNTUK MERENDER KERANJANG ===
    function renderCart() {
        let cart = JSON.parse(localStorage.getItem('shopping_cart')) || [];
        cartTableBody.innerHTML = '';
        let subtotal = 0;

        if (cart.length === 0) {
            cartTableBody.innerHTML = `<tr><td colspan="6" class="text-center py-5"><p>Keranjang Anda masih kosong.</p><a href="{{ route('pengguna.beranda') }}" class="btn btn-primary">Mulai Belanja</a></td></tr>`;
            checkoutBtn.disabled = true;
            appliedVoucher = null; // Hapus voucher jika keranjang kosong
            localStorage.removeItem('applied_voucher');
        } else {
            cart.forEach((item, index) => {
                let itemSubtotal = item.price * item.quantity;
                subtotal += itemSubtotal;
                let row = `
                    <tr>
                        <td style="width: 80px;"><img src="${item.image}" alt="${item.name}" class="product-image-cart"></td>
                        <td><h6 class="mb-0">${item.name}</h6></td>
                        <td>Rp ${item.price.toLocaleString('id-ID')}</td>
                        <td class="text-center">
                            <div class="input-group quantity-input-group mx-auto">
                                <button class="btn btn-outline-secondary btn-sm update-quantity-btn" data-index="${index}" data-change="-1">-</button>
                                <input type="text" class="form-control form-control-sm text-center" value="${item.quantity}" readonly>
                                <button class="btn btn-outline-secondary btn-sm update-quantity-btn" data-index="${index}" data-change="1">+</button>
                            </div>
                        </td>
                        <td class="text-end">Rp ${itemSubtotal.toLocaleString('id-ID')}</td>
                        <td><button class="btn btn-outline-danger btn-sm remove-item-btn" data-index="${index}"><i class="fa fa-trash"></i></button></td>
                    </tr>`;
                cartTableBody.innerHTML += row;
            });
            checkoutBtn.disabled = false;
        }
        
        updateSummary(subtotal);
        attachEventListeners();
    }

    // === FUNGSI-FUNGSI PEMBANTU ===
    function updateSummary(subtotal) {
        let discount = 0;
        if (appliedVoucher) {
            if (appliedVoucher.type === 'percent') {
                discount = (subtotal * appliedVoucher.value) / 100;
            } else {
                discount = appliedVoucher.value;
            }
            discount = Math.min(subtotal, discount);
            discountRow.style.display = 'flex';
            discountCodeText.innerText = appliedVoucher.code;
            discountAmountText.innerText = `- Rp ${discount.toLocaleString('id-ID')}`;
        } else {
            discountRow.style.display = 'none';
        }
        
        let finalTotal = (subtotal - discount) + serviceFee;
        summarySubtotal.innerText = `Rp ${subtotal.toLocaleString('id-ID')}`;
        summaryTotal.innerText = `Rp ${finalTotal.toLocaleString('id-ID')}`;
    }

    function updateQuantity(index, change) {
        let cart = JSON.parse(localStorage.getItem('shopping_cart')) || [];
        if (cart[index]) {
            cart[index].quantity += change;
            if (cart[index].quantity <= 0) cart.splice(index, 1);
        }
        localStorage.setItem('shopping_cart', JSON.stringify(cart));
        renderCart();
        updateCartIconCount();
    }

    function removeItem(index) {
        let cart = JSON.parse(localStorage.getItem('shopping_cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('shopping_cart', JSON.stringify(cart));
        renderCart();
        updateCartIconCount();
    }

        async function checkVoucher() {
        const code = voucherInput.value.trim().toUpperCase();
        if (!code) return;
        voucherStatus.innerHTML = `<small class="text-muted">Memeriksa...</small>`;

        try {
            const response = await fetch('/api/vouchers/check', {
                method: 'POST',
                headers: {
                    // === HEADER PENTING YANG DIPERBARUI ===
                    'Content-Type': 'application/json',
                    'Accept': 'application/json', // Beritahu Laravel kita mau menerima JSON
                    'X-Requested-With': 'XMLHttpRequest', // Beritahu Laravel ini adalah request AJAX
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ code: code })
            });

            const data = await response.json();

            // Cek jika server mengembalikan error (misal: 404, 422)
            if (!response.ok) {
                // 'data.message' biasanya berisi pesan error validasi dari Laravel
                throw new Error(data.message || data.error || 'Kode tidak valid.');
            }

            appliedVoucher = data;
            localStorage.setItem('applied_voucher', JSON.stringify(appliedVoucher));
            voucherStatus.innerHTML = `<small class="text-success">Voucher <strong>${data.code}</strong> berhasil diterapkan!</small>`;
            renderCart();

        } catch (error) {
            appliedVoucher = null;
            localStorage.removeItem('applied_voucher');
            voucherStatus.innerHTML = `<small class="text-danger">${error.message}</small>`;
            renderCart();
        }
    }

    function attachEventListeners() {
        document.querySelectorAll('.update-quantity-btn').forEach(b => b.onclick = () => updateQuantity(parseInt(b.dataset.index), parseInt(b.dataset.change)));
        document.querySelectorAll('.remove-item-btn').forEach(b => b.onclick = () => removeItem(parseInt(b.dataset.index)));
    }
    
    function updateCartIconCount() {
        let cart = JSON.parse(localStorage.getItem('shopping_cart')) || [];
        let totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        const cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            cartCountElement.innerText = totalItems;
            cartCountElement.style.display = totalItems > 0 ? 'inline-block' : 'none';
        }
    }

    // === INISIALISASI ===
    applyVoucherBtn.addEventListener('click', checkVoucher);
    if(appliedVoucher) voucherInput.value = appliedVoucher.code; // Tampilkan kode voucher jika sudah pernah diterapkan
    renderCart();
});
</script>
@endpush