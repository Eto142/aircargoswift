
{{-- resources/views/about.blade.php --}}
@include('home.header')
<!-- Enhanced About Hero -->
<section class="about-hero py-6 bg-gradient-primary text-white position-relative overflow-hidden">
    <div class="container position-relative z-2">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                    </ol>
                </nav>
                <h1 class="display-3 fw-bold mb-4">Pioneering Global Logistics Excellence</h1>
                <p class="lead mb-4 opacity-90">Transforming global supply chains through innovative air cargo solutions that bridge continents, empower commerce, and deliver reliability where it matters most.</p>
                <div class="d-flex gap-3">
                    <a href="{{ url('contact') }}" class="btn btn-light btn-lg px-4">
                        <i class="bi bi-chat-dots me-2"></i>Partner With Us
                    </a>
                    <a href="#capabilities" class="btn btn-outline-light btn-lg px-4">
                        <i class="bi bi-play-circle me-2"></i>Our Capabilities
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-overlay">
        <img src="{{ asset('assets/images/air-cargo.jpg') }}" alt="Aircargoswift Global Network" class="img-fluid">
        <div class="overlay-gradient"></div>
    </div>
</section>

<!-- Company Overview -->
<section class="py-6 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/air-cargo3.avif') }}" class="img-fluid rounded-4 shadow-lg" alt="Aircargoswift Global Operations">
                    <div class="experience-badge">
                        <div class="badge-content">
                            <span class="years">20+</span>
                            <span class="text">Years Experience</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-tag">Our Foundation</div>
                <h2 class="display-5 fw-bold mb-4">Redefining Global Logistics Since 2003</h2>
                <p class="lead mb-4">Aircargoswift stands as a premier force in international air cargo logistics, orchestrating seamless freight movements across a network spanning 150+ countries. We combine decades of aviation expertise with cutting-edge technology to deliver precision logistics solutions.</p>
                
                <div class="accordion" id="aboutAccordion">
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button bg-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                <i class="bi bi-globe-americas me-3 text-primary"></i>
                                Global Reach, Local Expertise
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                With operational hubs strategically located across major global markets, we provide localized solutions backed by worldwide network strength. Our multilingual teams understand regional nuances while maintaining global standards.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed bg-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                <i class="bi bi-shield-check me-3 text-primary"></i>
                                Commitment to Excellence
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Every shipment receives our unwavering commitment to safety, compliance, and operational excellence. Our certified processes and trained professionals ensure your cargo moves with precision and care.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision, Values Enhanced -->
<section class="py-6 bg-gradient-light">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-tag">Our Foundation</div>
            <h2 class="display-5 fw-bold mb-4">The Pillars of Our Excellence</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Guided by principles that define our commitment to customers, innovation, and global connectivity.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="pillar-card h-100 shadow-lg rounded-4 overflow-hidden">
                    <div class="pillar-header bg-primary text-white py-4 px-4">
                        <i class="bi bi-bullseye fs-1 mb-3"></i>
                        <h4 class="mb-0">Our Mission</h4>
                    </div>
                    <div class="pillar-body p-4">
                        <p class="mb-4">To empower global commerce through intelligent logistics solutions that transcend geographical barriers, delivering reliability, speed, and innovation at every touchpoint.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Connect global supply chains</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Deliver operational excellence</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drive sustainable logistics</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="pillar-card h-100 shadow-lg rounded-4 overflow-hidden">
                    <div class="pillar-header bg-dark text-white py-4 px-4">
                        <i class="bi bi-eye fs-1 mb-3"></i>
                        <h4 class="mb-0">Our Vision</h4>
                    </div>
                    <div class="pillar-body p-4">
                        <p class="mb-4">To be the world's most trusted air cargo partner, recognized for transforming supply chain complexity into seamless, intelligent, and sustainable logistics ecosystems.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Industry innovation leader</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Global sustainability advocate</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Digital logistics pioneer</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="pillar-card h-100 shadow-lg rounded-4 overflow-hidden">
                    <div class="pillar-header bg-warning text-dark py-4 px-4">
                        <i class="bi bi-stars fs-1 mb-3"></i>
                        <h4 class="mb-0">Core Values</h4>
                    </div>
                    <div class="pillar-body p-4">
                        <div class="value-item mb-3">
                            <h6 class="fw-bold mb-2">Integrity First</h6>
                            <p class="small mb-0">Uncompromising ethical standards in all operations</p>
                        </div>
                        <div class="value-item mb-3">
                            <h6 class="fw-bold mb-2">Customer Excellence</h6>
                            <p class="small mb-0">Anticipating needs, exceeding expectations</p>
                        </div>
                        <div class="value-item mb-3">
                            <h6 class="fw-bold mb-2">Innovation Driven</h6>
                            <p class="small mb-0">Continuous improvement through technology</p>
                        </div>
                        <div class="value-item">
                            <h6 class="fw-bold mb-2">Global Responsibility</h6>
                            <p class="small mb-0">Sustainable practices, community impact</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Capabilities Section -->
<section id="capabilities" class="py-6 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-tag">Our Expertise</div>
            <h2 class="display-5 fw-bold mb-4">Comprehensive Logistics Solutions</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Specialized services designed for diverse industry requirements, delivered with precision and care.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="capability-card h-100 text-center p-4 rounded-4 shadow-sm border-hover">
                    <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4" style="width: 80px; height: 80px;">
                        <i class="bi bi-box-seam fs-2"></i>
                    </div>
                    <h5 class="mb-3">General Air Freight</h5>
                    <p class="text-muted mb-4">Comprehensive air cargo solutions for commercial shipments with flexible capacity and global reach.</p>
                    <div class="capability-features">
                        <span class="badge bg-light text-dark me-2 mb-2">Express</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Consolidation</span>
                        <span class="badge bg-light text-dark mb-2">Door-to-Door</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="capability-card h-100 text-center p-4 rounded-4 shadow-sm border-hover">
                    <div class="icon-wrapper bg-info bg-opacity-10 text-info rounded-circle mx-auto mb-4" style="width: 80px; height: 80px;">
                        <i class="bi bi-thermometer-snow fs-2"></i>
                    </div>
                    <h5 class="mb-3">Temperature Control</h5>
                    <p class="text-muted mb-4">Specialized cold chain logistics for pharmaceuticals, perishables, and temperature-sensitive commodities.</p>
                    <div class="capability-features">
                        <span class="badge bg-light text-dark me-2 mb-2">Pharma</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Perishables</span>
                        <span class="badge bg-light text-dark mb-2">Biologics</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="capability-card h-100 text-center p-4 rounded-4 shadow-sm border-hover">
                    <div class="icon-wrapper bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4" style="width: 80px; height: 80px;">
                        <i class="bi bi-airplane fs-2"></i>
                    </div>
                    <h5 class="mb-3">Charter Operations</h5>
                    <p class="text-muted mb-4">Dedicated aircraft solutions for urgent, oversized, and project cargo with complete mission control.</p>
                    <div class="capability-features">
                        <span class="badge bg-light text-dark me-2 mb-2">Full Charter</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Oversized</span>
                        <span class="badge bg-light text-dark mb-2">Project Cargo</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="capability-card h-100 text-center p-4 rounded-4 shadow-sm border-hover">
                    <div class="icon-wrapper bg-warning bg-opacity-10 text-warning rounded-circle mx-auto mb-4" style="width: 80px; height: 80px;">
                        <i class="bi bi-globe fs-2"></i>
                    </div>
                    <h5 class="mb-3">Global Network</h5>
                    <p class="text-muted mb-4">Worldwide connectivity through strategic partnerships and localized expertise across major markets.</p>
                    <div class="capability-features">
                        <span class="badge bg-light text-dark me-2 mb-2">150+ Countries</span>
                        <span class="badge bg-light text-dark me-2 mb-2">Local Agents</span>
                        <span class="badge bg-light text-dark mb-2">Multi-modal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-6 bg-dark text-white position-relative">
    <div class="container position-relative z-2">
        <div class="text-center mb-5">
            <div class="section-tag text-white opacity-75">Our Impact</div>
            <h2 class="display-5 fw-bold mb-4">Numbers That Define Excellence</h2>
        </div>
        
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6">
                <div class="stat-card p-4">
                    <div class="stat-number display-4 fw-bold mb-2" data-count="150">0</div>
                    <p class="text-uppercase opacity-75 mb-0">Countries Served</p>
                    <div class="stat-bar mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card p-4">
                    <div class="stat-number display-4 fw-bold mb-2" data-count="500">0</div>
                    <p class="text-uppercase opacity-75 mb-0">Global Partners</p>
                    <div class="stat-bar mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card p-4">
                    <div class="stat-number display-4 fw-bold mb-2" data-count="99.7">0</div>
                    <p class="text-uppercase opacity-75 mb-0">On-Time Delivery %</p>
                    <div class="stat-bar mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-warning" style="width: 99.7%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card p-4">
                    <div class="stat-number display-4 fw-bold mb-2" data-count="24">0</div>
                    <p class="text-uppercase opacity-75 mb-0">/7 Support</p>
                    <div class="stat-bar mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-info" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="stat-overlay"></div>
</section>

<!-- Leadership & Innovation -->
<section class="py-6 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="section-tag">Our Advantage</div>
                <h2 class="display-5 fw-bold mb-4">Technology-Driven Logistics Excellence</h2>
                <p class="lead mb-4">We combine decades of aviation expertise with cutting-edge technology to deliver intelligent logistics solutions.</p>
                
                <div class="innovation-features">
                    <div class="feature-item d-flex mb-4">
                        <div class="feature-icon me-4">
                            <i class="bi bi-cloud-arrow-up fs-2 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Digital Ecosystem</h5>
                            <p class="text-muted mb-0">Cloud-based platform providing real-time visibility, predictive analytics, and seamless booking experiences.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item d-flex mb-4">
                        <div class="feature-icon me-4">
                            <i class="bi bi-shield-check fs-2 text-success"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Security & Compliance</h5>
                            <p class="text-muted mb-0">Advanced security protocols and regulatory compliance frameworks ensuring cargo safety and integrity.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item d-flex">
                        <div class="feature-icon me-4">
                            <i class="bi bi-graph-up-arrow fs-2 text-warning"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Sustainability Focus</h5>
                            <p class="text-muted mb-0">Carbon-neutral initiatives and sustainable practices integrated across our global operations.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="innovation-showcase position-relative">
                    <img src="{{ asset('assets/images/air-cargo4.avif') }}" class="img-fluid rounded-4 shadow-lg" alt="Technology Integration">
                    <div class="innovation-badge bg-primary text-white rounded-pill px-4 py-2 position-absolute top-0 start-0 m-4">
                        <i class="bi bi-cpu me-2"></i>Smart Logistics
                    </div>
                    <div class="innovation-badge bg-dark text-white rounded-pill px-4 py-2 position-absolute bottom-0 end-0 m-4">
                        <i class="bi bi-shield-check me-2"></i>Secure Operations
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-6 bg-gradient-primary text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-4">Ready to Elevate Your Logistics Strategy?</h2>
                <p class="lead mb-5 opacity-90">Join hundreds of global enterprises that trust Aircargoswift for their most critical supply chain operations.</p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="{{ url('contact') }}" class="btn btn-light btn-lg px-5">
                        <i class="bi bi-calendar-check me-2"></i>Schedule Consultation
                    </a>
                    <a href="tel:+60387778888" class="btn btn-outline-light btn-lg px-5">
                        <i class="bi bi-telephone me-2"></i>+603 8777 8888
                    </a>
                </div>
                <p class="mt-4 opacity-75">
                    <i class="bi bi-info-circle me-2"></i>
                    Our logistics experts are available 24/7 to discuss your specific requirements.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
/* About Hero */
.about-hero {
    background: linear-gradient(135deg, #1a237e 0%, #283593 50%, #3949ab 100%);
    min-height: 70vh;
    display: flex;
    align-items: center;
}

.hero-overlay {
    position: absolute;
    top: 0;
    right: 0;
    width: 60%;
    height: 100%;
    overflow: hidden;
}

.hero-overlay img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
}

.overlay-gradient {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(26,35,126,1) 0%, rgba(26,35,126,0.8) 30%, rgba(26,35,126,0) 100%);
}

/* Section Tag */
.section-tag {
    display: inline-block;
    background: rgba(26,35,126,0.1);
    color: #1a237e;
    padding: 6px 20px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
}

/* Experience Badge */
.experience-badge {
    position: absolute;
    bottom: -20px;
    right: 20px;
    background: white;
    border-radius: 15px;
    padding: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border: 3px solid #1a237e;
}

.experience-badge .badge-content {
    text-align: center;
}

.experience-badge .years {
    display: block;
    font-size: 2rem;
    font-weight: 700;
    color: #1a237e;
    line-height: 1;
}

.experience-badge .text {
    display: block;
    font-size: 0.8rem;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Pillar Cards */
.pillar-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.pillar-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.pillar-header {
    border-bottom: 3px solid rgba(255,255,255,0.2);
}

/* Capability Cards */
.capability-card {
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
}

.capability-card:hover {
    border-color: #1a237e;
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
}

.icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Statistics Section */
.stat-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%231a237e' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    opacity: 0.3;
}

.stat-card {
    position: relative;
    z-index: 2;
}

.stat-number {
    color: #ffffff;
    opacity: 0;
    animation: fadeIn 1s forwards;
}

/* Innovation Badges */
.innovation-badge {
    backdrop-filter: blur(10px);
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
}

/* Animations */
@keyframes fadeIn {
    to { opacity: 1; }
}

/* Responsive Design */
@media (max-width: 768px) {
    .about-hero {
        min-height: 50vh;
    }
    
    .hero-overlay {
        width: 100%;
        opacity: 0.2;
    }
    
    .display-3 {
        font-size: 2.5rem;
    }
    
    .experience-badge {
        position: relative;
        bottom: auto;
        right: auto;
        margin-top: -30px;
        width: 120px;
        margin-left: auto;
        margin-right: auto;
    }
}
</style>

<script>
// Animated counter for statistics
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200;
    
    counters.forEach(counter => {
        const animate = () => {
            const value = +counter.getAttribute('data-count');
            const data = +counter.innerText;
            const time = value / speed;
            
            if(data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 1);
            } else {
                counter.innerText = value + (counter.getAttribute('data-count') == '99.7' ? '%' : '');
            }
        }
        
        const observer = new IntersectionObserver((entries) => {
            if(entries[0].isIntersecting) {
                animate();
            }
        });
        
        observer.observe(counter);
    });
});
</script>
@include('home.footer')
