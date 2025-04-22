

function toggleDropdown(event) {
    if (!event) return; // Prevent undefined event errors

    event.stopPropagation(); // Stop event from propagating

    let dropdownOptions = event.currentTarget.querySelector(".dropdown-options");

    if (!dropdownOptions) {
        console.error("Dropdown options element not found.");
        return;
    }

    // Close other open dropdowns first
    document.querySelectorAll(".dropdown-options").forEach(options => {
        if (options !== dropdownOptions) {
            options.classList.remove("show");
        }
    });

    // Toggle the clicked dropdown
    dropdownOptions.classList.toggle("show");
}


function updateSelection() {
    // Create an object to store selected filters
    let selectedFilters = {
        roleType: [],
        environment: [],
        hours: [],
        jobField: [],
        location: [],
        search: ""
    };

    // Collect all selected filter options
    document.querySelectorAll(".dropdown-options input:checked").forEach(input => {
        let category = input.closest(".custom-dropdown").querySelector(".dropdown-selected").id;
        if (selectedFilters[category]) {
            selectedFilters[category].push(input.value);
        }
    });

    // Retrieve the search keyword (either from input or URL)
    let urlParams = new URLSearchParams(window.location.search);
    let searchInput = document.getElementById("search-keyword").value.trim().toLowerCase();
    let searchQueryFromURL = urlParams.get("query");

    // Prioritize input field value; fall back to URL parameter if empty
    selectedFilters.search = searchInput ? searchInput : (searchQueryFromURL ? searchQueryFromURL.toLowerCase() : "");

    // Debugging output (check filters are being set correctly)
    console.log("Selected Filters:", selectedFilters);

    // Apply the updated filters to job listings
    filterJobs(selectedFilters);
}



let currentPage = 1;

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



function changePage(page) {
    currentPage = page;
  
    let filters = getCurrentFilters(); // Function that retrieves selected filters
    filterJobs(filters, currentPage);
    console.log("Current page is: ", currentPage);

    // Scroll to the top smoothly
    window.scrollTo({ top: 0, behavior: "smooth" });
}



// Ensure filters persist between page navigation
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
            return response.json(); // or response.json() based on your response type
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
            

        // **Only update buttons that contain "Save" in their text**
       
         

    });
        
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}



document.addEventListener("DOMContentLoaded", function () {
       // Get first listed job item and load its details
       const firstJob = document.querySelector(".job-listing");
       if (firstJob) {
           const jobId = firstJob.getAttribute("job-id");
           showJob(jobId);
       }
 
    // Get search parameter from URL
    let urlParams = new URLSearchParams(window.location.search);
    let searchKeyword = urlParams.get("query"); // Get 'query' parameter

   
    // If a search term exists, populate the input field and trigger filtering
    if (searchKeyword) {
        document.getElementById("search-keyword").value = searchKeyword.trim();
        updateSelection(); // Run filtering with search term
        window.history.replaceState(null, null, window.location.pathname);
    }

  
});



function showJob(job_id) {


    fetch('JobShow.php', {
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
        document.getElementById('job-information').innerHTML = data; // Display the response
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}



document.querySelector(".search-and-find button").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default form submission
    let keyword = document.querySelector(".find").value.trim();
    if (keyword !== "") {
        window.location.href = "Jobs.php?query=" + encodeURIComponent(keyword);
    }
});
