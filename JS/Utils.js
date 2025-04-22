
// Play and replay logo animation
const video = document.getElementById('logo_animation');

    video.pause();

    video.addEventListener('mouseover', () => {
        video.play();
    });


    video.addEventListener('mouseout', () => {
        
        video.currentTime = 0;
        video.pause();
    });



