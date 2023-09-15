(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Team carousel
    $(".team-carousel, .related-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
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


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        margin: 30,
        dots: true,
        loop: true,
        center: true,
        responsive: {
            0:{
                items:1
            },
            576:{
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


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        loop: true,
        center: true,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });
    
})(jQuery);








// Send message

// const form = document.getElementById('myForm');                       // Replace 'myForm' with your form's ID

// form.addEventListener('sendmsg', function(event) {
//   event.preventDefault();                                             // Prevent data from message normally

//   // Get input values
//   const input1 = document.getElementById('name').value;               // Replace 'input1' with the actual ID of your input element
//   const input2 = document.getElementById('email').value;              // Replace 'input2' with the actual ID of your input element
//   const input3 = document.getElementById('subject').value;            // Replace 'input3' with the actual ID of your input element
//   const input4 = document.getElementById('message').value;            // Replace 'input4' with the actual ID of your input element

                                                                      
  
  
//   // Create a data object to send to the server
//   const data = {
//     input1: input1,
//     input2: input2,
//     input3: input3,
//     input4: input4,
//   };

//   // Send the data to the server using AJAX
//   const xhr = new XMLHttpRequest();
//   xhr.open('POST', '/your-server-endpoint', true);                     // Replace '/your-server-endpoint' with the actual URL of your server-side endpoint
//   xhr.setRequestHeader('Content-Type', 'application/json');

//   xhr.onreadystatechange = function() {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//       if (xhr.status === 200) {
//         // Request was successful
//         console.log('Data saved successfully!');

//       } else {
//         // Error 
//         console.error('Error saving data:', xhr.status);
//       }
//     }
//   };

//   xhr.send(JSON.stringify(data));
// });




