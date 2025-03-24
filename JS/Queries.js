const fileInput = document.getElementById('upload-file');
const fileList = document.getElementById('file-list');

let fileListArray = [];

fileInput.addEventListener('change', () => {
    // Clear any previous file list
    console.log("Files detected:", fileListArray); // Logs the FileList
    
    Array.from(fileInput.files).forEach(newFile => {
        if (!fileListArray.some(existingFile => existingFile.name === newFile.name)) {
            fileListArray.push(newFile);
        }
    });

    fileList.innerHTML = '';
    const ul = document.createElement('ul');
    ul.className = "listedFiles";
    fileList.appendChild(ul);
    // Loop through selected files and display their names
    fileListArray.forEach(file => {
        const listItem = document.createElement('li');
        listItem.textContent = file.name;
        ul.appendChild(listItem); // Fixed the variable name
    });
});



// // Handle form submission
// uploadForm.addEventListener('submit', (event) => {
//     event.preventDefault(); // Prevent default form submission

//     const formData = new FormData(); // Create a new FormData object

//     // Add each file from `allFiles` to the FormData
//     allFiles.forEach(file => {
//         formData.append('filename[]', file);
//     });

//     // Submit the formData via Fetch API or XMLHttpRequest (example with Fetch API)
//     fetch(uploadForm.action, {
//         method: 'POST',
//         body: formData,
//     }).then(response => {
//         console.log('Files uploaded successfully:', response);
//     }).catch(error => {
//         console.error('Error uploading files:', error);
//     });
// });
