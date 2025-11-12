$(document).ready(function () {

    // Smooth scrolling for navigation links
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });

    // Navbar background on scroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.navbar').css('background-color', 'rgba(15, 20, 25, 0.98)');
        } else {
            $('.navbar').css('background-color', 'var(--dark-bg)');
        }
    });

    animateOnScroll();
    
    // Initial opacity for animation
    $('.service-card, .project-card').css({
        'opacity': '0',
        'transform': 'translateY(30px)',
        'transition': 'all 0.6s ease'
    });

    // Filter functionality
    $('.filter-btn').click(function() {

        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        const filter = $(this).data('filter');
        
        if (filter === 'all') {
            $('.project-item').fadeIn(400);
        } else {
            $('.project-item').fadeOut(400);
            $('.project-item[data-category="' + filter + '"]').fadeIn(400);
        }
    });

    $(window).scroll(animateOnScroll);
    animateOnScroll();

    

    // Phone number formatting
    $('#phone').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 0) {
            if (value.startsWith('90')) {
                value = value.substring(2);
            }
            if (value.length <= 10) {
                const formatted = value.replace(/(\d{3})(\d{3})(\d{2})(\d{2})/, '($1) $2 $3 $4');
                $(this).val('+90 ' + formatted.trim());
            }
        }
    });

    animateCounter();
});

// Animate elements on scroll
function animateOnScroll() {
    $('.service-card, .project-card').each(function () {
        var elementTop = $(this).offset().top;
        var windowBottom = $(window).scrollTop() + $(window).height();

        if (elementTop < windowBottom - 100) {
            $(this).css({
                'opacity': '1',
                'transform': 'translateY(0)'
            });
        }
    });
}

function animateCounter() {

    if ( $('.stat-number').length < 1) {
        
        return false;
    }

    $('.stat-number').each(function() {
        const $this = $(this);
        const countTo = parseInt($this.attr('data-count'));
        
        $({ countNum: 0 }).animate({
            countNum: countTo
        }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
            }
        });
    });
}