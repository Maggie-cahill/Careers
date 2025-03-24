function showAccount() {
    let response = document.getElementById("response-div");
    response.innerHTML = "";
    

    let content = `
    <div class="profile-descriptions">
        <h1>Your Account</h1>
        <div class="header">
            <img src="../Images/Office.jpg" alt="">
            <button>Upload Photo<i class="fa-solid fa-cloud-arrow-up"></i></button>
        </div>

        <span class="line"></span>

        <div class="user-details">
            <h3>User Details</h3>

            <div class="name">
                <p>User: Maggie Cahill</p>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>

            <div class="email">
                <p>Email: 2236maggie@gmail.com</p>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>

            <p>
               Creative arts & design, 3D design, Artistic creation, Media, 
               journalism & publishing, Film and cinematography, Media, 
               Photography, Technology, Business & systems analysis, Software 
               engineering, Web development
            </p>

            <span class="line"></span>
        </div>

        <div class="security">
            <h3>Security</h3>

            <div class="password-div">
                <div class="password">
                    <label for="">Password</label>
                    <p>****************</p>
                </div>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>

        </div>
    </div>
    `;

    response.innerHTML = content;
}

function showCV() {
    let response = document.getElementById("response-div");
    response.innerHTML = "";

    let content = `
    <div class="profile-and-cv">
        <h1>Profile and CV</h1>

        <span class="line"></span>

        <div class="details">
            <div class="header-details">
                <h3>Personal Details</h3>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>


            <div class="personal-details">

                <div class="personal-detail">
                    <label for="">First Name</label>
                    <p class = "first">Margaret</p>
                </div>

                <div class="personal-detail">
                    <label for="">Last Name</label>
                    <p>Cahill</p>
                </div>

                <div class="personal-detail">
                        <label for="">Preferred Name</label>
                        <p>Maggie</p>
                </div>

                <div class="personal-detail">
                    <label for="">Title</label>
                    <p>Ms.</p>
                </div>

                <div class="personal-detail">
                        <label for="">Date of Birth</label>
                        <p>June 5, 2004</p>
                </div>


                <span class="line"></span>
            </div>

            <div class="description">
                <div class="header-details">
                    <h3>Description</h3>
                    <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
                </div>

                <p>I am a friendly, hard-working, and self-motivated third-year student at Atlantic Technological University, 
                pursuing a Computing and Digital Media degree. My coursework provides a unique blend of digital media and software 
                development, allowing me to develop a versatile skill set in both fields.
                </p>

                <span class="line" style = "margin-top: 80px;"></span>

            </div>

            <div class="header-details">
                <h3>Education</h3>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>


            <div class="education-details">

                <div class="education-detail">
                    <label for="">University</label>
                    <p class = "university">Atlantic Technological University</p>
                </div>

                <div class="education-detail">
                    <label for="">Graduation Year</label>
                    <p>2026</p>
                </div>

                <div class="education-detail">
                        <label for="">Major</label>
                        <p>Computing and Digital Media</p>
                </div>

                <div class="education-detail">
                    <label for="">Degree</label>
                    <p>Bachelors</p>
                </div>

                <span class="line"></span>
            </div>

            <div class="header-details">
                <h3>Fields of Interest</h3>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>


            <div class="fields-details">
                    <div class="interests">
                        <button class = "interest">Gaming</button>
                        <button class = "interest">Coding</button>
                        <button class = "interest">Sketching</button>
                        <button class = "interest">AI Research</button>
                        <button class = "interest">Photography</button>
                        <button class = "interest">Film and Documentary</button>
                        <button class = "interest">3D Animation</button>
                    </div>
      
                <span class="line"></span>
            </div>


            <div class="header-details">
                <h3>Skills</h3>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>


            <div class="skills-details">

                <div class="skills-detail">
                    <label for="">Hard Skills</label>
                    <div class="hard-skills">
                        <button class = "hard-skill">HTML</button>
                        <button class = "hard-skill">CSS</button>
                        <button class = "hard-skill">Adobe Products</button>
                        <button class = "hard-skill">JavaScript</button>
                        <button class = "hard-skill">TypeScript</button>
                        <button class = "hard-skill">Microsoft Products</button>
                        <button class = "hard-skill">Azure</button>
                        <button class = "hard-skill">Photography</button>
                        <button class = "hard-skill">Digital Content Creation</button>
                    </div>
                </div>

                <div class="skills-detail">
                    <label for="">Soft Skills</label>
                    <div class="soft-skills">
                        <button class = "soft-skill">Communication</button>
                        <button class = "soft-skill">Self-Motivation</button>
                        <button class = "soft-skill">Teamwork</button>
                        <button class = "soft-skill">Patience</button>
                        <button class = "soft-skill">Collaboration</button>
                        <button class = "soft-skill">Adaptable</button>
                        <button class = "soft-skill">Flexible</button>
                        <button class = "soft-skill">Independent</button>
                        <button class = "soft-skill">Leadership</button>
                    </div>
                </div>

                
                <span class="line"></span>
            </div>

            <div class="header-details">
                <h3>CV Upload</h3>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>


            <!-- <div class="form-element" id = "upload-stuff">
                <div class="button-wrap">
                    <label class = "upload-button" for = "upload-file"> Add Files &ensp;<i class="fa-solid fa-cloud-arrow-up"></i></label>
                    <input type="file" id="upload-file" name="filename" multiple> 
                </div>
                <div id="file-list"></div>
            </div> -->

            <div class="cv-details">
                <button class = "file">Margaret Cahill CV.pdf</button>

                <span class="line"></span>

            </div>


            <div class="header-details">
                <h3>Important Links</h3>
                <button class = "edit">Edit<i class="fa-solid fa-pen"></i></button>
            </div>


            <div class="link-details">

                <div class="links">
                        <label for="">Links</label>
                        <button class = "link">
                            <div class="text">
                                <p>https://www.myportfolio.com</p>
                            </div></button>
                        <button class = "link">
                                <div class="text">
                                    <p>https://www.myportfolio/myaccountdetails/andstuff.com</p>
                                </div></button>
                </div>

                <div class="type">
                    <label for="">Categorization</label>
                    <button class = "link">Portfolio</button>
                    <button class = "link">LinkedIn</button>
                </div>

            </div>

            <span class="line end"></span>

           
        </div>

    </div>

    `;

    response.innerHTML = content;

}

function showSavedJobs() {
    let response = document.getElementById("response-div");
    let listItem = document.getElementById("savedJobs");
    listItem.style.background_color =  "blue";
    response.innerHTML = "";


    let content = `
        
    <div class="saved-jobs">
        <h1>Saved Jobs</h1>

        <span class="line"></span>

        <div class="listed-jobs">
            <div class="job-listing">
                <div class="company-title">
                    <img src="../Images/Office.jpg" alt="">
                    <h4> Company Name</h4>
                </div>
                <h2>Software Developer Intern</h2>
                <p> Type of Position | Location</p>
                <p> $40,000</p>
                <p> 45 days to apply</p>

                <form action="">
                    <div class="buttons">
                        <button><i class="fa-solid fa-trash"></i>Remove</button>
                    </div>
                </form>
                <br><br>
            </div>

            <div class="job-listing">
                <div class="company-title">
                    <img src="../Images/Office.jpg" alt="">
                    <h4> Company Name</h4>
                </div>
                <h2>Software Developer Intern</h2>
                <p> Type of Position | Location</p>
                <p> $40,000</p>
                <p> 45 days to apply</p>

                <form action="">
                    <div class="buttons">
                        <button><i class="fa-solid fa-trash"></i>Remove</button>
                    </div>
                </form>
                <br><br>
            </div>

        </div>
    </div>
    `;

    response.innerHTML = content;
    
    
}