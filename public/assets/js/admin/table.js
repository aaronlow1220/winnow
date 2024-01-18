let masterCheckmark = document.querySelector("#master-checkmark");
let otherCheckmark = document.querySelectorAll(".checkmark");

masterCheckmark.addEventListener("change", (e) => {
    if (e.target.checked === true) {
        for (var i = 0; i < otherCheckmark.length; i++) {
            otherCheckmark[i].checked = true;
        }
    }
    if (e.target.checked === false) {
        for (var i = 0; i < otherCheckmark.length; i++) {
            otherCheckmark[i].checked = false;
        }
    }
});
