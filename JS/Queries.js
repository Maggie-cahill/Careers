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




