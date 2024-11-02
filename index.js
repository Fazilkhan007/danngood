function validateForm(event) {
  event.preventDefault(); // Prevent default form submission

  const name = document.getElementById("floatingNameInput").value;
  const email = document.getElementById("floatingEmailInput").value;
  const number = document.getElementById("floatingPhoneInput").value;
  const message = document.getElementById("floatingTextarea2").value;

  if (name === "") {
    alert("Please enter your full name.");
    return false;
  }

  if (email === "") {
    alert("Please enter your email address.");
    return false;
  } else if (!/\S+@\S+\.\S+/.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  if (number === "") {
    alert("Please enter your phone number.");
    return false;
  }

  if (message === "") {
    alert("Please enter a message.");
    return false;
  }

  console.log("Form submitted successfully!");
  console.log("Name:", name);
  console.log("Email:", email);
  console.log("Phone Number:", number);
  console.log("Message:", message);

  // If all validations pass, submit the form
  document.getElementById("myForm").submit();
  return true;
}
