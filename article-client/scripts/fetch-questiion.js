async function fetchFaq() {
  const token = localStorage.getItem("token");
  const search_value = document.getElementById("search").value;
      
  try {
  // Send request with Axios
  const response = await axios.get(
    `${serverUrl}fetch-questions.php?search=${(search_value)}`,

    { headers: { "Content-Type": "application/json", "Authorization" : `Bearer ${token}`} }
  );

  if (response.data.status === "success") {
    const questions = response.data.data;
    let html = "";
    for(let i = 0; i < questions.length; i++){
      html += `<div class="card">
    <div class="question">${questions[i]["question"]}</div>
    <div class="answer">${questions[i]["answer"]} </div>
  </div>`
    }
    document.getElementById("container").innerHTML = html;
    
  } else {
    alert(response.data.message);
  }
} catch (error) {
  console.error(error);
  alert("Error: " + (error.response?.data?.message || "Something went wrong"));
}
}

document.addEventListener("DOMContentLoaded",() => {
  fetchFaq();


    
});

