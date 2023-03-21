let bookElements = document.querySelectorAll(".bookHardDeleteModalBtn");

bookElements.forEach(item => {
    item.addEventListener("click", () => { 
        var url = item.getAttribute("data-target");
        console.log(url);

        document.querySelector(".bookHardDeleteButton").setAttribute("href", url.toString());
    });
});


let categoryElements = document.querySelectorAll(".categoryHardDeleteModalBtn");

categoryElements.forEach(item => {
    item.addEventListener("click", () => { 
        var url = item.getAttribute("data-target");
        console.log(url);

        document.querySelector(".categoryHardDeleteButton").setAttribute("href", url.toString());
    });
});

let userElements = document.querySelectorAll(".userHardDeleteModalBtn");

userElements.forEach(item => {
    item.addEventListener("click", () => {
        var url = item.getAttribute("data-target");
        console.log(url);

        document.querySelector(".userHardDeleteButton").setAttribute("href", url.toString());
    });
});