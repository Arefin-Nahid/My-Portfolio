$(document).ready(function () {
    $('.slider').slick({
        arrows: false,
        dots: true,
        appendDots: '.slider-dots',
        dotsClass: 'dots'
    });

    var typed = new Typed(".typing", {
        strings: ["CS Undergrad", "Web Developer", "Traveller"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true,
        showCursor: true
    });

    $('.hamberger').click(function () {
        $('.mobile-nav').toggleClass('open');
    });
    
    $('.times').click(function () {
        $('.mobile-nav').removeClass('open');
    });

    $('.mobile-nav ul li a').click(function () {
        $('.mobile-nav').removeClass('open');
    });

    $('#contactButton').click(function () {
        $('#contact').get(0).scrollIntoView({ behavior: 'smooth', block: 'start' });
        if ($('.mobile-nav').hasClass('open')) {
            $('.mobile-nav').removeClass('open');
        }
    });

    $('.contact form').submit(function (event) {
        event.preventDefault();

        var user = $('input[name=user]').val().trim();
        var email = $('input[name=email]').val().trim();

        if (user === '' || email === '') {
            alert('Please fill in the required fields (User and Email).');
            return;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        var formData = {
            user: user,
            email: email,
            subject: $('input[name=subject]').val(),
            message: $('textarea[name=message]').val()
        };

        $.ajax({
            type: 'POST',
            url: './datainfo.php',
            data: formData,
            success: function (response) {
                alert(response.message);
                $('.contact form')[0].reset();
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });

    $('#downloadCvButton, #downloadCvButtonFreelancer').click(function () {
        var pdfUrl = './js/cv.pdf';
        var downloadLink = document.createElement('a');
        downloadLink.href = pdfUrl;
        downloadLink.download = 'MdArefinMollaResume.pdf';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    });

    $(document).ready(function() {
        // Smooth scroll to top when the button is clicked
        $('.go-top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        });

        // Show/hide the button based on scroll position
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.go-top').addClass('active');
            } else {
                $('.go-top').removeClass('active');
            }
        });
    });

});
