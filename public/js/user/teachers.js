document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const closeModal = document.querySelector(".modal .close");

    document.querySelectorAll(".photo-clickable").forEach((photo) => {
        photo.addEventListener("click", () => {
            modal.style.display = "block";
            modalImage.src = photo.src;
        });
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    modal.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
