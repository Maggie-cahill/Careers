// open select dropdown list
function toggleDropdown(event) {
    if (!event) return;

    event.stopPropagation();

    let dropdownOptions = event.currentTarget.querySelector(".dropdown-options");

    if (!dropdownOptions) {
        console.error("Dropdown options element not found.");
        return;
    }

    document.querySelectorAll(".dropdown-options").forEach(options => {
        if (options !== dropdownOptions) {
            options.classList.remove("show");
        }
    });

    dropdownOptions.classList.toggle("show");
}


function updateSelection() {
    let selectedFilters = {
        roleType: [],
        environment: [],
        hours: [],
        jobField: [],
        location: [],
        search: ""
    };

    // gather select filters
    document.querySelectorAll(".dropdown-options input:checked").forEach(input => {
        let category = input.closest(".custom-dropdown").querySelector(".dropdown-selected").id;
        if (selectedFilters[category]) {
            selectedFilters[category].push(input.value);
        }
    });

    // get the search keyword from input or url (home page)
    let urlParams = new URLSearchParams(window.location.search);
    let searchInput = document.getElementById("search-keyword").value.trim().toLowerCase();
    let searchQueryFromURL = urlParams.get("query");

    // Prioritize input field value or use URL parameter if empty
    selectedFilters.search = searchInput ? searchInput : (searchQueryFromURL ? searchQueryFromURL.toLowerCase() : "");
    filterJobs(selectedFilters);
}




// Filter Jobs based search or select 
function filterJobs(filters, page = 1) {
    filters.page = page;

    fetch('JobsFilter.php', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(filters)
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('extended-job-list').innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

let currentPage = 1;

// turn the page of the filtered search
function changePage(page) {
    currentPage = page;
  
    let filters = getCurrentFilters(); 
    filterJobs(filters, currentPage);
    console.log("Current page is: ", currentPage);

    window.scrollTo({ top: 0, behavior: "smooth" });
}



// keep filters between page navigation
function getCurrentFilters() {
    let filters = {
        roleType: [],
        environment: [],
        hours: [],
        jobField: [],
        location: [],
        search: document.getElementById("search-keyword").value.trim().toLowerCase()
    };

    document.querySelectorAll(".dropdown-options input:checked").forEach(input => {
        let category = input.closest(".custom-dropdown").querySelector(".dropdown-selected").id;
        if (filters[category]) {
            filters[category].push(input.value);
        }
    });

    return filters;
}



// Save jobs in database
function saveJobs(event, job_id) {
    button = button = event.currentTarget;

    console.log("Saved Job:", job_id); // Debugging

    fetch('JobSave.php', {
        method: 'POST',
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `job_id=${job_id}`
    })
    .then(response => {
        if (response.ok) {
            return response.json(); 
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        console.log(data.message);
        

        document.querySelectorAll(`[data-job-id='${job_id}']`).forEach(button => {
        
            if (button.className === "save_button") {
                if (button.innerText.trim().toLowerCase() === "save") {
                    button.innerHTML = "<i class='fa-solid fa-bookmark'></i> Unsave"; // Corrected
                }
                button.className = "unsave_button";
            } else {
                if (button.innerText.trim().toLowerCase() === "unsave") {
                    button.innerHTML = "<i class='fa-solid fa-bookmark'></i> Save"; // Corrected
                }
                button.className = "save_button";
            }

    });
        
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}


// show the first listed job for job information
document.addEventListener("DOMContentLoaded", function () {

       // get first listed job item and load its details
       const firstJob = document.querySelector(".job-listing");
       if (firstJob) {
           const jobId = firstJob.getAttribute("job-id");
           showJob(jobId);
       }
 
    let urlParams = new URLSearchParams(window.location.search);
    let searchKeyword = urlParams.get("query"); 

   
    // if there is a search keyword, filter based on input
    if (searchKeyword) {
        document.getElementById("search-keyword").value = searchKeyword.trim();
        updateSelection(); // Run filtering with search term
        window.history.replaceState(null, null, window.location.pathname);
    }
  
});


// show job information when clicking on listed items (right panel of jobs page)
function showJob(job_id) {

    fetch('JobShow.php', {
        method: 'POST',
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `job_id=${job_id}`
    })
    .then(response => {
        if (response.ok) {
            return response.text(); 
        }
        throw new Error('Network response was not ok.');
    })
    .then(data => {
        document.getElementById('job-information').innerHTML = data; 
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}


// home page search box, transport to jobs page with search query
document.querySelector(".search-and-find button").addEventListener("click", function(event) {
    event.preventDefault(); 
    let keyword = document.querySelector(".find").value.trim();
    if (keyword !== "") {
        window.location.href = "Jobs.php?query=" + encodeURIComponent(keyword);
    }
});
