document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("searchButton");
    const results = document.getElementById("result");
    const input = document.getElementById("Search");

    button.addEventListener("click", function () {
        const value = input.value // Get the input value
        fetch(`http://localhost:8888/info2180-lab4/superheroes.php?search=${encodeURIComponent(value)}`)
            .then(response => response.text())
            .then(data => results.innerHTML = data)  // Display the results in the result div
            .catch(error => alert(error));  // Display error if the fetch fails
    });
});



