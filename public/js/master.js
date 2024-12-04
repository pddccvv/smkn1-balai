window.addEventListener("scroll", function () {
    const navbarBrand = document.getElementById("navbarBrand");
    if (window.scrollY > 50) {
        navbarBrand.classList.add("brand-blur");
    } else {
        navbarBrand.classList.remove("brand-blur");
    }
});

// Pastikan tombol hamburger bisa berfungsi dengan benar
document
    .querySelector(".navbar-toggler")
    .addEventListener("click", function () {
        const navbarMenu = document.querySelector(".navbar-menu-wrapper");
        navbarMenu.classList.toggle("show");
    });
