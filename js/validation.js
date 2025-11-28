class FormValidator {
  constructor(formId) {
    this.form = document.getElementById(formId);
    this.errors = {};
    this.init();
  }

  init() {
    if (!this.form) return;
    
    this.bindEvents();
    this.setupRealTimeValidation();
  }

  bindEvents() {
    this.form.addEventListener('submit', (e) => {
      e.preventDefault();
      this.validateForm();
    });
  }

  setupRealTimeValidation() {
    const inputs = this.form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
      // Validate on blur
      input.addEventListener('blur', () => {
        this.validateField(input);
      });

      // Clear errors on input
      input.addEventListener('input', () => {
        this.clearFieldError(input);
      });

      // Special handling for select
      if (input.tagName === 'SELECT') {
        input.addEventListener('change', () => {
          this.validateField(input);
        });
      }
    });
  }

  validateForm() {
    this.errors = {};
    let isValid = true;

    // Get all form fields
    const fields = {
      name: this.form.querySelector('#name'),
      phone: this.form.querySelector('#phone'),
      organization: this.form.querySelector('#organization'),
      email: this.form.querySelector('#email'),
      services: this.form.querySelector('#services'),
      message: this.form.querySelector('#message')
    };

    // Validate each field
    Object.keys(fields).forEach(fieldName => {
      const field = fields[fieldName];
      if (field && !this.validateField(field)) {
        isValid = false;
      }
    });

    if (isValid) {
      this.submitForm();
    } else {
      // Focus on first error field
      const firstErrorField = this.form.querySelector('.form-group.error input, .form-group.error textarea, .form-group.error select');
      if (firstErrorField) {
        firstErrorField.focus();
      }
    }
  }

  validateField(field) {
    const fieldName = field.name;
    const value = field.value.trim();
    const isRequired = field.hasAttribute('required');
    
    // Clear previous error
    this.clearFieldError(field);

    // Required field validation
    if (isRequired && !value) {
      this.setFieldError(field, `${this.getFieldLabel(field)} is required`);
      return false;
    }

    // Skip other validations if field is empty and not required
    if (!value && !isRequired) {
      return true;
    }

    // Field-specific validations
    switch (fieldName) {
      case 'name':
        return this.validateName(field, value);
      case 'phone':
        return this.validatePhone(field, value);
      case 'organization':
        return this.validateOrganization(field, value);
      case 'email':
        return this.validateEmail(field, value);
      case 'services':
        return this.validateServices(field, value);
      case 'message':
        return this.validateMessage(field, value);
      default:
        return true;
    }
  }

  validateName(field, value) {
    if (value.length < 2) {
      this.setFieldError(field, 'Name must be at least 2 characters long');
      return false;
    }
    
    if (!/^[a-zA-Z\s'-]+$/.test(value)) {
      this.setFieldError(field, 'Name can only contain letters, spaces, hyphens, and apostrophes');
      return false;
    }
    
    this.setFieldSuccess(field);
    return true;
  }

  validatePhone(field, value) {
    // Remove all non-digit characters for validation
    const phoneDigits = value.replace(/\D/g, '');
    
    if (phoneDigits.length < 10) {
      this.setFieldError(field, 'Phone number must be at least 10 digits');
      return false;
    }
    
    if (phoneDigits.length > 15) {
      this.setFieldError(field, 'Phone number cannot exceed 15 digits');
      return false;
    }
    
    // Basic phone format validation
    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
    if (!phoneRegex.test(phoneDigits)) {
      this.setFieldError(field, 'Please enter a valid phone number');
      return false;
    }
    
    this.setFieldSuccess(field);
    return true;
  }

  validateOrganization(field, value) {
    if (value.length < 2) {
      this.setFieldError(field, 'Organization name must be at least 2 characters long');
      return false;
    }
    
    if (value.length > 100) {
      this.setFieldError(field, 'Organization name cannot exceed 100 characters');
      return false;
    }
    
    this.setFieldSuccess(field);
    return true;
  }

  validateEmail(field, value) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!emailRegex.test(value)) {
      this.setFieldError(field, 'Please enter a valid email address');
      return false;
    }
    
    // Additional email validation
    if (value.length > 254) {
      this.setFieldError(field, 'Email address is too long');
      return false;
    }
    
    const [localPart, domain] = value.split('@');
    if (localPart.length > 64) {
      this.setFieldError(field, 'Email address local part is too long');
      return false;
    }
    
    this.setFieldSuccess(field);
    return true;
  }

  validateServices(field, value) {
    if (!value) {
      this.setFieldError(field, 'Please select a service');
      return false;
    }
    
    const validServices = ['consulting', 'implementation', 'maintenance', 'training'];
    if (!validServices.includes(value)) {
      this.setFieldError(field, 'Please select a valid service');
      return false;
    }
    
    this.setFieldSuccess(field);
    return true;
  }

  validateMessage(field, value) {
    // Message is optional, but if provided, validate length
    if (value && value.length > 1000) {
      this.setFieldError(field, 'Message cannot exceed 1000 characters');
      return false;
    }
    
    if (value) {
      this.setFieldSuccess(field);
    }
    return true;
  }

  setFieldError(field, message) {
    const formGroup = field.closest('.form-group');
    const errorElement = formGroup.querySelector('.error-message');
    
    formGroup.classList.remove('success');
    formGroup.classList.add('error');
    
    if (errorElement) {
      errorElement.textContent = message;
      errorElement.classList.add('show');
    }
    
    this.errors[field.name] = message;
  }

  setFieldSuccess(field) {
    const formGroup = field.closest('.form-group');
    
    formGroup.classList.remove('error');
    formGroup.classList.add('success');
    
    delete this.errors[field.name];
  }

  clearFieldError(field) {
    const formGroup = field.closest('.form-group');
    const errorElement = formGroup.querySelector('.error-message');
    
    formGroup.classList.remove('error', 'success');
    
    if (errorElement) {
      errorElement.classList.remove('show');
      setTimeout(() => {
        errorElement.textContent = '';
      }, 300);
    }
    
    delete this.errors[field.name];
  }

  getFieldLabel(field) {
    const label = field.closest('.form-group').querySelector('label');
    return label ? label.textContent.replace('*', '').trim() : field.name;
  }

  async submitForm() {
    const submitBtn = this.form.querySelector('.submit-btn');
    const originalText = submitBtn.textContent;
    
    // Show loading state
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    
    try {
      // Simulate API call
      await this.simulateFormSubmission();
      
      // Show success message
      this.showSuccessMessage();
      
      // Reset form
      this.form.reset();
      this.clearAllErrors();
      
    } catch (error) {
      // Show error message
      this.showErrorMessage('Failed to send message. Please try again.');
    } finally {
      // Reset button
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    }
  }

  simulateFormSubmission() {
    return new Promise((resolve, reject) => {
      // Simulate network delay
      setTimeout(() => {
        // Simulate 90% success rate
        if (Math.random() > 0.1) {
          resolve();
        } else {
          reject(new Error('Network error'));
        }
      }, 2000);
    });
  }

  showSuccessMessage() {
    const message = this.createMessage('Message sent successfully! We\'ll get back to you soon.', 'success');
    this.showMessage(message);
  }

  showErrorMessage(text) {
    const message = this.createMessage(text, 'error');
    this.showMessage(message);
  }

  createMessage(text, type) {
    const message = document.createElement('div');
    message.className = `form-message ${type}`;
    message.innerHTML = `
      <div class="message-content">
        <span class="message-icon">${type === 'success' ? '✓' : '✗'}</span>
        <span class="message-text">${text}</span>
        <button class="message-close" aria-label="Close message">×</button>
      </div>
    `;
    
    // Add close functionality
    message.querySelector('.message-close').addEventListener('click', () => {
      this.hideMessage(message);
    });
    
    return message;
  }

  showMessage(message) {
    // Remove existing messages
    const existingMessages = document.querySelectorAll('.form-message');
    existingMessages.forEach(msg => msg.remove());
    
    // Add new message
    this.form.insertBefore(message, this.form.firstChild);
    
    // Animate in
    setTimeout(() => {
      message.classList.add('show');
    }, 10);
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
      this.hideMessage(message);
    }, 5000);
  }

  hideMessage(message) {
    message.classList.remove('show');
    setTimeout(() => {
      if (message.parentNode) {
        message.remove();
      }
    }, 300);
  }

  clearAllErrors() {
    const formGroups = this.form.querySelectorAll('.form-group');
    formGroups.forEach(group => {
      group.classList.remove('error', 'success');
      const errorElement = group.querySelector('.error-message');
      if (errorElement) {
        errorElement.classList.remove('show');
        errorElement.textContent = '';
      }
    });
    this.errors = {};
  }
}

// Initialize form validation when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new FormValidator('contactForm');
});

// Add CSS for form messages
const messageStyles = `
  .form-message {
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 8px;
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.3s ease, transform 0.3s ease;
  }
  
  .form-message.show {
    opacity: 1;
    transform: translateY(0);
  }
  
  .form-message.success {
    background: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
  }
  
  .form-message.error {
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
  }
  
  .message-content {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  
  .message-icon {
    font-weight: bold;
    font-size: 16px;
  }
  
  .message-text {
    flex: 1;
  }
  
  .message-close {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background-color 0.3s ease;
  }
  
