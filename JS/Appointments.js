const datePicker = document.getElementById("date-picker");

console.log("Hello " + datePicker.value); // Ensure this contains the selected date

const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, '0');
const day = String(today.getDate()).padStart(2, '0');
const formattedDate = `${year}-${month}-${day}`;



datePicker.addEventListener("change", () => {
    console.log(datePicker.value); // This should log the selected date
});


flatpickr( "#date-picker", {
    
    disable: [
        function(date) {
            return (date.getDay() === 0 || date.getDay() === 6);
        }
    ], // Block specific dates
    minDate: formattedDate,
    maxDate: "2030-04-30", // Set maximum date
    defaultDate: "today",
    dateFormat: "F j, Y",
});


document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("time-modal");
    let buttons = document.querySelectorAll(".timeslots input[type='radio']");
    let input = document.getElementById("time");
    let closeButton = document.getElementById("close-modal");
   

    input.addEventListener("click", () => {
        modal.style.display = "block";
    })

    closeButton.addEventListener("click", () => {
        modal.style.display = "none";
    })

    buttons.forEach((radio) => {
        radio.addEventListener("change", (event) => {
            input.value = event.target.value;
            modal.style.display = "none";
        })
    })

})


function showFormModal() {
    let booking_form = document.getElementById("booking-form-div");
    let backdrop = document.getElementById("backdrop");
    backdrop.style.display = "block";
    booking_form.style.display = "flex";
}

function closeFormModal() {
    let booking_form = document.getElementById("booking-form-div");
    let backdrop = document.getElementById("backdrop");
    booking_form.style.display = "none";
    backdrop.style.display = "none";
}















