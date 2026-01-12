<!-- Enhanced Footer -->
<footer class="footer bg-dark text-light">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Company Information -->
            <div class="col-lg-4 col-md-6">
                <div class="company-info">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Aircargoswift Global Logistics" class="footer-logo mb-4" style="height: 70px;">
                    <h4 class="mb-3">Aircargoswift Global Logistics</h4>
                    <div class="contact-details">
                        {{-- <div class="address mb-3">
                            <i class="bi bi-geo-alt me-2 text-primary"></i>
                            <p class="mb-0">Level 1M, Core 2, Advanced Cargo Centre<br>
                            Kuala Lumpur International Airport<br>
                            64000 Sepang, Selangor Darul Ehsan<br>
                            Malaysia</p>
                        </div> --}}
                        <div class="contact-hours mb-3">
                            <h6 class="text-uppercase text-primary mb-2">Contact Information</h6>
                            <p class="mb-1">
                                <i class="bi bi-envelope me-2"></i>
                                <strong>Standard Inquiries:</strong> support@aircargoswift.com
                            </p>
                            {{-- <p class="mb-0">
                                <i class="bi bi-clock me-2"></i>
                                <strong>Emergency Operations:</strong> ops@aircargoswift.com
                            </p> --}}
                        </div>
                        {{-- <div class="emergency-contact">
                            <p class="mb-1">
                                <i class="bi bi-telephone me-2"></i>
                                <strong>24/7 Operations Hotline:</strong> +603 8777 8888
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-3">
                <h5 class="text-uppercase mb-4 border-bottom border-primary pb-2">Digital Services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('contact') }}" class="text-light text-decoration-none hover-glow">
                            <i class="bi bi-arrow-right-circle me-2"></i>Cargo Booking Portal
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" onclick="showTab('tracking')" class="text-light text-decoration-none hover-glow">
                            <i class="bi bi-arrow-right-circle me-2"></i>Real-Time Tracking
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none hover-glow">
                            <i class="bi bi-arrow-right-circle me-2"></i>Flight Schedules
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none hover-glow">
                            <i class="bi bi-arrow-right-circle me-2"></i>Documentation Center
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none hover-glow">
                            <i class="bi bi-arrow-right-circle me-2"></i>Online Payments
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Solutions -->
            <div class="col-lg-3 col-md-3">
                <h5 class="text-uppercase mb-4 border-bottom border-primary pb-2">Core Solutions</h5>
                <div class="row">
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-check-circle me-2 text-success"></i>Aircargoswift SEND
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-thermometer-snow me-2 text-info"></i>Temperature Control
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-award me-2 text-warning"></i>Halal Logistics
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-truck me-2"></i>MASLift Services
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-globe me-2 text-primary"></i>Global Mail
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-airplane me-2"></i>Charter Operations
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-boxes me-2"></i>Integrated Logistics
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-light text-decoration-none hover-glow">
                                    <i class="bi bi-shield-check me-2 text-success"></i>Security Services
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Operations -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase mb-4 border-bottom border-primary pb-2">Operations & Support</h5>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-headset me-3 text-primary fs-4"></i>
                            <div>
                                <h6 class="mb-1">Ground Operations</h6>
                                <p class="small text-muted mb-0">Premium handling services for all cargo types</p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-lightning me-3 text-warning fs-4"></i>
                            <div>
                                <h6 class="mb-1">Express Processing</h6>
                                <p class="small text-muted mb-0">Priority handling for time-sensitive shipments</p>
                            </div>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-shield-lock me-3 text-success fs-4"></i>
                            <div>
                                <h6 class="mb-1">Security Services</h6>
                                <p class="small text-muted mb-0">Regulatory compliance & secure handling</p>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- Newsletter Subscription -->
                <div class="newsletter mt-4">
                    <h6 class="mb-3">Subscribe for Updates</h6>
                    <div class="input-group">
                        <input type="email" class="form-control bg-dark border-secondary text-light" placeholder="Your email address">
                        <button class="btn btn-primary" type="button">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                    <p class="small text-muted mt-2">Receive industry insights and service updates</p>
                </div>
            </div>
        </div>

        <!-- Partner Network -->
        <div class="partner-network mt-5 pt-4 border-top border-secondary">
            <h5 class="text-center mb-4 text-uppercase">Our Aviation Network</h5>
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/malaysia-airlines.png" alt="Malaysia Airlines" class="partner-logo" data-bs-toggle="tooltip" title="Malaysia Airlines">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/maswings.png" alt="MASwings" class="partner-logo" data-bs-toggle="tooltip" title="MASwings">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/firefly.png" alt="Firefly" class="partner-logo" data-bs-toggle="tooltip" title="Firefly Airlines">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/amal.png" alt="AMAL" class="partner-logo" data-bs-toggle="tooltip" title="AMAL">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/enrich.png" alt="Enrich" class="partner-logo" data-bs-toggle="tooltip" title="Enrich Loyalty">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/journify.png" alt="Journify" class="partner-logo" data-bs-toggle="tooltip" title="Journify">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/maskargo.png" alt="MASkargo" class="partner-logo" data-bs-toggle="tooltip" title="MASkargo">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="partner-logo-wrapper">
                        <img src="https://www.maskargo.com/wp-content/uploads/2024/03/aerodarat.png" alt="AeroDarat" class="partner-logo" data-bs-toggle="tooltip" title="AeroDarat">
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media & Corporate -->
        <div class="row mt-5 pt-4 border-top border-secondary">
            <div class="col-md-6">
                <div class="social-media">
                    <h6 class="mb-3">Connect With Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-icon" data-bs-toggle="tooltip" title="Follow on Facebook">
                            <i class="bi bi-facebook fs-4"></i>
                            <span class="social-text">Facebook</span>
                        </a>
                        <a href="#" class="social-icon" data-bs-toggle="tooltip" title="Follow on Instagram">
                            <i class="bi bi-instagram fs-4"></i>
                            <span class="social-text">Instagram</span>
                        </a>
                        <a href="#" class="social-icon" data-bs-toggle="tooltip" title="Connect on LinkedIn">
                            <i class="bi bi-linkedin fs-4"></i>
                            <span class="social-text">LinkedIn</span>
                        </a>
                        <a href="#" class="social-icon" data-bs-toggle="tooltip" title="Follow on Twitter">
                            <i class="bi bi-twitter fs-4"></i>
                            <span class="social-text">Twitter</span>
                        </a>
                        <a href="#" class="social-icon" data-bs-toggle="tooltip" title="Watch on YouTube">
                            <i class="bi bi-youtube fs-4"></i>
                            <span class="social-text">YouTube</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <div class="quality-badges">
                    <span class="badge bg-primary me-2 mb-2">IATA Certified</span>
                    <span class="badge bg-success me-2 mb-2">ISO 9001:2015</span>
                    <span class="badge bg-warning me-2 mb-2">Halal Certified</span>
                    <span class="badge bg-info mb-2">GDP Compliant</span>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom mt-4 pt-4 border-top border-secondary">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">
                        <i class="bi bi-c-circle me-2"></i>Copyright 2025 Aircargoswift Global Logistics Sdn Bhd. 
                        <span class="d-block d-md-inline">All rights reserved.</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="footer-links text-md-end mt-2 mt-md-0">
                        <a href="#" class="text-light text-decoration-none me-3">Legal Framework</a>
                        <span class="text-muted">•</span>
                        <a href="#" class="text-light text-decoration-none mx-3">Privacy Commitment</a>
                        <span class="text-muted">•</span>
                        <a href="#" class="text-light text-decoration-none mx-3">Corporate Governance</a>
                        <span class="text-muted">•</span>
                        <a href="#" class="text-light text-decoration-none mx-3">Site Information</a>
                        <span class="text-muted">•</span>
                        <a href="#" class="text-light text-decoration-none ms-3">Site Navigation</a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <p class="small text-muted mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        Aircargoswift is a registered trademark of Aircargoswift Global Logistics Sdn Bhd (Company No. 200001234567). 
                        All services subject to terms and conditions.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Tab switching functionality
    function showTab(tabId) {
        // Hide all tabs
        document.querySelectorAll('.tab-pane').forEach(tab => {
            tab.style.display = 'none';
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Show selected tab
        document.getElementById(tabId).style.display = 'block';
        
        // Add active class to clicked button
        event.target.closest('.tab-btn').classList.add('active');
    }
    
    // Set today's date as default
    document.getElementById('date').valueAsDate = new Date();
    
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>

<style>
.footer {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer-logo {
    filter: brightness(0) invert(1);
    transition: transform 0.3s ease;
}

.footer-logo:hover {
    transform: scale(1.05);
}

.hover-glow {
    transition: all 0.3s ease;
    padding: 4px 8px;
    border-radius: 4px;
}

.hover-glow:hover {
    color: #4dabf7 !important;
    background: rgba(77, 171, 247, 0.1);
    padding-left: 12px;
}

.partner-network {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 12px;
    padding: 20px;
}

.partner-logo-wrapper {
    padding: 15px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    transition: all 0.3s ease;
    height: 70px;
    width: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.partner-logo-wrapper:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.partner-logo {
    max-height: 40px;
    max-width: 100px;
    filter: brightness(0) invert(1);
    opacity: 0.8;
    transition: all 0.3s ease;
}

.partner-logo:hover {
    opacity: 1;
    transform: scale(1.1);
}

.social-icon {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    color: #adb5bd;
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 10px;
    border-radius: 8px;
    min-width: 60px;
}

.social-icon:hover {
    color: #4dabf7;
    background: rgba(77, 171, 247, 0.1);
    transform: translateY(-3px);
}

.social-text {
    font-size: 0.7rem;
    margin-top: 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.social-icon:hover .social-text {
    opacity: 1;
}

.newsletter .form-control {
    border-color: #495057;
}

.newsletter .form-control:focus {
    border-color: #4dabf7;
    box-shadow: 0 0 0 0.25rem rgba(77, 171, 247, 0.25);
}

.quality-badges .badge {
    font-size: 0.75rem;
    padding: 5px 10px;
    border-radius: 20px;
}

.footer-links a {
    position: relative;
    padding: 0 5px;
}

.footer-links a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 50%;
    background: #4dabf7;
    transition: all 0.3s ease;
}

.footer-links a:hover::after {
    width: 100%;
    left: 0;
}

.company-info .contact-details i {
    width: 20px;
    text-align: center;
}

@media (max-width: 768px) {
    .partner-logo-wrapper {
        height: 60px;
        width: 100px;
        padding: 10px;
    }
    
    .partner-logo {
        max-height: 30px;
    }
    
    .social-icon {
        min-width: 50px;
        padding: 8px;
    }
    
    .footer-links {
        text-align: center !important;
        margin-top: 15px;
    }
    
    .footer-links a {
        display: block;
        margin: 5px 0;
    }
    
    .footer-links span {
        display: none;
    }
}
</style>
</body>
</html>