document.getElementById("contactForm").addEventListener("submit", function(event) {
    let isValid = true;

    const fullName = document.getElementById("fullName").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const country = document.getElementById("country").value;
    const message = document.getElementById("message").value;

    if (!fullName) {
        alert("Full Name is required.");
        isValid = false;
    }

    if (!email || !/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
        alert("A valid Email is required.");
        isValid = false;
    }

    if (!phone || !/^\+?[0-9]{7,}$/.test(phone)) {
        alert("A valid Phone number is required.");
        isValid = false;
    }

    if (!country) {
        alert("Please select a Country.");
        isValid = false;
    }

    if (!message) {
        alert("Message is required.");
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});
