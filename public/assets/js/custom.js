// modeSwitch.addEventListener("click", () => {
//     body.classList.toggle("dark");
//     //   document.querySelector(".mode-text").innertext=""

//     if (body.classList.contains("dark")) {
//         modeText.innerText = " Light Mode ";
//     } else modeText.innerText = " Dark Mode ";
// });


//code for message duration for the system success and fail 
(function () {
    const alertElements = document.getElementsByClassName("alert");

    for (let alertIndex = 0; alertIndex < alertElements.length; alertIndex++) {
        const currentAlert = alertElements[alertIndex];
        const duration = parseInt(currentAlert.dataset.duration);

        setTimeout(function () {
            currentAlert.style.opacity = "0";
            currentAlert.style.display = "none";
        }, duration);
    }
})();


//functionality for search bar for the system
function searchFunction() {
    // Get the input value
    var input = document.getElementById("myInput");
    var filter = input.value.toUpperCase();

    // Get all elements with the class name "item"
    var items = document.getElementsByClassName("searchable");

    // Loop through all items and hide those that don't match the search query
    for (var i = 0; i < items.length; i++) {
        var item = items[i];
        var text = item.textContent || item.innerText;

        if (text.toUpperCase().indexOf(filter) > -1) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    }
}

// function for sweet alert when deleting items
function showConfirmationDialog(message, onConfirm) {
    Swal.fire({
        title: "Are you sure?",
        text: message,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete!",
    }).then((result) => {
        if (result.isConfirmed) {
            onConfirm();
        }
    });
}

// For forms: deleteItem(itemId, itemName);
// For links: deleteItem(itemId, itemName, url);

function deleteItem(itemId, itemName, url = null) {
    const message = `This ${itemName} will be deleted permanently!`;

    // Show a confirmation dialog
    showConfirmationDialog(message, () => {
        const formId = `deleteForm_${itemId}`;
        const form = document.getElementById(formId);

        if (form) {
            form.submit();
        }
    });
}

// Product Details Images Slideshow

// document.addEventListener("DOMContentLoaded", function () {
//     const mainProductImage = document.querySelector(".main_product_image img");
//     const otherImagesContainer = document.querySelector(".other_images");

//     otherImagesContainer.querySelectorAll("img").forEach((thumbnail) => {
//         thumbnail.addEventListener("click", (event) => {
//             // Remove active class from all thumbnails
//             otherImagesContainer.querySelectorAll("img").forEach((img) => {
//                 img.classList.remove("active");
//             });

//             // Add active class to the clicked thumbnail
//             event.target.classList.add("active");

//             // Change the source of the main product image with a zoom effect
//             mainProductImage.src = event.target.src;
//         });
//     });

//     // Add the zoom effect on hover for the main product image
//     mainProductImage.addEventListener("mousemove", (e) => {
//         const containerWidth = mainProductImage.offsetWidth;
//         const containerHeight = mainProductImage.offsetHeight;

//         const image = mainProductImage;
//         const imageWidth = image.offsetWidth;
//         const imageHeight = image.offsetHeight;

//         const x = e.pageX - mainProductImage.offsetLeft;
//         const y = e.pageY - mainProductImage.offsetTop;

//         const translateX = (containerWidth / 2 - x) * 2;
//         const translateY = (containerHeight / 2 - y) * 2;

//         const scale = 3;

//         image.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
//     });

//     mainProductImage.addEventListener("mouseleave", () => {
//         mainProductImage.style.transform = "translate(0%, 0%) scale(1)";
//     });
// });



// Main navbar and admin sidenav toggle
$(document).ready(function () {
    $("#burgerIcon, #toggle").click (function () {
        $("#navLinks").toggleClass("show");
        $("#burgerIcon").toggleClass("active_burger", $("#navLinks").hasClass("show"));
    });
});



//Delete button toogle on typing the password 
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById('latest_password');
    const deleteButton = document.getElementById('deleteButton');

    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.trim() !== '') {
            deleteButton.style.display = 'inline';
        } else {
            deleteButton.style.display = 'none';
        }
    });
});



