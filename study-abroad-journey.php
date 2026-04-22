<?php
  include 'include/header.php';

?>

    <!-- Journey Timeline -->
    <section class="journey-container">
      <div class="container">
        <div class="section-title country-wrap">
          <h2 class="heading">The Complete Study Abroad Journey</h2>
          <p>
            Follow this step-by-step timeline to successfully plan and execute
            your study abroad experience
          </p>
        </div>

        <div class="timeline">
          <!-- Step 1 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="window.toggleDetails && window.toggleDetails(1)">
              <h3><span class="step-number">1</span> Research & Planning</h3>
              <p>
                Explore countries, universities, and programs that match your
                academic and career goals.
              </p>
              <div class="details" id="details-1">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Identify your academic
                    interests and career objectives
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Research countries
                    based on education quality, cost, and lifestyle
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Shortlist universities
                    and programs that fit your profile
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Consider scholarship
                    opportunities and financial requirements
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Attend education fairs
                    and virtual information sessions
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-search"></i>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="window.toggleDetails && window.toggleDetails(2)">
              <h3><span class="step-number">2</span> Exam Preparation</h3>
              <p>
                Prepare for and take required standardized tests like IELTS,
                TOEFL, GRE, GMAT, SAT, etc.
              </p>
              <div class="details" id="details-2">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Determine which exams
                    are required for your target programs
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Create a study
                    schedule and gather preparation materials
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Take practice tests to
                    identify strengths and weaknesses
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Register for exams
                    well in advance of application deadlines
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Consider retaking
                    exams if needed to improve scores
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-book-open"></i>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="window.toggleDetails && window.toggleDetails(3)">
              <h3><span class="step-number">3</span> Application Process</h3>
              <p>
                Prepare and submit your applications, including transcripts,
                essays, and recommendations.
              </p>
              <div class="details" id="details-3">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Gather academic
                    transcripts and get them translated if needed
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Write compelling
                    personal statements and essays
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Request recommendation
                    letters from professors or employers
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Prepare your resume/CV
                    highlighting achievements
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Submit applications
                    before deadlines, paying attention to requirements
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-file-alt"></i>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="window.toggleDetails && window.toggleDetails(4)">
              <h3><span class="step-number">4</span> Visa Process</h3>
              <p>
                Apply for your student visa after receiving university
                acceptance.
              </p>
              <div class="details" id="details-4">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Gather required
                    documents (passport, acceptance letter, financial proof)
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Complete visa
                    application forms accurately
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Schedule and attend
                    visa interview if required
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Pay visa application
                    fees
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Prepare for potential
                    questions about your study plans
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-passport"></i>
            </div>
          </div>

          <!-- Step 5 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="toggleDetails(5)">
              <h3>
                <span class="step-number">5</span> Pre-Departure Preparation
              </h3>
              <p>
                Make arrangements for travel, accommodation, finances, and
                health before leaving.
              </p>
              <div class="details" id="details-5">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Book flights and
                    arrange airport pickup if available
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Secure accommodation
                    (university housing or private)
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Arrange international
                    health insurance
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Set up finances (bank
                    accounts, currency exchange, credit cards)
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Pack appropriately for
                    climate and academic needs
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-plane-departure"></i>
            </div>
          </div>

          <!-- Step 6 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="toggleDetails(6)">
              <h3><span class="step-number">6</span> Arrival & Settlement</h3>
              <p>
                Arrive in your host country and complete initial settlement
                tasks.
              </p>
              <div class="details" id="details-6">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Attend orientation
                    programs for international students
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Complete university
                    registration and get student ID
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Open a local bank
                    account if needed
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Register with local
                    authorities if required
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Get familiar with
                    campus and local area
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-home"></i>
            </div>
          </div>

          <!-- Step 7 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="toggleDetails(7)">
              <h3><span class="step-number">7</span> Academic Success</h3>
              <p>
                Excel in your studies while balancing life as an international
                student.
              </p>
              <div class="details" id="details-7">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Understand academic
                    expectations and grading system
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Utilize academic
                    support services (writing center, tutoring)
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Build relationships
                    with professors and academic advisors
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Manage time
                    effectively between studies and personal life
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Explore research and
                    internship opportunities
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-graduation-cap"></i>
            </div>
          </div>

          <!-- Step 8 -->
          <div class="timeline-item">
            <div class="timeline-content" onclick="toggleDetails(8)">
              <h3>
                <span class="step-number">8</span> Post-Study Opportunities
              </h3>
              <p>
                Explore career options and post-study work opportunities after
                graduation.
              </p>
              <div class="details" id="details-8">
                <ul class="detail-list">
                  <li>
                    <i class="fas fa-check-circle"></i> Attend career fairs
                    and networking events
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Utilize university
                    career services for resume and interview help
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Research post-study
                    work visa options in your host country
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Consider further
                    education (master's, PhD) if aligned with goals
                  </li>
                  <li>
                    <i class="fas fa-check-circle"></i> Build professional
                    network in your field internationally
                  </li>
                </ul>
              </div>
            </div>
            <div class="timeline-icon">
              <i class="fas fa-briefcase"></i>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Resources Section -->
    <section class="resources-section">
      <div class="container">
        <div class="section-title">
          <h2 class="heading">Essential Resources</h2>
          <p>
            Tools and guides to support you at every stage of your journey
          </p>
        </div>

        <div class="resources-grid">
          <div class="resource-card">
            <h3><i class="fas fa-calculator"></i> Financial Planning</h3>
            <ul class="resource-links">
    <li>
        <a href="#" class="resource-link" data-tool="Scholarship Finder">
            <i class="fas fa-external-link-alt"></i> Scholarship Finder Tool
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Scholarship Finder Tool">
            <input type="hidden" name="url" value="https://www.scholars4dev.com">
            <input type="hidden" name="icon" value="fas fa-search">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Cost Calculator">
            <i class="fas fa-external-link-alt"></i> Cost of Living Calculator
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Cost of Living Calculator">
            <input type="hidden" name="url" value="https://www.numbeo.com/cost-of-living/">
            <input type="hidden" name="icon" value="fas fa-calculator">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Student Loan">
            <i class="fas fa-external-link-alt"></i> Student Loan Guide
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Student Loan Guide">
            <input type="hidden" name="url" value="https://www.internationalstudentloan.com/">
            <input type="hidden" name="icon" value="fas fa-money-bill">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Work Regulations">
            <i class="fas fa-external-link-alt"></i> Part-time Work Regulations
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Part-time Work Regulations">
            <input type="hidden" name="url" value="https://www.internationalstudents.org/work-regulations">
            <input type="hidden" name="icon" value="fas fa-briefcase">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
</ul>
          </div>

          <div class="resource-card">
            <h3><i class="fas fa-file-signature"></i> Application Tools</h3>
            <ul class="resource-links">
    <li>
        <a href="#" class="resource-link" data-tool="Statement Builder">
            <i class="fas fa-external-link-alt"></i> Personal Statement Builder
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Personal Statement Builder">
            <input type="hidden" name="url" value="https://www.studyingabroad.com/ps-builder">
            <input type="hidden" name="icon" value="fas fa-pen-fancy">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Document Checklist">
            <i class="fas fa-external-link-alt"></i> Document Checklist
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Document Checklist">
            <input type="hidden" name="url" value="https://www.documentchecklist.com/studyabroad">
            <input type="hidden" name="icon" value="fas fa-check-square">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="University Comparison">
            <i class="fas fa-external-link-alt"></i> University Comparison Tool
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="University Comparison Tool">
            <input type="hidden" name="url" value="https://www.topuniversities.com/university-rankings">
            <input type="hidden" name="icon" value="fas fa-chart-line">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Deadline Tracker">
            <i class="fas fa-external-link-alt"></i> Deadline Tracker
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Deadline Tracker">
            <input type="hidden" name="url" value="https://www.deadlinetracker.com/student">
            <input type="hidden" name="icon" value="fas fa-clock">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
</ul>
          </div>

          <div class="resource-card">
            <h3><i class="fas fa-users"></i> Community Support</h3>
            <ul class="resource-links">
    <li>
        <a href="#" class="resource-link" data-tool="Student Forums">
            <i class="fas fa-external-link-alt"></i> Country-Specific Student Forums
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Country-Specific Student Forums">
            <input type="hidden" name="url" value="https://www.studentforums.net">
            <input type="hidden" name="icon" value="fas fa-comments">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Connect Students">
            <i class="fas fa-external-link-alt"></i> Connect with Current Students
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Connect with Current Students">
            <input type="hidden" name="url" value="https://www.connectwithstudents.com">
            <input type="hidden" name="icon" value="fas fa-user-friends">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Alumni Program">
            <i class="fas fa-external-link-alt"></i> Alumni Mentorship Program
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Alumni Mentorship Program">
            <input type="hidden" name="url" value="https://www.alumnimentorship.org">
            <input type="hidden" name="icon" value="fas fa-user-graduate">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
    <li>
        <a href="#" class="resource-link" data-tool="Workshops">
            <i class="fas fa-external-link-alt"></i> Cultural Adaptation Workshops
        </a>
        <form action="save-bookmark.php" method="POST" style="display: inline;">
            <input type="hidden" name="title" value="Cultural Adaptation Workshops">
            <input type="hidden" name="url" value="https://www.culturaladaptation.com/students">
            <input type="hidden" name="icon" value="fas fa-globe">
            <button type="submit" class="bookmark-form-btn"><i class="far fa-bookmark"></i> Save</button>
        </form>
    </li>
</ul>
          </div>
        </div>
      </div>

      <div id="resource_content_modal" class="resource_modal_container">
        <div class="resource_modal_wrapper">
          <div class="resource_modal_header">
            <h3 id="resource_modal_title" class="resource_modal_title">
              Resource Details
            </h3>
            <span class="resource_modal_close">&times;</span>
          </div>
          <div class="resource_modal_body">
            <div id="resource_modal_content"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="container">
      <div class="cta-section">
        <h2>Start Your Journey Today</h2>
        <p>
          Join thousands of successful international students who have
          navigated their study abroad journey with our guidance and
          resources.
        </p>
        <div class="cta-buttons">
          <?php if (isset($_SESSION['user_id'])): ?>
          <a href="#" class="btn btn-secondary"><i class="fas fa-calendar-alt"></i> Book a Consultation</a>
          <?php else: ?>
          <a href="login.php" class="btn-1 btn-secondary-1"><i class="fas fa-calendar-alt"></i> Login</a>
          <a href="register.php" class="btn-1 btn-secondary-1"><i class="fas fa-calendar-alt"></i> Registration</a>
          <?php endif; ?>
        </div>
      </div>

      <div id="consultModal" class="consult_modal_container">
        <div class="consult_modal_wrapper">
          <div class="consult_modal_header">
            <h3 class="consult_modal_title">📅 Book a Free Consultation</h3>
            <span class="consult_modal_close">&times;</span>
          </div>
          <div class="consult_modal_body">
            <form id="consultForm" method="POST" action="save_consultation.php">
              <div class="consult_form_group">
                <label class="consult_label">Your Full Name *</label>
                <input type="text" name="name" id="consult_name" class="consult_input" placeholder="e.g., Rahim Uddin"
                  required />
              </div>
              <div class="consult_form_group">
                <label class="consult_label">Email Address *</label>
                <input type="email" name="email" id="consult_email" class="consult_input"
                  placeholder="rahim@example.com" required />
              </div>
              <div class="consult_form_group">
                <label class="consult_label">Phone Number *</label>
                <input type="tel" name="phone" id="consult_phone" class="consult_input" placeholder="+880 1XXX XXXXXX"
                  required />
              </div>
              <div class="consult_form_group">
                <label class="consult_label">Preferred Country *</label>
                <select name="country" id="consult_country" class="consult_input" required>
                  <option value="">Select Country</option>
                  <option value="USA">USA</option>
                  <option value="UK">UK</option>
                  <option value="Canada">Canada</option>
                  <option value="Australia">Australia</option>
                  <option value="Germany">Germany</option>
                </select>
              </div>
              <div class="consult_form_group">
                <label class="consult_label">Preferred Date *</label>
                <input type="date" name="date" id="consult_date" class="consult_input" required />
              </div>
              <div class="consult_form_group">
                <label class="consult_label">Preferred Time *</label>
                <select name="time" id="consult_time" class="consult_input" required>
                  <option value="">Select Time</option>
                  <option value="10:00 AM">10:00 AM</option>
                  <option value="11:00 AM">11:00 AM</option>
                  <option value="12:00 PM">12:00 PM</option>
                  <option value="02:00 PM">02:00 PM</option>
                  <option value="03:00 PM">03:00 PM</option>
                  <option value="04:00 PM">04:00 PM</option>
                  <option value="05:00 PM">05:00 PM</option>
                </select>
              </div>
              <div class="consult_form_group">
                <label class="consult_label">Your Message (Optional)</label>
                <textarea name="message" id="consult_message" class="consult_textarea" rows="3"
                  placeholder="Any specific questions or requirements..."></textarea>
              </div>
              <div class="consult_form_group">
                <button type="submit" class="consult_submit_btn">
                  📅 Request Consultation
                </button>
              </div>
              <div id="consult_status" class="consult_status"></div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php
  include 'include/footer.php';
?>