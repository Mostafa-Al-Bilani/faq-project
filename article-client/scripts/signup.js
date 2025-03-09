document.addEventListener("DOMContentLoaded", function () {
  const signupForm = document.getElementById("signupForm");

  signupForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    // Get input values
    const fullname = document.getElementById("fullname").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
      // Send request with Axios
      const response = await axios.post(
        `${serverUrl}signup.php`,
        { fullname, email, password },
        { headers: { "Content-Type": "application/json" } }
      );

      if (response.data.status === "success") {
        localStorage.setItem("token", response.data.data);
        window.location.href = "./";
      } else {
        alert(response.data.message);
      }
    } catch (error) {
      console.error(error);
      alert(
        "Error: " + (error.response?.data?.message || "Something went wrong")
      );
    }
  });
});
