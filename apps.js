document.addEventListener("DOMContentLoaded",function(){
    button=document.getElementById("searchButton")

    button.addEventListener("click",function(){
        fetch('http://localhost:8888/info2180-lab4/superheroes.php')
        .then(response=> response.text())
        .then(data=> alert(data))
        .catch(error=>alert(error));
})


    })



