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