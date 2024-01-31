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
        showCursor: false
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
        var formData = {
            user: $('input[name=user]').val(),
            email: $('input[name=email]').val(),
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
});
