function toggleContent(contentId) {
    // Hide all content divs
    const contentDivs = document.getElementsByClassName('content-div');
    for (let div of contentDivs) {
        div.style.display = 'none';
    }
    
    // Show the selected content div
    document.getElementById(contentId).style.display = 'block';
    
    // Update button active states
    const buttons = document.getElementsByClassName('toggle-btn');
    for (let btn of buttons) {
        btn.classList.remove('active');
    }
    
    // Make clicked button active
    document.getElementById('btn' + contentId.charAt(contentId.length - 1)).classList.add('active');
}

function slideToContent(slideIndex) {
    // Slide the content
    const track = document.querySelector('.slider-track');
    track.style.transform = `translateX(-${slideIndex * 100}%)`;
    
    // Update button active states
    const buttons = document.getElementsByClassName('toggle-btn');
    for (let i = 0; i < buttons.length; i++) {
        if (i === slideIndex) {
            buttons[i].classList.add('active');
        } else {
            buttons[i].classList.remove('active');
        }
    }
    
    // Update indicator active states
    const indicators = document.getElementsByClassName('indicator');
    for (let i = 0; i < indicators.length; i++) {
        if (i === slideIndex) {
            indicators[i].classList.add('active');
        } else {
            indicators[i].classList.remove('active');
        }
    }
}

// Initialize with the first slide active when the page loads
document.addEventListener('DOMContentLoaded', function() {
    // The first slide is already active by default via HTML
    // This is just a placeholder in case you want to add any initialization code
    console.log('Slider initialized');
});


       document.addEventListener('DOMContentLoaded', function() {
            // Topic switching functionality
            const topicButtons = document.querySelectorAll('.topic-btn');
            const topicContents = document.querySelectorAll('.topic-content');
            
            topicButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const topic = this.dataset.topic;
                    
                    // Remove active class from all buttons and contents
                    topicButtons.forEach(btn => btn.classList.remove('active'));
                    topicContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to selected button and content
                    this.classList.add('active');
                    document.getElementById(topic).classList.add('active');
                });
            });
            
            // Side navigation functionality
            const menuBtn = document.getElementById('menuBtn');
            const sideNav = document.getElementById('sideNav');
            const overlay = document.getElementById('overlay');
            
            // Toggle side navigation
            menuBtn.addEventListener('click', function() {
                sideNav.classList.toggle('active');
                if (sideNav.classList.contains('active')) {
                    overlay.style.display = 'block';
                    menuBtn.innerHTML = '✕';
                } else {
                    overlay.style.display = 'none';
                    menuBtn.innerHTML = '☰';
                }
            });
            
            // Close menu when clicking on overlay
            overlay.addEventListener('click', function() {
                sideNav.classList.remove('active');
                overlay.style.display = 'none';
                menuBtn.innerHTML = '☰';
            });
            
            // Close menu when clicking on links (optional)
            const navLinks = document.querySelectorAll('.side-nav ul li a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    sideNav.classList.remove('active');
                    overlay.style.display = 'none';
                    menuBtn.innerHTML = '☰';
                });
            });
            
            // Close menu when window is resized to large screens
            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    sideNav.classList.remove('active');
                    overlay.style.display = 'none';
                    menuBtn.innerHTML = '☰';
                }
            });
        });