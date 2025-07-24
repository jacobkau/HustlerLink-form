document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('hustlerForm');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Clear previous validation
        clearValidation();
        
        // Validate form
        if (validateForm()) {
            // If validation passes, submit the form
            this.submit();
        }
    });
    
    function validateForm() {
        let isValid = true;
        
        // Validate required fields
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                markAsInvalid(field, 'This field is required');
                isValid = false;
            }
        });
        
        // Validate email format
        const emailField = form.querySelector('#email');
        if (emailField.value && !isValidEmail(emailField.value)) {
            markAsInvalid(emailField, 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate phone number
        const phoneField = form.querySelector('#phone');
        if (phoneField.value && !isValidPhone(phoneField.value)) {
            markAsInvalid(phoneField, 'Please enter a valid phone number');
            isValid = false;
        }
        
        return isValid;
    }
    
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    function isValidPhone(phone) {
        const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
        return re.test(phone);
    }
    
    function markAsInvalid(field, message) {
        field.classList.add('is-invalid');
        
        let feedback = field.nextElementSibling;
        if (!feedback || !feedback.classList.contains('invalid-feedback')) {
            feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            field.parentNode.insertBefore(feedback, field.nextSibling);
        }
        
        feedback.textContent = message;
    }
    
    function clearValidation() {
        const invalidFields = form.querySelectorAll('.is-invalid');
        invalidFields.forEach(field => {
            field.classList.remove('is-invalid');
        });
        
        const feedbacks = form.querySelectorAll('.invalid-feedback');
        feedbacks.forEach(feedback => {
            feedback.textContent = '';
        });
    }
});