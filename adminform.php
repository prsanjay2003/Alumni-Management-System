<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Registration - Mount Carmel College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url("images/one.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            padding: 30px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .form-header p {
            color: var(--dark-color);
            opacity: 0.8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .required-field::after {
            content: " *";
            color: var(--accent-color);
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px dashed #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .file-hint {
            font-size: 0.8rem;
            color: #666;
            margin-top: 5px;
        }

        .btn-submit {
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .btn-submit:hover {
            background-color: #2980b9;
        }

        .form-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .form-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .status-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .status-option {
            flex: 1;
            text-align: center;
            padding: 15px;
            background-color: var(--light-color);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .status-option:hover {
            background-color: #dfe6e9;
        }

        .status-option.active {
            background-color: var(--secondary-color);
            color: white;
            border-color: var(--secondary-color);
        }

        .status-option i {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .status-selector {
                flex-direction: column;
            }
            
            .container {
                padding: 10px;
            }
            
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-user-graduate"></i> Alumni Registration</h2>
            </div>

            <form id="registrationForm" action="formdatabase.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="registerNumber" class="required-field">Register Number</label>
                    <input type="text" id="registerNumber" name="registerNumber" required>
                </div>

                <div class="form-group">
                    <label for="name" class="required-field">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="academicYear" class="required-field">Academic Year</label>
                    <select id="academicYear" name="academicYear" required>
                        <option value="">Select your academic year</option>
                        <?php
                        $startYear = 2010;
                        $endYear = 2050;
                        for ($year = $startYear; $year <= $endYear - 3; $year++) {
                            $nextYear = $year + 3;
                            echo '<option value="' . $year . '-' . $nextYear . '">' . $year . '-' . $nextYear . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="batch">Batch (Permanent Address)</label>
                    <textarea id="batch" name="batch" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label class="required-field">Current Status</label>
                    <div class="status-selector">
                        <div class="status-option" data-value="higherStudies" onclick="selectStatus(this)">
                            <i class="fas fa-graduation-cap"></i>
                            <div>Higher Studies</div>
                        </div>
                        <div class="status-option" data-value="working" onclick="selectStatus(this)">
                            <i class="fas fa-briefcase"></i>
                            <div>Working</div>
                        </div>
                        <div class="status-option" data-value="certificatecourse" onclick="selectStatus(this)">
                            <i class="fas fa-certificate"></i>
                            <div>Certificate Course</div>
                        </div>
                    </div>
                    <input type="hidden" id="studyOrWork" name="studyOrWork" required>
                </div>

                <!-- Higher Studies Fields -->
                <div id="higherStudiesFields" class="form-section">
                    <div class="form-group">
                        <label for="idCard" class="required-field">ID Card (JPEG only)</label>
                        <input type="file" id="idCard" name="idCard" accept="image/jpeg" data-required="true">
                        <div class="file-hint">Please upload a clear photo of your ID card in JPEG format</div>
                    </div>

                    <div class="form-group">
                        <label for="studyName" class="required-field">Name of Higher Studies</label>
                        <input type="text" id="studyName" name="studyName" data-required="true">
                    </div>

                    <div class="form-group">
                        <label for="studyPlace" class="required-field">Place of Higher Studies</label>
                        <input type="text" id="studyPlace" name="studyPlace" data-required="true">
                    </div>

                    <div class="form-group">
                        <label for="photo" class="required-field">Upload Photo (JPEG only)</label>
                        <input type="file" id="photo" name="photo" accept="image/jpeg" data-required="true">
                        <div class="file-hint">Recent passport size photo in JPEG format</div>
                    </div>
                </div>

                <!-- Working Fields -->
                <div id="workingFields" class="form-section">
                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" id="companyName" name="companyName">
                    </div>

                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" id="designation" name="designation">
                    </div>

                    <div class="form-group">
                        <label for="contactDetails">Contact Details</label>
                        <textarea id="contactDetails" name="contactDetails" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="offerLetter">Upload Offer Letter (PDF)</label>
                        <input type="file" id="offerLetter" name="offerLetter" accept="application/pdf">
                    </div>

                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" id="salary" name="salary">
                    </div>
                </div>

                <!-- Certificate Course Fields -->
                <div id="certificateCourseFields" class="form-section">
                    <div class="form-group">
                        <label for="certificateInstitution">Name of Institution</label>
                        <input type="text" id="certificateInstitution" name="certificateInstitution">
                    </div>

                    <div class="form-group">
                        <label for="certificateDuration">Duration of Course</label>
                        <input type="text" id="certificateDuration" name="certificateDuration">
                    </div>

                    <div class="form-group">
                        <label for="certificateType">Course Type</label>
                        <select id="certificateType" name="certificateType">
                            <option value="government">Government</option>
                            <option value="private">Private</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Submit Registration</button>
            </form>
        </div>
    </div>

    <script>
        // Status selection
        function selectStatus(element) {
            // Remove active class from all options
            document.querySelectorAll('.status-option').forEach(option => {
                option.classList.remove('active');
            });
            
            // Add active class to selected option
            element.classList.add('active');
            
            // Set the hidden input value
            const statusValue = element.getAttribute('data-value');
            document.getElementById('studyOrWork').value = statusValue;
            
            // Show the relevant form section
            showFields(statusValue);
        }

        // Show relevant fields based on status
        function showFields(status) {
            // Hide all sections and remove required attributes
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
                section.querySelectorAll('[data-required="true"]').forEach(input => {
                    input.removeAttribute('required');
                });
            });
            
            // Show the active section and set required attributes
            let activeSection;
            if (status === 'higherStudies') {
                activeSection = document.getElementById('higherStudiesFields');
            } else if (status === 'working') {
                activeSection = document.getElementById('workingFields');
            } else if (status === 'certificatecourse') {
                activeSection = document.getElementById('certificateCourseFields');
            }
            
            if (activeSection) {
                activeSection.classList.add('active');
                activeSection.querySelectorAll('[data-required="true"]').forEach(input => {
                    input.setAttribute('required', 'required');
                });
            }
        }

        // Form validation
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            const status = document.getElementById('studyOrWork').value;
            
            // Validate that a status is selected
            if (!status) {
                alert('Please select your current status');
                event.preventDefault();
                return;
            }
            
            // Validate file types for higher studies
            if (status === 'higherStudies') {
                const idCard = document.getElementById('idCard').files[0];
                const photo = document.getElementById('photo').files[0];
                
                if (idCard && !idCard.type.includes('jpeg')) {
                    alert('ID Card must be a JPEG image');
                    event.preventDefault();
                    return;
                }
                
                if (photo && !photo.type.includes('jpeg')) {
                    alert('Photo must be a JPEG image');
                    event.preventDefault();
                    return;
                }
            }
            
            // Validate offer letter for working
            if (status === 'working') {
                const offerLetter = document.getElementById('offerLetter').files[0];
                if (offerLetter && !offerLetter.type.includes('pdf')) {
                    alert('Offer letter must be a PDF file');
                    event.preventDefault();
                    return;
                }
            }
        });
    </script>
</body>
</html>