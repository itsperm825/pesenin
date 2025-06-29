(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top', 'shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top', 'shadow-sm');
        }
    });
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    // --- FAQ Section Logic ---
    $(document).ready(function() {
        // Ketika sebuah link pertanyaan di klik
        $('.faq-question').on('click', function(e) {
            e.preventDefault(); // Mencegah link berpindah halaman

            var targetId = $(this).data('target');

            $('.faq-question').removeClass('active');
            $('.faq-answer').removeClass('active');

            $(this).addClass('active');
            $('#' + targetId).addClass('active');
        });
    });


    // --- S&K Section Logic (VERSI JQUERY YANG SUDAH DIPERBAIKI) ---
    $(document).ready(function() {
        // 1. Ambil semua elemen yang kita butuhkan menggunakan jQuery
        const $modalElement = $('#syaratKetentuanModal');
        const $modalBody = $('#modalBodyContent');
        const $modalCheckbox = $('#modalAgreementCheck');
        const $btnMengerti = $('#btnMengerti');
        const $mainFormCheckbox = $('#agreement');
        const $infoScroll = $('#scroll-to-bottom-info');

        // 2. Event listener untuk mendeteksi scroll di dalam modal
        $modalBody.on('scroll', function() {
            // Cek jika pengguna sudah scroll sampai ke paling bawah
            if ($(this).prop('scrollHeight') - $(this).scrollTop() <= $(this).prop('clientHeight') + 5) {
                // Aktifkan checkbox dan sembunyikan petunjuk
                $modalCheckbox.prop('disabled', false);
                $infoScroll.hide();
            }
        });

        // 3. Event listener untuk checkbox di dalam modal
        $modalCheckbox.on('change', function() {
            // Jika checkbox dicentang, aktifkan tombol. Jika tidak, non-aktifkan.
            $btnMengerti.prop('disabled', !this.checked);
        });

        // 4. Event listener untuk tombol "SAYA MENGERTI"
        $btnMengerti.on('click', function() {
            // Centang checkbox utama di formulir
            $mainFormCheckbox.prop('checked', true);
            // Tutup modal
            $modalElement.modal('hide');
        });

        // 5. Event listener untuk mereset modal jika ditutup (via 'X' atau klik di luar)
        $modalElement.on('hide.bs.modal', function () {
            // Kembalikan semua ke kondisi awal
            $modalCheckbox.prop('disabled', true).prop('checked', false);
            $btnMengerti.prop('disabled', true);
            // Kembalikan scroll ke paling atas
            $modalBody.scrollTop(0);
            // Tampilkan kembali tulisan petunjuk
            $infoScroll.show();
        });
    });
    
})(jQuery);