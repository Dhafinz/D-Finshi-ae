document.addEventListener('DOMContentLoaded', function() {
    // Fade-in on scroll untuk section
    const sections = document.querySelectorAll('.featured, .products');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(30px)';
        section.style.transition = 'opacity 0.6s, transform 0.6s';
        observer.observe(section);
    });

    // Validasi form
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            let valid = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.style.borderColor = '#D52B1E';
                } else {
                    input.style.borderColor = '#ddd';
                }
            });
            if (!valid) {
                e.preventDefault();
                alert('Harap isi semua field yang diperlukan.');
            }
        });
    });
});