document.addEventListener("DOMContentLoaded", function () {
  const faqForm = document.getElementById("faqForm");

  faqForm.addEventListener("submit", async function (event) {
    event.preventDefault();

    // Get input values
    const question = document.getElementById("question").value;
    const answer = document.getElementById("answer").value;

    try {
      // Send request with Axios
      let token = localStorage.getItem("token");
      const response = await axios.post(
        `${serverUrl}submit.php`,

        { question, answer },
        {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        }
      );
      document.getElementById("toast").innerHTML = response.data.message;
      document.getElementById("toast").classList.add("active");
      setTimeout(function () {
        document.getElementById("toast").classList.remove("active");
      }, 2000);
    } catch (error) {
      console.error(error);
      alert(
        "Error: " + (error.response?.data?.message || "Something went wrong")
      );
    }
  });
});
