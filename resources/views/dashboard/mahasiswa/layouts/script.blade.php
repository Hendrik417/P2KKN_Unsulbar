<script src="{{ asset('dashboard') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('dashboard') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('dashboard') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('dashboard') }}/js/sb-admin-2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

<script>
(function ($) {
    'use strict';

    function toggleSidebar() {
        $('body').toggleClass('sidebar-toggled');
        $('.sidebar').toggleClass('toggled');

        if ($('.sidebar').hasClass('toggled')) {
            $('.sidebar .collapse').collapse('hide');
        }
    }

    $('#sidebarToggle, #sidebarToggleTop').off('click').on('click', function (e) {
        e.preventDefault();
        toggleSidebar();
    });

    if ($(window).width() < 768 && !$('.sidebar').hasClass('toggled')) {
        $('body').addClass('sidebar-toggled');
        $('.sidebar').addClass('toggled');
    }
})(jQuery);
</script>
