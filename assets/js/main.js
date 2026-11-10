/**
 * AURA - Old Money Elegance
 * Main JavaScript (Updated)
 */

document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. تغيير خلفية القائمة عند التمرير (Sticky Navbar)
    // ==========================================
    const navbar = document.getElementById("navbar");
    
    if (navbar) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    }

    // ==========================================
    // 2. فتح وإغلاق القائمة في الموبايل
    // ==========================================
    const menuToggle = document.getElementById("menuToggle");
    const mainNav = document.getElementById("mainNav");

    if (menuToggle && mainNav) {
        const navUl = mainNav.querySelector("ul");
        menuToggle.addEventListener("click", () => {
            navUl.classList.toggle("active");
            const icon = menuToggle.querySelector('i');
            if (navUl.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        });
    }

    // ==========================================
    // 3. تأثير الظهور (Fade-in) عند التمرير
    // ==========================================
    const faders = document.querySelectorAll('.fade-in');
    
    if (faders.length > 0) {
        const appearOptions = {
            threshold: 0.2,
            rootMargin: "0px 0px -50px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            });
        }, appearOptions);

        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    }

});