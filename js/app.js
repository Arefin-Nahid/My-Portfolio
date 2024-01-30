$(document).ready(function(){
    $('.slider').slick({
        arrows: false,
        dots: true,
        appendDots: '.slider-dots',
        dotsClass: 'dots'
    });

    let hamberger = document.querySelector('.hamberger');
    let times = document.querySelector('.times');
    let mobileNav = document.querySelector('.mobile-nav');

    hamberger.addEventListener('click', function(){
        mobileNav.classList.add('open');  
    });

    times.addEventListener('click', function(){
        mobileNav.classList.remove('open');  
    });

    const mobileNavLinks = document.querySelectorAll('.mobile-nav ul li a');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileNav.classList.remove('open');
        });
    });



    document.getElementById('contactButton').addEventListener('click', function() {
        document.getElementById('contact').scrollIntoView({ behavior: 'smooth', block: 'start' });
        if (mobileNav.classList.contains('open')) {
            mobileNav.classList.remove('open');
        }
    });
    
    const contactForm = document.querySelector('.contact form');
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();
    });

    document.getElementById('downloadCvButton').addEventListener('click', function() {
        const pdfUrl = './js/cv.pdf';
        const downloadLink = document.createElement('a');
        downloadLink.href = pdfUrl;
        downloadLink.download = 'MdArefinMollaResume.pdf';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    });

    $('#downloadCvButtonFreelancer').click(function() {
        const pdfUrl = './js/cv.pdf';
        const downloadLink = document.createElement('a');
        downloadLink.href = pdfUrl;
        downloadLink.download = 'MdArefinMollaResume.pdf';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
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
                // Reset the form on successful submission
                $('.contact form')[0].reset();
            },
            error: function (error) {
                console.error('Error:', error);
                // Handle error as needed
            }
        });
    });
});
