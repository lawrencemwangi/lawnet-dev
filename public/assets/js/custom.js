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


// Main navbar toggle
$(document).ready(function () {
    $("#burgerIcon, #toggle").click(function () {
        $("#navLinks").toggleClass("show");
        $("#burgerIcon").toggleClass(
            "active_burger",
            $("#navLinks").hasClass("show")
        );
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




//Blog part for the paragraph

function toggleContent(blogId) {
    var description = document.getElementById('description_' + blogId);
    var moreContent = document.getElementById('moreContent_' + blogId);
    var a = document.querySelector('a[data-blog-id="' + blogId + '"]');

    if (moreContent.style.display === 'none') {
        moreContent.style.display = 'inline';
        description.style.display = 'none';
        a.textContent = 'Show Less';
    } else {
        moreContent.style.display = 'none';
        description.style.display = 'inline';
        a.textContent = 'Learn More';
    }
}
