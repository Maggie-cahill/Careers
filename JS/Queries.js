const fileInput = document.getElementById('upload-file');
const fileList = document.getElementById('file-list');

let fileListArray = [];

// file upload functionality
fileInput.addEventListener('change', () => {

    Array.from(fileInput.files).forEach(newFile => {
        if (!fileListArray.some(existingFile => existingFile.name === newFile.name)) {
            fileListArray.push(newFile);
        }
    });

    fileList.innerHTML = '';
    const ul = document.createElement('ul');
    ul.className = "listedFiles";
    fileList.appendChild(ul);


    fileListArray.forEach(file => {
        const listItem = document.createElement('li');
        listItem.textContent = file.name;
        ul.appendChild(listItem); 
    });
});




