<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HustlerLink - Join Our Marketplace</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container-fluid hustler-container">
        <header class="hustler-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="fas fa-bolt"></i> HustlerLink</h1>
                    <p class="text-white-50">9:41 • Job's Marketplace Delivery Property</p>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-outline-light me-2"><i class="fas fa-search me-2"></i>Find Work</button>
                    <button class="btn btn-primary"><i class="fas fa-users me-2"></i>Hiring Talent?</button>
                </div>
            </div>
        </header>

            <main class="hustler-main">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card hustler-card">
                        <div class="card-header">
                            <h2>Join HustlerLink Marketplace</h2>
                            <p>Complete your profile to start finding work or hiring talent</p>
                        </div>
                        <div class="card-body">
                            <form id="hustlerForm" action="save.php" method="POST">
                                <div class="mb-3">
                                    <label for="fullName" class="form-label"><i class="fas fa-user me-2 text-orange"></i>Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label"><i class="fas fa-envelope me-2 text-orange"></i>Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label"><i class="fas fa-phone me-2 text-orange"></i>Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>

                                <div class="mb-3">
                                    <label for="userType" class="form-label"><i class="fas fa-bullseye me-2 text-orange"></i>I want to:</label>
                                    <select class="form-select" id="userType" name="userType" required>
                                        <option value="">Select an option</option>
                                        <option value="find_work">Find Work</option>
                                        <option value="hire_talent">Hire Talent</option>
                                        <option value="both">Both</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="skills" class="form-label"><i class="fas fa-tools me-2 text-orange"></i>Skills/Profession</label>
                                    <input type="text" class="form-control" id="skills" name="skills" placeholder="e.g., Delivery, Web Development, Real Estate">
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label"><i class="fas fa-map-marker-alt me-2 text-orange"></i>Location</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-3">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Profile
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="hustler-footer">
            <div class="row">
                <div class="col-md-6">
                    <p>© 2023 HustlerLink. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>Job's Marketplace Delivery Property</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>

</html>