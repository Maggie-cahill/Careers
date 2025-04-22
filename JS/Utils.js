const video = document.getElementById('logo_animation');

    // Pause the video by default
    video.pause();

    // Play the video on hover
    video.addEventListener('mouseover', () => {
        video.play();
    });

    // Pause the video when hover ends
    video.addEventListener('mouseout', () => {
        
        video.currentTime = 0;
        video.pause();
    });



