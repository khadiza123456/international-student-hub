<?php
// register.php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Abroad Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            padding: 2rem 1rem;
        }

        .form-container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 2rem;
            padding: 2rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        h1 {
            text-align: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            text-align: center;
            color: rgba(255,255,255,0.8);
            margin-bottom: 2rem;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin: 2rem 0;
            position: relative;
        }

        .progress-steps::before {
            content: "";
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: rgba(255,255,255,0.2);
            z-index: 1;
        }

        .step {
            text-align: center;
            z-index: 2;
            background: transparent;
            flex: 1;
        }

        .step-number {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            color: white;
            font-weight: 700;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .step.active .step-number {
            background: #ff6b6b;
            border-color: #ff6b6b;
        }

        .step.completed .step-number {
            background: #4ecdc4;
            border-color: #4ecdc4;
        }

        .step-label {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.7);
        }

        .step.active .step-label {
            color: white;
            font-weight: 600;
        }

        .form-section {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .form-section.active-section {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            font-size: 1.4rem;
            color: white;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(255,255,255,0.3);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .input-group label {
            color: rgba(255,255,255,0.9);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .input-group label i {
            margin-right: 6px;
        }

        .input-group label .required {
            color: #ff6b6b;
        }

        .input-group input,
        .input-group select,
        .input-group textarea {
            padding: 0.75rem 1rem;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 0.8rem;
            color: white;
            font-size: 0.9rem;
            outline: none;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #ff6b6b;
            background: rgba(255,255,255,0.25);
        }

        .input-group input.error-input {
            border-color: #ff5252;
        }

        .error-text {
            font-size: 0.7rem;
            color: #ffb4b4;
            display: none;
        }

        .error-text.show {
            display: block;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin: 1rem 0;
        }

        .checkbox-group input {
            width: 18px;
            height: 18px;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            gap: 1rem;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 2rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-size: 0.9rem;
        }

        .btn-prev {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .btn-next, .btn-submit {
            background: #ff6b6b;
            color: white;
        }

        .error-message {
            background: rgba(255,82,82,0.2);
            border-left: 4px solid #ff5252;
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            color: #ffebee;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        @media (max-width: 640px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .progress-steps {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1><i class="fas fa-globe-americas"></i> Study Abroad Registration</h1>
    <div class="subtitle">Start your international education journey</div>

    <div class="progress-steps">
        <div class="step active" data-step="1"><div class="step-number">1</div><div class="step-label">Personal Info</div></div>
        <div class="step" data-step="2"><div class="step-number">2</div><div class="step-label">Academic</div></div>
        <div class="step" data-step="3"><div class="step-number">3</div><div class="step-label">Preferences</div></div>
        <div class="step" data-step="4"><div class="step-number">4</div><div class="step-label">Documents</div></div>
    </div>

    <div id="globalError" class="error-message"></div>

    <form id="registrationForm" action="register_process.php" method="POST">
        <!-- Section 1 -->
        <div class="form-section active-section" id="section1">
            <h2 class="section-title"><i class="fas fa-user-graduate"></i> Personal Information</h2>
            <div class="form-grid">
                <div class="input-group">
                    <label>Full Name <span class="required">*</span></label>
                    <input type="text" id="fullName" name="fullName">
                    <div class="error-text" id="fullNameError">Full name is required</div>
                </div>
                <div class="input-group">
                    <label>Password <span class="required">*</span></label>
                    <input type="password" id="password" name="password">
                    <div class="error-text" id="passwordError">Password must be at least 6 characters</div>
                </div>
                <div class="input-group">
                    <label>Confirm Password <span class="required">*</span></label>
                    <input type="password" id="confirm_password" name="confirm_password">
                    <div class="error-text" id="confirmPasswordError">Passwords do not match</div>
                </div>
                <div class="input-group">
                    <label>Date of Birth <span class="required">*</span></label>
                    <input type="date" id="dob" name="dob">
                    <div class="error-text" id="dobError">Date of birth is required</div>
                </div>
                <div class="input-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email">
                    <div class="error-text" id="emailError">Valid email is required</div>
                </div>
                <div class="input-group">
                    <label>Phone <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone">
                    <div class="error-text" id="phoneError">Phone number is required</div>
                </div>
                <div class="input-group">
                    <label>Country <span class="required">*</span></label>
                    <select id="country" name="country">
                        <optionv value="">Select Country</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="India">India</option>
                        <option value="Pakistan">Pakistan</option>
                    </select>
                    <div class="error-text" id="countryError">Country is required</div>
                </div>
                <div class="input-group">
                    <label>City <span class="required">*</span></label>
                    <input type="text" id="city" name="city">
                    <div class="error-text" id="cityError">City is required</div>
                </div>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="form-section" id="section2">
            <h2 class="section-title"><i class="fas fa-graduation-cap"></i> Academic Background</h2>
            <div class="form-grid">
                <div class="input-group">
                    <label>Highest Qualification</label>
                    <select id="qualification" name="qualification">
                        <option value="">Select</option>
                        <option value="High School">High School</option>
                        <option value="Bachelor's">Bachelor's</option>
                        <option value="Master's">Master's</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Major/Field of Study</label>
                    <input type="text" id="major" name="major">
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="form-section" id="section3">
            <h2 class="section-title"><i class="fas fa-plane-departure"></i> Study Preferences</h2>
            <div class="form-grid">
                <div class="input-group">
                    <label>Preferred Country <span class="required">*</span></label>
                    <select id="preferredCountry" name="preferredCountry">
                        <option value="">Select</option>
                        <option value="USA">USA</option>
                        <option value="Canada">Canada</option>
                        <option value="UK">UK</option>
                        <option value="Australia">Australia</option>
                    </select>
                    <div class="error-text" id="preferredCountryError">Preferred country is required</div>
                </div>
                <div class="input-group">
                    <label>Intake</label>
                    <select id="intake" name="intake">
                        <option value="">Select</option>
                        <option value="Fall 2025">Fall 2025</option>
                        <option value="Spring 2026">Spring 2026</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Program Level</label>
                    <select id="programLevel" name="programLevel">
                        <option value="">Select</option>
                        <option value="Bachelor's">Bachelor's</option>
                        <option value="Master's">Master's</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Budget (USD/year)</label>
                    <select id="budget" name="budget">
                        <option value="">Select</option>
                        <option value="<10k">&lt; $10,000</option>
                        <option value="10k-20k">$10,000 - $20,000</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Section 4 -->
        <div class="form-section" id="section4">
            <h2 class="section-title"><i class="fas fa-language"></i> Language & Documents</h2>
            <div class="form-grid">
                <div class="input-group">
                    <label>English Test</label>
                    <select id="engTest" name="engTest">
                        <option value="">Not taken</option>
                        <option value="IELTS">IELTS</option>
                        <option value="TOEFL">TOEFL</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Test Score</label>
                    <input type="text" id="testScore" name="testScore">
                </div>
                <div class="input-group">
                    <label>Passport Status</label>
                    <select id="passport" name="passport">
                        <option value="">Select</option>
                        <option value="yes">Yes, I have</option>
                        <option value="no">No, need to apply</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Comments</label>
                    <textarea id="comments" name="comments" rows="2"></textarea>
                </div>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms">
                <label>I agree to the terms & conditions <span class="required">*</span></label>
            </div>
            <div class="error-text" id="termsError">You must agree to the terms</div>
        </div>

        <div class="form-buttons">
            <button type="button" class="btn btn-prev" id="prevBtn" style="display:none"><i class="fas fa-arrow-left"></i> Previous</button>
            <button type="button" class="btn btn-next" id="nextBtn">Next <i class="fas fa-arrow-right"></i></button>
            <button type="submit" class="btn btn-submit" id="submitBtn" style="display:none"><i class="fas fa-paper-plane"></i> Register</button>
        </div>
    </form>
</div>

<script>
    // DOM Elements
    let currentStep = 1;
    const totalSteps = 4;

    // Validation functions
    function showError(elementId, show, message = '') {
        const errorEl = document.getElementById(elementId);
        if (show) {
            errorEl.textContent = message || errorEl.textContent;
            errorEl.classList.add('show');
        } else {
            errorEl.classList.remove('show');
        }
    }

    function showFieldError(input, errorDiv, message) {
        if (message) {
            errorDiv.textContent = message;
            errorDiv.classList.add('show');
            input.classList.add('error-input');
        } else {
            errorDiv.classList.remove('show');
            input.classList.remove('error-input');
        }
    }

    function validateSection1() {
        let isValid = true;
        const fullName = document.getElementById('fullName').value.trim();
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('confirm_password').value;
        const dob = document.getElementById('dob').value;
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const country = document.getElementById('country').value;
        const city = document.getElementById('city').value.trim();

        if (!fullName) { showFieldError(document.getElementById('fullName'), document.getElementById('fullNameError'), 'Full name required'); isValid = false; }
        else { showFieldError(document.getElementById('fullName'), document.getElementById('fullNameError'), ''); }

        if (!password || password.length < 6) { showFieldError(document.getElementById('password'), document.getElementById('passwordError'), 'Password must be 6+ characters'); isValid = false; }
        else { showFieldError(document.getElementById('password'), document.getElementById('passwordError'), ''); }

        if (password !== confirm) { showFieldError(document.getElementById('confirm_password'), document.getElementById('confirmPasswordError'), 'Passwords do not match'); isValid = false; }
        else { showFieldError(document.getElementById('confirm_password'), document.getElementById('confirmPasswordError'), ''); }

        if (!dob) { showFieldError(document.getElementById('dob'), document.getElementById('dobError'), 'Date of birth required'); isValid = false; }
        else { showFieldError(document.getElementById('dob'), document.getElementById('dobError'), ''); }

        const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
        if (!email || !emailRegex.test(email)) { showFieldError(document.getElementById('email'), document.getElementById('emailError'), 'Valid email required'); isValid = false; }
        else { showFieldError(document.getElementById('email'), document.getElementById('emailError'), ''); }

        if (!phone) { showFieldError(document.getElementById('phone'), document.getElementById('phoneError'), 'Phone required'); isValid = false; }
        else { showFieldError(document.getElementById('phone'), document.getElementById('phoneError'), ''); }

        if (!country) { showFieldError(document.getElementById('country'), document.getElementById('countryError'), 'Country required'); isValid = false; }
        else { showFieldError(document.getElementById('country'), document.getElementById('countryError'), ''); }

        if (!city) { showFieldError(document.getElementById('city'), document.getElementById('cityError'), 'City required'); isValid = false; }
        else { showFieldError(document.getElementById('city'), document.getElementById('cityError'), ''); }

        return isValid;
    }

    function validateSection3() {
        let isValid = true;
        const preferredCountry = document.getElementById('preferredCountry').value;

        if (!preferredCountry) {
            showFieldError(document.getElementById('preferredCountry'), document.getElementById('preferredCountryError'), 'Preferred country required');
            isValid = false;
        } else {
            showFieldError(document.getElementById('preferredCountry'), document.getElementById('preferredCountryError'), '');
        }
        return isValid;
    }

    function validateSection4() {
        let isValid = true;
        const terms = document.getElementById('terms').checked;

        if (!terms) {
            document.getElementById('termsError').classList.add('show');
            isValid = false;
        } else {
            document.getElementById('termsError').classList.remove('show');
        }
        return isValid;
    }

    // Navigation
    function updateUI() {
        for (let i = 1; i <= totalSteps; i++) {
            const section = document.getElementById(`section${i}`);
            if (i === currentStep) section.classList.add('active-section');
            else section.classList.remove('active-section');
        }

        const steps = document.querySelectorAll('.step');
        steps.forEach((step, idx) => {
            if (idx + 1 < currentStep) step.classList.add('completed');
            else step.classList.remove('completed');
            if (idx + 1 === currentStep) step.classList.add('active');
            else step.classList.remove('active');
        });

        if (currentStep === 1) document.getElementById('prevBtn').style.display = 'none';
        else document.getElementById('prevBtn').style.display = 'inline-flex';

        if (currentStep === totalSteps) {
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('submitBtn').style.display = 'inline-flex';
        } else {
            document.getElementById('nextBtn').style.display = 'inline-flex';
            document.getElementById('submitBtn').style.display = 'none';
        }
    }

    function nextStep() {
        let valid = false;
        if (currentStep === 1) valid = validateSection1();
        else if (currentStep === 2) valid = true;
        else if (currentStep === 3) valid = validateSection3();
        else valid = true;

        if (valid && currentStep < totalSteps) {
            currentStep++;
            updateUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else if (!valid) {
            document.getElementById('globalError').textContent = 'Please fill all required fields correctly';
            document.getElementById('globalError').classList.add('show');
            setTimeout(() => document.getElementById('globalError').classList.remove('show'), 3000);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            updateUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    // Form submit validation
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        if (!validateSection1() || !validateSection3() || !validateSection4()) {
            e.preventDefault();
            document.getElementById('globalError').textContent = 'Please fix all errors before submitting';
            document.getElementById('globalError').classList.add('show');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    // Event listeners
    document.getElementById('nextBtn').addEventListener('click', nextStep);
    document.getElementById('prevBtn').addEventListener('click', prevStep);
    updateUI();

    // Real-time validation
    document.getElementById('password').addEventListener('input', function() {
        const val = this.value;
        if (val.length > 0 && val.length < 6) {
            showFieldError(this, document.getElementById('passwordError'), 'Password must be 6+ characters');
        } else {
            showFieldError(this, document.getElementById('passwordError'), '');
        }
    });
</script>
</body>
</html>