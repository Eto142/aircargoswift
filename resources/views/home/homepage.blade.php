@include('home.header')
  <!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/air-cargo.jpg') }}" alt="Aircargoswift Aircraft">
            <div class="carousel-caption">
                <h1>Your Cargo, Our Commitment - Global Reach, Local Expertise</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/air-cargo3.avif') }}" alt="Cargo Operations">
            <div class="carousel-caption">
                <h1>Precision Logistics Across Every Continent</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/air-cargo4.avif') }}" alt="Logistics Network">
            <div class="carousel-caption">
                <h1>Innovative Solutions for Complex Supply Chains</h1>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Tab Section -->
<div class="container tab-section">
    <div class="tab-buttons">
        <button class="tab-btn" onclick="window.location='{{ url('contact') }}'">
            <i class="bi bi-box-seam"></i>
            <span>Initiate Shipment</span>
        </button>
        <button class="tab-btn" onclick="showTab('tracking')">
            <i class="bi bi-geo-alt"></i>
            <span>Monitor Cargo Status</span>
        </button>
    </div>
    
    <div class="tab-content-wrapper">
        <!-- Book Cargo Tab -->
        <div id="book-cargo" class="tab-pane" style="display: none;">
            <div class="row g-3 align-items-end">
                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('shipment.store') }}">
                    @csrf
                    {{-- Shipment Details --}}
                    <div class="card mb-4 shadow-sm border-secondary">
                        <div class="card-header bg-light text-dark">Shipment Specifications</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Origin Point</label>
                                    <input type="text" name="origin" class="form-control" value="{{ old('origin') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Final Destination</label>
                                    <input type="text" name="destination" class="form-control" value="{{ old('destination') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Preferred Shipment Date</label>
                                    <input type="date" name="shipment_date" class="form-control" value="{{ old('shipment_date') }}" required>
                                </div>
                            </div>

                            <div class="row g-3 mt-3">
                                <div class="col-md-3">
                                    <label class="form-label">Cargo Classification</label>
                                    <select name="shipment_type" class="form-select" required>
                                        <option value="">Select Category</option>
                                        <option value="Document" {{ old('shipment_type')=='Document' ? 'selected' : '' }}>Priority Documents</option>
                                        <option value="Non-Document" {{ old('shipment_type')=='Non-Document' ? 'selected' : '' }}>Commercial Goods</option>
                                        <option value="Commercial" {{ old('shipment_type')=='Commercial' ? 'selected' : '' }}>Large Scale Commercial</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Carriage Value Declaration</label>
                                    <input type="number" name="declared_carriage" class="form-control" value="{{ old('declared_carriage') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Customs Value Declaration</label>
                                    <input type="number" name="declared_customs" class="form-control" value="{{ old('declared_customs') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Transaction Currency</label>
                                    <select name="currency" class="form-select" required>
                                        <option value="USD" {{ old('currency')=='USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                        <option value="HKD" {{ old('currency')=='HKD' ? 'selected' : '' }}>HKD - Hong Kong Dollar</option>
                                        <option value="JPY" {{ old('currency')=='JPY' ? 'selected' : '' }}>JPY - Japanese Yen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Shipper Information --}}
                    <div class="card mb-4 shadow-sm border-secondary">
                        <div class="card-header bg-light text-dark">Shipper Details</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input name="shipper_company" class="form-control" placeholder="Corporate Name" value="{{ old('shipper_company') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <input name="shipper_department" class="form-control" placeholder="Business Unit/Department" value="{{ old('shipper_department') }}">
                                </div>
                                <div class="col-md-4">
                                    <input name="shipper_contact" class="form-control" placeholder="Primary Contact Person" value="{{ old('shipper_contact') }}" required>
                                </div>
                            </div>

                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <input name="shipper_address" class="form-control" placeholder="Full Business Address" value="{{ old('shipper_address') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input name="shipper_city" class="form-control" placeholder="City" value="{{ old('shipper_city') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input name="shipper_country" class="form-control" placeholder="Country" value="{{ old('shipper_country') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input name="shipper_phone" class="form-control" placeholder="Direct Contact Number" value="{{ old('shipper_phone') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Receiver Information --}}
                    <div class="card mb-4 shadow-sm border-secondary">
                        <div class="card-header bg-light text-dark">Consignee Details</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input name="receiver_company" class="form-control" placeholder="Recipient Organization" value="{{ old('receiver_company') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <input name="receiver_contact" class="form-control" placeholder="Receiving Contact Person" value="{{ old('receiver_contact') }}" required>
                                </div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-md-4">
                                    <input name="receiver_address" class="form-control" placeholder="Delivery Address" value="{{ old('receiver_address') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input name="receiver_city" class="form-control" placeholder="City" value="{{ old('receiver_city') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input name="receiver_country" class="form-control" placeholder="Country" value="{{ old('receiver_country') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Cargo Details --}}
                    <div class="card mb-4 shadow-sm border-secondary">
                        <div class="card-header bg-light text-dark">Cargo Particulars</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <input name="pieces" type="number" class="form-control" placeholder="Total Pieces" value="{{ old('pieces') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input name="gross_weight" type="number" class="form-control" placeholder="Gross Weight (kg)" value="{{ old('gross_weight') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input name="chargeable_weight" type="number" class="form-control" placeholder="Chargeable Weight (kg)" value="{{ old('chargeable_weight') }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input name="goods_description" class="form-control" placeholder="Commodity Description" value="{{ old('goods_description') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Payment & Insurance --}}
                    <div class="card mb-4 shadow-sm border-secondary">
                        <div class="card-header bg-light text-dark">Financial Arrangements</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Transport Charges</label>
                                    <select name="transport_charges" class="form-select" required>
                                        <option value="Prepaid" {{ old('transport_charges')=='Prepaid' ? 'selected' : '' }}>Advance Payment</option>
                                        <option value="Collect" {{ old('transport_charges')=='Collect' ? 'selected' : '' }}>Collect Upon Delivery</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Duty & Tax Responsibility</label>
                                    <select name="duties_taxes" class="form-select" required>
                                        <option value="Shipper" {{ old('duties_taxes')=='Shipper' ? 'selected' : '' }}>Shipper Account</option>
                                        <option value="Consignee" {{ old('duties_taxes')=='Consignee' ? 'selected' : '' }}>Consignee Account</option>
                                        <option value="Importer" {{ old('duties_taxes')=='Importer' ? 'selected' : '' }}>Importer of Record</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Insurance Coverage Amount</label>
                                    <input name="insurance_amount" type="number" class="form-control" placeholder="Insurance Value" value="{{ old('insurance_amount') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-dark w-100">CONFIRM SHIPMENT REQUEST</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Tracking Tab -->
        <div class="tab-content-wrapper">
            <div id="tracking" class="tab-pane" style="display: none;">
                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <div class="row g-3">
                    <div class="col-md-12">
                        <h3>Global Cargo Monitoring System</h3>
                        <p>Monitor your shipment's journey in real-time across our global network</p>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('shipment.track') }}">
                    @csrf
                    <div class="col-12">
                        <label for="tracking_number" class="form-label">Enter Tracking Reference</label>
                        <div class="input-group">
                            <input 
                                type="text" 
                                name="awb_number"
                                id="tracking_number" 
                                class="form-control form-control-lg"
                                placeholder="Input your AWB or tracking identifier"
                            >
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-dark w-100">Initiate Tracking</button>
                            </div>
                        </div>
                        <div class="form-text mt-2">
                            <small>For multiple shipments, utilize our <a href="#">bulk tracking portal</a> or upload a spreadsheet</small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Flight Schedule Tab -->
        <div class="tab-content-wrapper">
            <div id="flight-schedule" class="tab-pane" style="display: block;">
                <form method="POST" action="{{ route('shipment.track') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">   
                            <h3> Global Cargo Monitoring System</h3>
                            <p>Monitor your shipment's journey in real-time across our global network</p>
                        </div>
                    </div>
                    <div class="row g-3 align-items-end">
                        <div class="col-12">
                            <label for="tracking_number" class="form-label">Enter Reference for Schedule Check</label>
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    id="tracking_number" 
                                    class="form-control form-control-lg"
                                    name="awb_number"
                                    placeholder="Tracking number for schedule correlation"
                                >
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-dark w-100">Retrieve Schedule</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Highlights Section -->
<section class="highlights-section">
    <div class="container">
        <h2>Industry Innovations & Achievements</h2>
        <div id="highlightsCarousel" class="carousel slide highlight-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="highlight-card">
                                <img src="{{ asset('assets/images/plane.avif') }}" alt="Strategic Route Expansion">
                                <div class="highlight-card-body">
                                    <h3>Premium Rates for ASEAN Corridor: SIN-KUL from SGD 0.35/kg</h3>
                                    <p>Leverage our competitive pricing for rapid transit between Singapore and Kuala Lumpur. Exclusive rates available through our digital booking ecosystem.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="highlight-card">
                                <img src="{{ asset('assets/images/travel.webp') }}" alt="Diplomatic Cargo Excellence">
                                <div class="highlight-card-body">
                                    <h3>Diplomatic Excellence: Transporting Cherished Giant Pandas to Malaysia</h3>
                                    <p>Aircargoswift proudly facilitated the historic transfer of Chen Xing and Xiao Yue, demonstrating unparalleled expertise in sensitive and high-profile logistics operations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#highlightsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#highlightsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="services-header">
            <h4>SPECIALIZED LOGISTICS CAPABILITIES</h4>
            <h2>Comprehensive Solutions for Your<br>Supply Chain Requirements</h2>
            <p>As a premier global logistics provider, Aircargoswift enables seamless international trade through innovative air transport solutions, ensuring operational excellence at every touchpoint.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-card">
                    <img src="{{ asset('assets/images/global-mail.avif') }}" alt="International Postal Solutions">
                    <div class="service-card-overlay">
                        <i class="bi bi-airplane"></i>
                        <h3>INTERNATIONAL POSTAL NETWORK</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img src="{{ asset('assets/images/Charter-Services.avif') }}" alt="Dedicated Aircraft Charter">
                    <div class="service-card-overlay">
                        <i class="bi bi-truck"></i>
                        <h3>DEDICATED CHARTER OPERATIONS</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img src="{{ asset('assets/images/img1.jpg') }}" alt="Temperature-Managed Logistics">
                    <div class="service-card-overlay">
                        <i class="bi bi-thermometer-snow"></i>
                        <h3>THERMAL ASSURANCE SOLUTIONS</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img src="{{ asset('assets/images/img2.jpg') }}" alt="Certified Halal Logistics">
                    <div class="service-card-overlay">
                        <i class="bi bi-award"></i>
                        <h3>CERTIFIED HALAL COMPLIANCE</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img src="{{ asset('assets/images/airport.avif') }}" alt="Integrated Logistics Services">
                    <div class="service-card-overlay">
                        <i class="bi bi-boxes"></i>
                        <h3>INTEGRATED LOGISTICS SUITE</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <img src="{{ asset('assets/images/services.avif') }}" alt="Complete Service Portfolio">
                    <div class="service-card-overlay">
                        <i class="bi bi-grid"></i>
                        <h3>COMPREHENSIVE SERVICE PORTFOLIO</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="contact-box">
                    <h3>WORLDWIDE OPERATIONAL PRESENCE</h3>
                    <h2>Global Network Access</h2>
                    <p>Our international teams provide dedicated support across all time zones. Connect with your regional Aircargoswift office for personalized assistance.</p>
                    <select class="form-select">
                        <option value="">- Select Regional Office -</option>
                        <option value="MY">Malaysia (Headquarters)</option>
                        <option value="SG">Singapore (ASEAN Hub)</option>
                        <option value="TH">Thailand (Bangkok Operations)</option>
                        <option value="ID">Indonesia (Jakarta Center)</option>
                        <option value="PH">Philippines (Manila Office)</option>
                        <option value="VN">Vietnam (Ho Chi Minh City)</option>
                        <option value="CN">China (Greater China Region)</option>
                        <option value="JP">Japan (Tokyo Operations)</option>
                        <option value="KR">South Korea (Seoul Office)</option>
                        <option value="AU">Australia (Sydney Hub)</option>
                        <option value="NZ">New Zealand (Auckland)</option>
                        <option value="AE">UAE (Dubai Regional Hub)</option>
                        <option value="GB">United Kingdom (London Office)</option>
                        <option value="US">United States (Americas Headquarters)</option>
                    </select>
                    <div class="contact-info mt-4">
                        <p><strong>Global Operations Center:</strong> 24/7 multi-lingual support</p>
                        <p><strong>Emergency Contact:</strong> +603-8777-8888 (24-hour hotline)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.099819573773!2d101.71016731475394!3d2.7455892978473567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb3a7a2a4a0b1%3A0x3a0a0a0a0a0a0a0a!2sKuala%20Lumpur%20International%20Airport!5e0!3m2!1sen!2smy!4v1638888888888!5m2!1sen!2smy" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Announcements Section -->
<section class="announcements-section">
    <div class="container">
        <div class="announcements-header">
            <i class="bi bi-megaphone"></i>
            <h2><span class="highlight">CORPORATE</span> UPDATES</h2>
        </div>
        
        <div id="announcementsCarousel" class="carousel slide announcement-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="announcement-card">
                                <h3>Aircargoswift Hosts Distinguished Henan Province Delegation During Official Visit</h3>
                                <p class="date">Tuesday, 22 April 2025</p>
                                <div class="announcement-tag">Diplomatic Relations</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="announcement-card">
                                <h3>Strategic Alliance: Aircargoswift & Qatar Airways Cargo Announce Global Joint Venture</h3>
                                <p class="date">Tuesday, 22 April 2025</p>
                                <div class="announcement-tag">Partnership</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="promo-card">
                                <h3>EXCLUSIVE CHARTER SOLUTIONS FOR URGENT SHIPMENTS</h3>
                                <p>Complete aircraft availability for time-critical operations</p>
                                <button class="btn">EXPLORE CHARTER OPTIONS</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="promo-card">
                                <h3>EXPANDED FREQUENCY TO KEY ASIAN MARKETS</h3>
                                <p>Weekly dedicated services to Hanoi, Yangon & Manila</p>
                                <button class="btn">VIEW SCHEDULE</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="social-card">
                                <h3>CONNECT WITH OUR PROFESSIONAL NETWORK</h3>
                                <p>Follow Aircargoswift for industry insights and updates</p>
                                <div class="social-icons">
                                    <a href="#"><i class="bi bi-linkedin"></i> LinkedIn</a>
                                    <a href="#"><i class="bi bi-twitter"></i> Twitter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="announcement-card">
                                <h3>Operational Excellence Updates from Our Global Network</h3>
                                <p class="date">Continuous Updates</p>
                                <div class="announcement-tag">Operations</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#announcementsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#announcementsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        
        <div class="booking-banner">
            <p>Secure cargo capacity on our extensive network of <strong>passenger</strong> and <strong>dedicated freighter</strong> services today!</p>
            <a href="{{ url('contact') }}" class="btn btn-light ms-3">IMMEDIATE BOOKING INQUIRY</a>
        </div>
    </div>
</section>

<style>
/* Enhanced styling while maintaining original structure */
.hero-carousel .carousel-caption h1 {
    font-size: 3.2rem;
    font-weight: 700;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.8);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.tab-buttons .tab-btn {
    background: linear-gradient(135deg, #1a237e, #283593);
    color: white;
    border: none;
    padding: 1.2rem 2rem;
    border-radius: 8px 8px 0 0;
    transition: all 0.3s ease;
    font-weight: 600;
}

.tab-buttons .tab-btn:hover {
    background: linear-gradient(135deg, #283593, #3949ab);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.highlights-section h2 {
    font-size: 2.5rem;
    color: #1a237e;
    margin-bottom: 2rem;
    position: relative;
}

.highlights-section h2:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100px;
    height: 3px;
    background: #ff6b00;
}

.highlight-card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.highlight-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.highlight-card-body h3 {
    color: #1a237e;
    font-size: 1.4rem;
    line-height: 1.4;
    margin-bottom: 1rem;
}

.services-header h2 {
    font-size: 2.8rem;
    color: #1a237e;
    line-height: 1.2;
    margin: 1rem 0;
}

.services-header h4 {
    color: #ff6b00;
    letter-spacing: 2px;
    font-weight: 600;
}

.service-card {
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    transition: transform 0.3s ease;
}

.service-card:hover {
    transform: scale(1.03);
}

.service-card-overlay {
    background: linear-gradient(to top, rgba(26,35,126,0.9), rgba(26,35,126,0.7));
}

.contact-box h2 {
    color: #1a237e;
    font-size: 2.5rem;
    margin: 1rem 0;
}

.contact-box h3 {
    color: #ff6b00;
    font-size: 1.1rem;
    letter-spacing: 1.5px;
}

.announcements-header h2 {
    font-size: 2.5rem;
    color: #333;
}

.announcements-header .highlight {
    color: #ff6b00;
}

.announcement-card {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    height: 100%;
    border-left: 4px solid #1a237e;
}

.announcement-tag {
    display: inline-block;
    background: #e8eaf6;
    color: #1a237e;
    padding: 0.3rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-top: 1rem;
}

.promo-card {
    background: linear-gradient(135deg, #1a237e, #3949ab);
    color: white;
    padding: 2rem;
    border-radius: 10px;
    height: 100%;
}

.booking-banner {
    background: linear-gradient(135deg, #ff6b00, #ff8c00);
    color: white;
    padding: 2rem;
    border-radius: 10px;
    margin-top: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.booking-banner p {
    margin: 0;
    font-size: 1.2rem;
}

.form-control, .form-select {
    padding: 0.75rem 1rem;
    border: 1px solid #ddd;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #1a237e;
    box-shadow: 0 0 0 0.25rem rgba(26,35,126,0.25);
}

.btn-dark {
    background: #1a237e;
    border: none;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-dark:hover {
    background: #283593;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(135deg, #f5f7ff, #e8eaf6) !important;
    color: #1a237e !important;
    font-weight: 600;
    font-size: 1.1rem;
    padding: 1.2rem 1.5rem;
}

/* Responsive enhancements */
@media (max-width: 768px) {
    .hero-carousel .carousel-caption h1 {
        font-size: 2rem;
    }
    
    .tab-buttons {
        flex-direction: column;
    }
    
    .tab-buttons .tab-btn {
        width: 100%;
        margin-bottom: 0.5rem;
        border-radius: 8px;
    }
    
    .services-header h2 {
        font-size: 2rem;
    }
    
    .booking-banner {
        flex-direction: column;
        text-align: center;
    }
    
    .booking-banner .btn {
        margin-top: 1rem;
    }
}
</style>
    
  @include('home.footer')