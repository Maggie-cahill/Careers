let account = document.getElementById("profile-descriptions");
let cv = document.getElementById("profile-and-cv");
let savedJobs = document.getElementById("saved-jobs");

function showAccount() {
    account.style.display = "block";
    cv.style.display = "none";
    savedJobs.style.display = "none";
    
}

function showCV() {
    account.style.display = "none";
    cv.style.display = "block"
    savedJobs.style.display = "none";

}

function showSavedJobs() {
    account.style.display = "none";
    cv.style.display = "none"
    savedJobs.style.display = "block";
}

function saveJobs(event, job_id) {
    button = button = event.currentTarget;
    let jobListing = button.closest('.job-listing'); // Get the job container

    console.log("Saved Job:", job_id); // Debugging

    fetch('JobSave.php', {
        method: 'POST',
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `job_id=${job_id}`
    })
    .then(response => {
        if (response.ok) {
            return response.json(); // or response.json() based on your response type
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        console.log(data.message);

        jobListing.remove();
        
        if (button.className == 'save_button' ) {
            button.className = "unsave_button";
        } else {
            button.className = "save_button";
        }
        
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function removeJobInformation(event, job_id) {
    button = button = event.currentTarget;
    let jobListing = button.closest('.job-listing'); // Get the job container

    console.log("Saved Job:", job_id); // Debugging

    fetch('JobSave.php', {
        method: 'POST',
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `job_id=${job_id}`
    })
    .then(response => {
        if (response.ok) {
            return response.json(); // or response.json() based on your response type
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        console.log(data.message);
        returnToSaved();
        jobListing.remove();
        
        if (button.className == 'save_button' ) {
            button.className = "unsave_button";
        } else {
            button.className = "save_button";
        }
        
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}



function viewSavedJob(job_id) {
    let jobs = document.getElementById('listed-jobs');
    let header = document.getElementById('saved-header');
    let view = document.getElementById('view-job');

    fetch('JobSavedShow.php', {
        method: 'POST',
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `job_id=${job_id}`
    })
    .then(response => {
        if (response.ok) {
            return response.text(); // or response.json() based on your response type
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        document.getElementById('view-job').innerHTML = data; // Display the response
        jobs.style.display = 'none';
        header.style.display = 'none';
        view.style.display = 'block';
        
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function returnToSaved() {
    let jobs = document.getElementById('listed-jobs');
    let header = document.getElementById('saved-header');
    let view = document.getElementById('view-job');

    jobs.style.display = 'flex';
    header.style.display = 'block';
    view.innerHTML = "";
    view.style.display = 'none';
    window.scrollTo({ top: 0, behavior: "smooth" });

}

