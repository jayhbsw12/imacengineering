class BusinessInquiryModal {
    constructor() {
        this.modal = document.getElementById('modalOverlay');
        this.openBtns = document.querySelectorAll('.openModalBtn');
        this.closeBtn = document.getElementById('closeModalBtn');
        this.form = document.getElementById('contactForm-popup');
        this.successMessage = document.getElementById('successMessage');
        this.redirectTo = ''; // Store redirect destination

        this.init();
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        this.openBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                this.redirectTo = btn.getAttribute('data-redirect'); // Capture the redirect destination
                this.openModal();
            });
        });

        this.closeBtn.addEventListener('click', () => this.closeModal());

        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.closeModal();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.modal.classList.contains('active')) {
                this.closeModal();
            }
        });

        this.form.addEventListener('submit', (e) => this.handleFormSubmit(e));

        // Optional: Live restriction on phone number field
        const phoneInput = this.form.querySelector('#contactNumber');
        if (phoneInput) {
            phoneInput.addEventListener('input', () => {
                phoneInput.value = phoneInput.value.replace(/[^0-9+]/g, '');
            });
        }
    }

    openModal() {
        this.modal.classList.add('active');
        document.body.classList.add('modal-open');

        setTimeout(() => {
            const firstInput = this.form.querySelector('input[type="text"]');
            if (firstInput) {
                firstInput.focus();
            }
        }, 300);
    }

    closeModal() {
        this.modal.classList.remove('active');
        document.body.classList.remove('modal-open');
        this.resetForm();
    }

    async handleFormSubmit(e) {
        e.preventDefault();

        const fullName = this.form.querySelector('#fullName');
        const email = this.form.querySelector('#email');
        const contactNumber = this.form.querySelector('#contactNumber');
        const message = this.form.querySelector('#message');

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\+?[0-9]{10,15}$/;

        let isValid = true;

        // Clear previous errors
        this.form.querySelectorAll('.error-message').forEach(el => el.textContent = '');
        this.form.querySelectorAll('.invalid').forEach(i => i.classList.remove('invalid'));

        if (!fullName || fullName.value.trim().length < 2) {
            this.setInlineError(fullName, 'Please enter a valid full name.');
            isValid = false;
        }

        if (!email || !emailRegex.test(email.value.trim())) {
            this.setInlineError(email, 'Please enter a valid email address.');
            isValid = false;
        }

        if (!contactNumber || !phoneRegex.test(contactNumber.value.trim())) {
            this.setInlineError(contactNumber, 'Enter a valid phone number (10–15 digits, optional +).');
            isValid = false;
        }

        // Message is optional but limited to 200 chars
        if (message && message.value.trim().length > 200) {
            this.setInlineError(message, 'Message cannot exceed 200 characters.');
            isValid = false;
        }

        if (!isValid) {
            this.showFormError('Please correct the errors above and try again.');
            return;
        }

        const submitBtn = this.form.querySelector('.submit-btn-popup');
        if (submitBtn) {
            const originalText = submitBtn.innerHTML;
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;

            const formData = new FormData(this.form);

            try {
                const response = await fetch('popup-mail.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.text();

                if (result.trim() === 'success') {
                    this.showSuccess();
                } else {
                    this.showFormError('Something went wrong. Please try again.');
                }
            } catch (error) {
                this.showFormError('Server error. Please try again later.');
                console.error('Form submission error:', error);
            } finally {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        }
    }

    setInlineError(input, message) {
        if (!input) return;
        const errorEl = input.nextElementSibling;
        if (errorEl && errorEl.classList.contains('error-message')) {
            errorEl.textContent = message;
            input.classList.add('invalid');
        }
    }

    showSuccess() {
        this.form.style.display = 'none';
        this.successMessage.style.display = 'block';

        // Redirect based on where the form was submitted from
        if (this.redirectTo === 'canva') {
            setTimeout(() => {
                // Use Canva VIEW (read-only)
                window.location.href = 'https://www.canva.com/design/DAGcMDHFu9A/view';
            }, 1500);
        } else if (this.redirectTo === 'thank-you') {
            setTimeout(() => {
                window.location.href = '/thank-you';
            }, 1500);
        }
    }

    showFormError(message) {
        let errorDiv = this.form.querySelector('.form-error');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'form-error';
            errorDiv.style.cssText = `background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 0.75rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.875rem;`;
            this.form.insertBefore(errorDiv, this.form.firstChild);
        }

        errorDiv.textContent = message;
        errorDiv.style.display = 'block';

        setTimeout(() => {
            if (errorDiv) {
                errorDiv.style.display = 'none';
            }
        }, 5000);
    }

    resetForm() {
        this.form.reset();
        this.form.style.display = 'flex';
        this.successMessage.style.display = 'none';
        this.form.querySelectorAll('.error-message').forEach(e => e.textContent = '');
        this.form.querySelectorAll('.invalid').forEach(i => i.classList.remove('invalid'));
    }
}

document.addEventListener('DOMContentLoaded', function () {
    new BusinessInquiryModal();
});
