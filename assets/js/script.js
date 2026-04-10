document.addEventListener("DOMContentLoaded", (event) => {


  const menuBars = document.querySelector("#open-close--menu");
  const navigation = document.querySelector(".header .navigation");
  const closeMenuBars = document.querySelector("#close-menu--bars");



    menuBars.addEventListener('click', (e) => {
        e.preventDefault();
        navigation.classList.toggle('open');
    });

    closeMenuBars.addEventListener("click", (e) => {
        e.preventDefault();
        navigation.classList.toggle('open');
    });

    


    // Study Abroad Journey Timeline
    
    document.addEventListener('click', function(event) {
        const timelineContent = event.target.closest('.timeline-content');
        if (timelineContent) {
            event.preventDefault();
            
            const stepNumber = timelineContent.getAttribute('data-step');
            if (stepNumber) {
                toggleDetails(parseInt(stepNumber));
            }
        }
    });
    
    // Toggle details function
    function toggleDetails(stepNumber) {
        if (!document.getElementById(`details-${stepNumber}`)) return;
        const detailsElement = document.getElementById(`details-${stepNumber}`);
        if (!detailsElement) {
            console.error(`Element details-${stepNumber} not found`);
            return;
        }
        
        const isActive = detailsElement.classList.contains('active');
        
        document.querySelectorAll('.details.active').forEach(detail => {
            if (detail.id !== `details-${stepNumber}`) {
                detail.classList.remove('active');
            }
        });
        
        if (!isActive) {
            detailsElement.classList.add('active');
        }
        
        const timelineItem = detailsElement.closest('.timeline-item');
        if (timelineItem) {
            timelineItem.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        }
    }
    
    window.toggleDetails = toggleDetails;
    
    setTimeout(() => {
        toggleDetails(1);
    }, 300);

    // Add hover effect to category cards
          const categoryCards = document.querySelectorAll(".category-card");
          categoryCards.forEach((card) => {
            card.addEventListener("mouseenter", () => {
              card.style.transform = "translateY(-8px)";
            });

            card.addEventListener("mouseleave", () => {
              card.style.transform = "translateY(0)";
            });
          });

          // Add click effect to resource cards
          const resourceCards = document.querySelectorAll(".resource-card");
          resourceCards.forEach((card) => {
            card.addEventListener("click", () => {
              card.style.transform = "translateX(5px)";
              setTimeout(() => {
                card.style.transform = "translateX(0)";
              }, 300);
            });
          });


           // Search functionality
          const searchInput = document.querySelector(".search-box-country input");
          const searchBtn = document.querySelector(".search-btn");
          const tags = document.querySelectorAll(".search-tags .tag");
          const countryCards = document.querySelectorAll(".country-card-guide");

          // Tag click functionality
          tags.forEach((tag) => {
            tag.addEventListener("click", function () {
              const searchText = this.textContent.split(": ")[1];
              searchInput.value = searchText;
              filterCountries(searchText);
            });
          });

          // Search button functionality
          if (searchBtn) {
    searchBtn.addEventListener("click", function () {
        filterCountries(searchInput.value);
    });
}

          // Enter key in search input
          if(searchInput){
          searchInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
              filterCountries(this.value);
            }
          });
          }

          // Filter countries function
          function filterCountries(searchTerm) {
            // const term = searchTerm.toLowerCase().trim();

            let term = searchTerm.toLowerCase().trim();
    
   
            if(term === 'usa') term = 'united states';
            if(term === 'uk') term = 'united kingdom';

            countryCards.forEach((card) => {
              const countryName = card
                .querySelector(".country-name")
                .textContent.toLowerCase();
              const countryDescription = card
                .querySelector("p")
                .textContent.toLowerCase();

              if (
                term === "" ||
                countryName.includes(term) ||
                countryDescription.includes(term)
              ) {
                card.style.display = "block";
                setTimeout(() => {
                  card.style.opacity = "1";
                  card.style.transform = "translateY(0)";
                }, 10);
              } else {
                card.style.opacity = "0";
                card.style.transform = "translateY(20px)";
                setTimeout(() => {
                  card.style.display = "none";
                }, 300);
              }
            });
          }

          // Country card hover effects
          countryCards.forEach((card) => {
            card.addEventListener("mouseenter", function () {
              this.style.transform = "translateY(-8px)";
            });

            card.addEventListener("mouseleave", function () {
              this.style.transform = "translateY(0)";
            });

            // Table row hover effect
            const tableRows = document.querySelectorAll("tbody tr");
            tableRows.forEach((row) => {
              row.addEventListener("mouseenter", function () {
                this.style.backgroundColor = "var(--background)";
              });

              row.addEventListener("mouseleave", function () {
                this.style.backgroundColor = "";
              });
            });

            // CTA buttons
            const ctaButtons = document.querySelectorAll(".btn");
            ctaButtons.forEach((btn) => {
              btn.addEventListener("mouseenter", function () {
                this.style.transform = "translateY(-3px)";
              });

              btn.addEventListener("mouseleave", function () {
                this.style.transform = "translateY(0)";
              });
            });
          });




          // Country Guide Data
const countryGuides = {
    "USA": {
        title: "United States Study Guide",
        image: "https://images.unsplash.com/photo-1501594907352-04cda38ebc29?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        description: "Complete guide for studying in the United States",
        sections: [
            {
                title: "📚 Education System",
                content: "The US has over 4,000 accredited institutions offering diverse programs. Degrees include Associate's (2 years), Bachelor's (4 years), Master's (1-2 years), and PhD (3-7 years)."
            },
            {
                title: "💰 Cost of Living",
                content: "Annual expenses range from $15,000 to $25,000 depending on location. Major cities like New York and San Francisco are more expensive."
            },
            {
                title: "🎓 Top Universities",
                content: "MIT, Harvard, Stanford, Caltech, University of Chicago, Columbia University, Princeton University"
            },
            {
                title: "📝 Visa Requirements",
                content: "F-1 Student Visa required. Need proof of financial support, acceptance letter, and SEVIS fee payment. OPT allows 1-3 years work after graduation."
            },
            {
                title: "💼 Work Opportunities",
                content: "On-campus work allowed (20 hrs/week during term, full-time during breaks). OPT for 1 year (STEM fields get 2-year extension)."
            }
        ],
        quickFacts: [
            "🎯 Popular Fields: STEM, Business, Computer Science",
            "🏛️ Education Quality: World's best universities",
            "🌎 Cultural Diversity: Very high",
            "💵 Average Salary: $60,000 - $120,000",
            "📈 Job Market: Strong for STEM graduates"
        ]
    },
    
    "Canada": {
        title: "Canada Study Guide",
        image: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        description: "Your pathway to studying in Canada",
        sections: [
            {
                title: "📚 Education System",
                content: "Canadian education is known for high quality and research opportunities. Degrees include Bachelor's (3-4 years), Master's (1-2 years), and PhD programs."
            },
            {
                title: "💰 Cost of Living",
                content: "Annual living costs: $12,000 - $15,000. Tuition fees: $15,000 - $35,000 per year for international students."
            },
            {
                title: "🎓 Top Universities",
                content: "University of Toronto, University of British Columbia, McGill University, McMaster University, University of Alberta"
            },
            {
                title: "📝 Visa Requirements",
                content: "Study Permit required. Need acceptance letter, proof of funds ($10,000+), medical exam, and police certificate."
            },
            {
                title: "💼 Work & Immigration",
                content: "PGWP (Post-Graduation Work Permit) for up to 3 years. Express Entry system for Permanent Residency. 20 hrs/week work during studies."
            }
        ],
        quickFacts: [
            "🎯 Popular Fields: Engineering, IT, Healthcare",
            "🇨🇦 Immigration: Most student-friendly",
            "🏥 Healthcare: Public system available",
            "💵 Average Salary: CAD 50,000 - 90,000",
            "❄️ Climate: Cold winters, beautiful summers"
        ]
    },
    
    "UK": {
        title: "United Kingdom Study Guide",
        image: "https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        description: "Study in historic British institutions",
        sections: [
            {
                title: "📚 Education System",
                content: "UK offers 3-year Bachelor's and 1-year Master's programs. Known for traditional teaching methods and world-class research."
            },
            {
                title: "💰 Cost of Living",
                content: "London: £15,000-£20,000/year. Outside London: £12,000-£15,000/year. Tuition: £15,000-£35,000/year."
            },
            {
                title: "🎓 Top Universities",
                content: "University of Oxford, University of Cambridge, Imperial College London, UCL, London School of Economics"
            },
            {
                title: "📝 Visa Requirements",
                content: "Tier 4 Student Visa. Need CAS from university, financial proof (£1,334/month in London), and English proficiency."
            },
            {
                title: "💼 Work Opportunities",
                content: "Graduate Route allows 2 years work after studies. 20 hrs/week work during term, full-time during holidays."
            }
        ],
        quickFacts: [
            "🎯 Popular Fields: Business, Law, Humanities",
            "⏱️ Degree Duration: Shorter programs",
            "🏛️ History: Ancient universities",
            "💷 Average Salary: £30,000 - £60,000",
            "🌍 Location: Gateway to Europe"
        ]
    },
    
    "Australia": {
        title: "Australia Study Guide",
        image: "https://images.unsplash.com/photo-1523482580672-f109ba8cb9be?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        description: "Study in the land down under",
        sections: [
            {
                title: "📚 Education System",
                content: "Australian degrees are globally recognized. Offers Bachelor's (3-4 years), Master's (1-2 years), and research opportunities."
            },
            {
                title: "💰 Cost of Living",
                content: "Annual living costs: AUD 21,041. Tuition: AUD 20,000-45,000/year. Major cities like Sydney and Melbourne are expensive."
            },
            {
                title: "🎓 Top Universities",
                content: "University of Melbourne, Australian National University, University of Sydney, University of Queensland, UNSW Sydney"
            },
            {
                title: "📝 Visa Requirements",
                content: "Student Visa (subclass 500). Need CoE, financial proof (AUD 21,041/year), health insurance (OSHC), and English proficiency."
            },
            {
                title: "💼 Work Opportunities",
                content: "Post-study work visa: 2-4 years. Work 40 hours/fortnight during studies, unlimited during holidays."
            }
        ],
        quickFacts: [
            "🎯 Popular Fields: Business, Engineering, Healthcare",
            "🌞 Climate: Warm and sunny",
            "🐨 Wildlife: Unique biodiversity",
            "💵 Average Salary: AUD 60,000 - 100,000",
            "🏖️ Lifestyle: Outdoor and relaxed"
        ]
    },
    
    "Germany": {
        title: "Germany Study Guide",
        image: "https://images.unsplash.com/photo-1467269204594-9661b134dd2b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        description: "Study in Europe's economic powerhouse",
        sections: [
            {
                title: "📚 Education System",
                content: "Most public universities have no tuition fees (only semester contribution €150-350). Strong focus on engineering and technology."
            },
            {
                title: "💰 Cost of Living",
                content: "Monthly living costs: €850-€1,200. Major expenses: rent, health insurance, food. Berlin and Munich are most expensive."
            },
            {
                title: "🎓 Top Universities",
                content: "Technical University of Munich, Ludwig Maximilian University, Heidelberg University, Humboldt University, Free University of Berlin"
            },
            {
                title: "📝 Visa Requirements",
                content: "Student Visa requires university admission, blocked account (€11,208/year), health insurance, and accommodation proof."
            },
            {
                title: "💼 Work Opportunities",
                content: "120 full days or 240 half days work per year. 18-month job seeker visa after graduation. EU Blue Card for skilled workers."
            }
        ],
        quickFacts: [
            "🎯 Popular Fields: Engineering, Automotive, IT",
            "🎓 Tuition: Mostly free at public universities",
            "🏭 Economy: Strong industrial base",
            "💶 Average Salary: €45,000 - €70,000",
            "🇪🇺 Location: Heart of Europe"
        ]
    },
    
    "Japan": {
        title: "Japan Study Guide",
        image: "https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
        description: "Experience cutting-edge technology and rich culture",
        sections: [
            {
                title: "📚 Education System",
                content: "Japanese universities are known for technology and research. Offers Bachelor's (4 years), Master's (2 years), and PhD programs."
            },
            {
                title: "💰 Cost of Living",
                content: "Monthly expenses: ¥80,000-¥120,000. Tuition: ¥500,000-¥800,000/year. Tokyo is most expensive city."
            },
            {
                title: "🎓 Top Universities",
                content: "University of Tokyo, Kyoto University, Tokyo Institute of Technology, Osaka University, Tohoku University"
            },
            {
                title: "📝 Visa Requirements",
                content: "Student Visa requires COE, financial proof, and Japanese/English proficiency. MEXT scholarships available for excellent students."
            },
            {
                title: "💼 Work Opportunities",
                content: "28 hours/week work during studies. Unlimited work during holidays. Many opportunities in technology and manufacturing sectors."
            }
        ],
        quickFacts: [
            "🎯 Popular Fields: Technology, Robotics, Engineering",
            "🏯 Culture: Unique traditions",
            "🚄 Technology: World leader in innovation",
            "💴 Average Salary: ¥4,000,000 - ¥6,000,000",
            "🏙️ Cities: Modern and efficient"
        ]
    }
};

// Modal Function
function showCountryGuideModal(country) {
    const guide = countryGuides[country];
    if (!guide) return;
    
    const modalHTML = `
        <div class="country-modal" style="
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 20px;
            animation: fadeIn 0.3s ease;
        ">
            <div style="
                background: white;
                border-radius: 20px;
                padding: 0;
                max-width: 800px;
                width: 100%;
                max-height: 90vh;
                overflow-y: auto;
                box-shadow: 0 20px 60px rgba(0,0,0,0.3);
                animation: slideUp 0.4s ease;
            ">
                <!-- Modal Header -->
                <div style="
                    background: linear-gradient(135deg, var(--primary), var(--secondary));
                    color: white;
                    padding: 2rem;
                    border-radius: 20px 20px 0 0;
                    position: relative;
                ">
                    <button onclick="closeModal()" style="
                        position: absolute;
                        top: 1rem;
                        right: 1rem;
                        background: rgba(255,255,255,0.2);
                        color: white;
                        border: none;
                        width: 40px;
                        height: 40px;
                        border-radius: 50%;
                        cursor: pointer;
                        font-size: 1.2rem;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: background 0.3s;
                    ">
                        ×
                    </button>
                    
                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 3px solid white;">
                            <img src="${guide.image}" alt="${country}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div>
                            <h2 style="margin: 0 0 0.5rem 0; font-size: 1.8rem;">${guide.title}</h2>
                            <p style="margin: 0; opacity: 0.9; font-size: 1rem;">${guide.description}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Content -->
                <div style="padding: 2rem;">
                    <!-- Quick Facts -->
                    <div style="
                        background: var(--background);
                        padding: 1.5rem;
                        border-radius: 12px;
                        margin-bottom: 2rem;
                        border-left: 4px solid var(--primary);
                    ">
                        <h3 style="margin: 0 0 1rem 0; color: var(--text-primary); display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-bolt" style="color: var(--warning);"></i> Quick Facts
                        </h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                            ${guide.quickFacts.map(fact => `
                                <div style="
                                    background: white;
                                    padding: 0.8rem;
                                    border-radius: 8px;
                                    border: 1px solid var(--border-color);
                                    font-size: 0.9rem;
                                    color: var(--text-secondary);
                                ">
                                    ${fact}
                                </div>
                            `).join('')}
                        </div>
                    </div>
                    
                    <!-- Detailed Sections -->
                    ${guide.sections.map((section, index) => `
                        <div style="
                            margin-bottom: 1.5rem;
                            padding-bottom: 1.5rem;
                            border-bottom: ${index === guide.sections.length - 1 ? 'none' : '1px solid var(--border-color)'};
                        ">
                            <h3 style="
                                margin: 0 0 0.8rem 0;
                                color: var(--text-primary);
                                display: flex;
                                align-items: center;
                                gap: 10px;
                                font-size: 1.2rem;
                            ">
                                ${section.title}
                            </h3>
                            <p style="
                                margin: 0;
                                color: var(--text-secondary);
                                line-height: 1.6;
                                font-size: 1rem;
                            ">
                                ${section.content}
                            </p>
                        </div>
                    `).join('')}
                    
                    <!-- Action Buttons -->
                    <div style="
                        display: flex;
                        gap: 1rem;
                        margin-top: 2rem;
                        padding-top: 2rem;
                        border-top: 1px solid var(--border-color);
                    ">
                        <button onclick="closeModal()" style="
                            padding: 0.8rem 1.5rem;
                            background: var(--primary);
                            color: white;
                            border: none;
                            border-radius: 8px;
                            cursor: pointer;
                            font-weight: 600;
                            flex: 1;
                            transition: background 0.3s;
                        ">
                            <i class="fas fa-check"></i> Got It
                        </button>
                        <button onclick="downloadGuide('${country}')" style="
                            padding: 0.8rem 1.5rem;
                            background: var(--background);
                            color: var(--text-primary);
                            border: 1px solid var(--border-color);
                            border-radius: 8px;
                            cursor: pointer;
                            font-weight: 600;
                            flex: 1;
                            transition: all 0.3s;
                        ">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <style>
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .country-modal {
                backdrop-filter: blur(5px);
            }
        </style>
    `;
    
    // Remove any existing modal
    const existingModal = document.querySelector('.country-modal');
    if (existingModal) existingModal.remove();
    
    // Add new modal
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

// Close modal function
function ccloseModal() {
    const cmodal = document.querySelector('.country-modal');
    if (cmodal) {
        cmodal.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            cmodal.remove();
            document.body.style.overflow = 'auto';
        }, 300);
    }
}

// Download guide function
function downloadGuide(country) {
    alert(`Downloading ${country} Study Guide as PDF...`);
    // In real implementation, this would download an actual PDF
}

// Make functions globally available
window.viewCountryGuide = function(country) {
    // Show loading on button
    const event = window.event;
    if (event) {
        const button = event.target.closest('.view-guide-btn');
        if (button) {
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            button.disabled = true;
            
            setTimeout(() => {
                button.innerHTML = originalHTML;
                button.disabled = false;
                showCountryGuideModal(country);
            }, 800);
        }
    } else {
        showCountryGuideModal(country);
    }
};

window.closeModal = ccloseModal;
window.downloadGuide = downloadGuide;

// Close modal on ESC key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        ccloseModal();
    }
});

// Close modal on background click
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('country-modal')) {
        ccloseModal();
    }
});

    //   Contact Page

    // Contact Form Submission
          const contactForm = document.getElementById("contactForm");
          if (contactForm) {
            contactForm.addEventListener("submit", function (e) {
              e.preventDefault();

              // Get form data
              const formData = {
                firstName: document.getElementById("firstName").value,
                lastName: document.getElementById("lastName").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value,
                country: document.getElementById("country").value,
                inquiryType: document.getElementById("inquiryType").value,
                message: document.getElementById("message").value,
              };

              // Validate form
              if (
                !formData.firstName ||
                !formData.lastName ||
                !formData.email ||
                !formData.country ||
                !formData.inquiryType ||
                !formData.message
              ) {
                alert("Please fill all required fields");
                return;
              }

              // Show loading state
              const submitBtn = contactForm.querySelector(".submit-btn");
              const originalText = submitBtn.innerHTML;
              submitBtn.innerHTML =
                '<i class="fas fa-spinner fa-spin"></i> Sending...';
              submitBtn.disabled = true;

              // Simulate form submission
              setTimeout(() => {
                // Success message
                alert(
                  "Thank you for your message! We will contact you within 24 hours.",
                );

                // Reset form
                contactForm.reset();

                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
              }, 1500);
            });
          }

          // FAQ Accordion
          const faqItems = document.querySelectorAll(".faq-item");
          faqItems.forEach((item) => {
            const question = item.querySelector(".faq-question");
            question.addEventListener("click", () => {
              // Close all other items
              faqItems.forEach((otherItem) => {
                if (
                  otherItem !== item &&
                  otherItem.classList.contains("active")
                ) {
                  otherItem.classList.remove("active");
                }
              });

              // Toggle current item
              item.classList.toggle("active");
            });
          });

          // Smooth scroll for navigation links
          document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function (e) {
              const href = this.getAttribute("href");
              if (href === "#") return;

              const target = document.querySelector(href);
              if (target) {
                e.preventDefault();
                window.scrollTo({
                  top: target.offsetTop - 80,
                  behavior: "smooth",
                });
              }
            });
          });

          // Form input animations
          const formControls = document.querySelectorAll(".form-control");
          formControls.forEach((control) => {
            // Add focus effect
            control.addEventListener("focus", function () {
              this.parentElement.style.transform = "translateY(-2px)";
            });

            control.addEventListener("blur", function () {
              this.parentElement.style.transform = "translateY(0)";
            });
          });

          // Team member hover effect
          const teamMembers = document.querySelectorAll(".team-member");
          teamMembers.forEach((member) => {
            member.addEventListener("mouseenter", function () {
              this.style.boxShadow = "0 15px 35px rgba(0, 0, 0, 0.1)";
            });

            member.addEventListener("mouseleave", function () {
              this.style.boxShadow = "var(--shadow-md)";
            });
          });

          // Contact info card animations
          const infoCards = document.querySelectorAll(".info-card");
          infoCards.forEach((card) => {
            card.addEventListener("mouseenter", function () {
              const icon = this.querySelector(".info-icon");
              if (icon) {
                icon.style.transform = "rotate(10deg) scale(1.1)";
              }
            });

            card.addEventListener("mouseleave", function () {
              const icon = this.querySelector(".info-icon");
              if (icon) {
                icon.style.transform = "rotate(0) scale(1)";
              }
            });
          });


        //   About Page

        // Value cards hover effect
          const valueCards = document.querySelectorAll(".value-card");
          valueCards.forEach((card) => {
            card.addEventListener("mouseenter", function () {
              const icon = this.querySelector(".value-icon");
              if (icon) {
                icon.style.transform = "scale(1.1) rotate(5deg)";
              }
            });

            card.addEventListener("mouseleave", function () {
              const icon = this.querySelector(".value-icon");
              if (icon) {
                icon.style.transform = "scale(1) rotate(0)";
              }
            });
          });

          // Team cards hover effect
          const teamCards = document.querySelectorAll(".team-card");
          teamCards.forEach((card) => {
            card.addEventListener("mouseenter", function () {
              const avatar = this.querySelector(".member-avatar");
              if (avatar) {
                avatar.style.transform = "scale(1.05)";
                avatar.style.boxShadow = "0 8px 25px rgba(37, 99, 235, 0.3)";
              }
            });

            card.addEventListener("mouseleave", function () {
              const avatar = this.querySelector(".member-avatar");
              if (avatar) {
                avatar.style.transform = "scale(1)";
                avatar.style.boxShadow = "var(--shadow-md)";
              }
            });
          });

          // Partner items hover effect
          const partnerItems = document.querySelectorAll(".partner-item");
          partnerItems.forEach((item) => {
            item.addEventListener("mouseenter", function () {
              const icon = this.querySelector("i");
              if (icon) {
                icon.style.transform = "scale(1.2)";
              }
            });

            item.addEventListener("mouseleave", function () {
              const icon = this.querySelector("i");
              if (icon) {
                icon.style.transform = "scale(1)";
              }
            });
          });

          // CTA Buttons
          const ctaButtons = document.querySelectorAll(".cta-section .btn");
          ctaButtons.forEach((btn) => {
            btn.addEventListener("click", function (e) {
              e.preventDefault();

              if (this.classList.contains("btn-outline")) {
                alert("Downloading International Student Hub brochure...");
              } else {
                alert("Redirecting to consultation booking page...");
              }
            });
          });

          // Smooth scroll for navigation
          document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function (e) {
              const href = this.getAttribute("href");
              if (href === "#") return;

              const target = document.querySelector(href);
              if (target) {
                e.preventDefault();
                window.scrollTo({
                  top: target.offsetTop - 80,
                  behavior: "smooth",
                });
              }
            });
          });

          // Animate achievement numbers on scroll
          const achievementNumbers = document.querySelectorAll(
            ".achievement-number",
          );
          let animated = false;

          function animateNumbers() {
            if (animated) return;

            achievementNumbers.forEach((number) => {
              const value = number.innerText.replace(/[^0-9]/g, "");
              if (value) {
                let start = 0;
                let end = parseInt(value);
                let duration = 2000;
                let increment = end / (duration / 16);

                let timer = setInterval(() => {
                  start += increment;
                  if (start >= end) {
                    number.innerText = number.innerText.replace(
                      /[0-9,]+/,
                      end.toLocaleString(),
                    );
                    clearInterval(timer);
                  } else {
                    number.innerText = number.innerText.replace(
                      /[0-9,]+/,
                      Math.floor(start).toLocaleString(),
                    );
                  }
                }, 16);
              }
            });

            animated = true;
          }

          // Intersection Observer for achievements
          const achievementsSection = document.querySelector(
            ".achievements-section",
          );
          if (achievementsSection) {
            const observer = new IntersectionObserver(
              (entries) => {
                entries.forEach((entry) => {
                  if (entry.isIntersecting) {
                    animateNumbers();
                  }
                });
              },
              { threshold: 0.5 },
            );

            observer.observe(achievementsSection);
          }



        //   Theme Swicher

        // Theme Switcher Module
const ThemeManager = {
    init: function() {
        this.themes = {
            light: { icon: 'fa-sun', name: 'Light Mode' },
            dark: { icon: 'fa-moon', name: 'Dark Mode' },
            calm: { icon: 'fa-mountain', name: 'Calm Mode' }
        };
        
        this.themeButtons = document.querySelectorAll('.all-site--modes li');
        this.themeLinks = document.querySelectorAll('.all-site--modes li a');
        
        this.loadSavedTheme();
        this.attachEvents();
    },
    
    attachEvents: function() {
        this.themeLinks.forEach((link, index) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                let theme = 'light';
                if (index === 1) theme = 'dark';
                if (index === 2) theme = 'calm';
                this.changeTheme(theme);
            });
        });
    },
    
    loadSavedTheme: function() {
        const savedTheme = localStorage.getItem('ish-theme') || 'light';
        this.changeTheme(savedTheme, false);
    },
    
    changeTheme: function(theme, showToast = true) {
        // Set theme attribute
        document.documentElement.setAttribute('data-theme', theme);
        
        // Save to localStorage
        localStorage.setItem('ish-theme', theme);
        
        // Update active button
        this.updateActiveButton(theme);
        
        // Show notification
        if (showToast) {
            this.showToast(theme);
        }
        
        // Dispatch custom event
        window.dispatchEvent(new CustomEvent('themeChanged', { 
            detail: { theme: theme } 
        }));
    },
    
    updateActiveButton: function(theme) {
        this.themeButtons.forEach(btn => btn.classList.remove('active'));
        
        if (theme === 'light') this.themeButtons[0]?.classList.add('active');
        if (theme === 'dark') this.themeButtons[1]?.classList.add('active');
        if (theme === 'calm') this.themeButtons[2]?.classList.add('active');
    },
    
    showToast: function(theme) {
        const themeName = this.themes[theme].name;
        const toast = document.createElement('div');
        toast.className = 'theme-toast';
        toast.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <span>${themeName} activated</span>
        `;
        
        toast.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--primary);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow-lg);
            z-index: 9999;
            animation: slideIn 0.3s ease;
            font-weight: 500;
        `;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
};

    ThemeManager.init();



    const ctaButton = document.querySelector('.cta-button-m');
    const modal = document.getElementById('exp_share_modal');
    const closeBtn = document.querySelector('.exp_modal_close_btn');
    const form = document.getElementById('exp_share_form');
    const statusDiv = document.getElementById('exp_form_status');
    
    if(ctaButton) {
        ctaButton.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    }
    
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
        statusDiv.style.display = 'none';
        form.reset();
    }
    
    if(closeBtn) {
        closeBtn.onclick = closeModal;
    }
    
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }
    
    if(form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const name = document.getElementById('exp_name').value;
            const email = document.getElementById('exp_email').value;
            const country = document.getElementById('exp_country').value;
            const message = document.getElementById('exp_message').value;
            
            const formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('country', country);
            formData.append('message', message);
            
            statusDiv.style.display = 'block';
            statusDiv.className = 'exp_form_status';
            statusDiv.innerHTML = '📧 Sending your experience...';
            statusDiv.style.backgroundColor = '#e3f2fd';
            statusDiv.style.color = '#0d47a1';
            
            try {
                
                const response = await fetch('https://formsubmit.co/ajax/khadizamaria523@gmail.com', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData  
                });
                
                const result = await response.json();
                
                if (result.success === true) {
                    statusDiv.className = 'exp_form_status success';
                    statusDiv.innerHTML = '✅ Thank you! Your experience has been sent successfully! We will get back to you soon.';
                    form.reset();
                    
                    setTimeout(closeModal, 3000);
                } else {
                    throw new Error(result.message || 'Submission failed');
                }
                
            } catch (error) {
                console.error('Error:', error);
                statusDiv.className = 'exp_form_status error';
                statusDiv.innerHTML = '❌ Sorry! Failed to send. Please try again later.';
            }
        });
    }

    
    // সমস্ত resource লিঙ্ক নির্বাচন করুন
    const allResourceLinks = document.querySelectorAll('.resource-links a');
    const resourceModalBox = document.getElementById('resource_content_modal');
    const modalTitle = document.getElementById('resource_modal_title');
    const modalContent = document.getElementById('resource_modal_content');
    const resourceCloseButton = document.querySelector('.resource_modal_close');
    
    // প্রতিটি লিঙ্কের জন্য কন্টেন্ট ডাটাবেস
    const resourceContent = {
        // Financial Planning
        'Scholarship Finder Tool': {
            title: '🎓 Scholarship Finder Tool',
            description: 'Find scholarships that match your profile and destination country.',
            details: 'This tool helps you discover thousands of international scholarships based on your academic background, country preference, and field of study.',
            features: [
                'Personalized scholarship recommendations',
                'Application deadline alerts',
                'Eligibility checker',
                'Success rate calculator'
            ],
            externalLink: 'https://www.scholars4dev.com',
            actionText: 'Search Scholarships'
        },
        'Cost of Living Calculator': {
            title: '💰 Cost of Living Calculator',
            description: 'Calculate your monthly expenses in different countries.',
            details: 'Compare living costs including accommodation, food, transportation, healthcare, and entertainment across major study destinations.',
            features: [
                'City-wise comparison',
                'Student budget templates',
                'Part-time work income estimator',
                'Currency converter'
            ],
            externalLink: 'https://www.numbeo.com/cost-of-living/',
            actionText: 'Calculate Now'
        },
        'Student Loan Guide': {
            title: '📘 Student Loan Guide',
            description: 'Complete guide to education loans for international students.',
            details: 'Learn about different loan options, interest rates, repayment plans, and eligibility criteria for studying abroad.',
            features: [
                'Government vs private loans',
                'Interest rate comparison',
                'Loan application process',
                'Repayment strategies'
            ],
            externalLink: 'https://www.internationalstudentloan.com/',
            actionText: 'Explore Loans'
        },
        'Part-time Work Regulations': {
            title: '💼 Part-time Work Regulations',
            description: 'Know your rights and limitations for working while studying.',
            details: 'Country-wise guide to work permits, hour limits, minimum wages, and tax regulations for international students.',
            features: [
                'Country-specific work hour limits',
                'Tax filing guides',
                'Work permit application',
                'Rights and protections'
            ],
            externalLink: 'https://www.internationalstudents.org/work-regulations',
            actionText: 'View Regulations'
        },
        
        // Application Tools
        'Personal Statement Builder': {
            title: '✍️ Personal Statement Builder',
            description: 'Create compelling personal statements with AI assistance.',
            details: 'Step-by-step guide to write impressive personal statements that stand out to admission committees.',
            features: [
                'Template library',
                'Success examples',
                'AI writing assistant',
                'Peer review system'
            ],
            externalLink: 'https://www.studyingabroad.com/ps-builder',
            actionText: 'Start Building'
        },
        'Document Checklist': {
            title: '📋 Document Checklist',
            description: 'Complete checklist of required documents for applications.',
            details: 'Track all necessary documents for university applications, visa processing, and pre-departure preparations.',
            features: [
                'Country-wise requirements',
                'Downloadable PDF checklist',
                'Document expiry alerts',
                'Notarization guide'
            ],
            externalLink: 'https://www.documentchecklist.com/studyabroad',
            actionText: 'Get Checklist'
        },
        'University Comparison Tool': {
            title: '🏛️ University Comparison Tool',
            description: 'Compare universities based on rankings, fees, and more.',
            details: 'Side-by-side comparison of universities based on QS rankings, tuition fees, acceptance rates, and student reviews.',
            features: [
                'Ranking comparison',
                'Fee structure analysis',
                'Acceptance rates',
                'Alumni reviews'
            ],
            externalLink: 'https://www.topuniversities.com/university-rankings',
            actionText: 'Compare Now'
        },
        'Deadline Tracker': {
            title: '⏰ Deadline Tracker',
            description: 'Never miss an application deadline again.',
            details: 'Personalized deadline calendar for university applications, scholarship deadlines, and visa appointments.',
            features: [
                'Custom reminders',
                'Email notifications',
                'Calendar integration',
                'Priority sorting'
            ],
            externalLink: 'https://www.deadlinetracker.com/student',
            actionText: 'Set Reminders'
        },
        
        // Community Support
        'Country-Specific Student Forums': {
            title: '🌍 Country-Specific Student Forums',
            description: 'Connect with students in your destination country.',
            details: 'Join country-wise forums to get insider tips, local guidance, and peer support from current international students.',
            features: [
                'Country-wise communities',
                'City-specific groups',
                'Real-time chat',
                'Expert Q&A sessions'
            ],
            externalLink: 'https://www.studentforums.net',
            actionText: 'Join Forum'
        },
        'Connect with Current Students': {
            title: '🤝 Connect with Current Students',
            description: 'Direct mentorship from students studying abroad.',
            details: 'Platform to connect with current international students who share their real experiences and advice.',
            features: [
                'One-on-one chat',
                'Video calls',
                'Success stories',
                'Ask anything sessions'
            ],
            externalLink: 'https://www.connectwithstudents.com',
            actionText: 'Find Mentors'
        },
        'Alumni Mentorship Program': {
            title: '🎓 Alumni Mentorship Program',
            description: 'Learn from successful alumni who completed their studies.',
            details: 'Get guidance from alumni about career paths, job opportunities, and life after graduation.',
            features: [
                'Career guidance',
                'Resume reviews',
                'Job referrals',
                'Networking events'
            ],
            externalLink: 'https://www.alumnimentorship.org',
            actionText: 'Join Program'
        },
        'Cultural Adaptation Workshops': {
            title: '🌏 Cultural Adaptation Workshops',
            description: 'Prepare for cultural differences and new environments.',
            details: 'Interactive workshops to help you adapt to new cultures, overcome homesickness, and build cross-cultural communication skills.',
            features: [
                'Free webinars',
                'Cultural sensitivity training',
                'Local customs guide',
                'Language tips'
            ],
            externalLink: 'https://www.culturaladaptation.com/students',
            actionText: 'Register Now'
        },
       // Health & Wellness
        'Mental Health Resources': {
            title: '🧠 Mental Health Resources',
            description: 'Support for your mental wellbeing',
            details: 'Free and confidential mental health support for international students. Access counseling services, stress management tools, and 24/7 crisis helplines.',
            features: [
                'Free counseling services',
                'Stress management guides',
                'Anxiety coping strategies',
                '24/7 crisis helplines',
                'Student support groups'
            ],
            externalLink: 'https://www.internationalstudentwellness.com',
            actionText: 'Get Support'
        },
        'International Insurance Guide': {
            title: '🏥 International Insurance Guide',
            description: 'Complete health insurance guide',
            details: 'Understand health insurance requirements, coverage options, claims process, and how to choose the best plan for your needs as an international student.',
            features: [
                'Insurance requirement by country',
                'Coverage comparison',
                'Claims process guide',
                'Emergency medical tips',
                'Cost saving strategies'
            ],
            externalLink: 'https://www.internationalstudentinsurance.com/guide',
            actionText: 'Compare Insurance'
        },
        'Finding Healthcare Abroad': {
            title: '🩺 Finding Healthcare Abroad',
            description: 'Access medical care in your host country',
            details: 'How to find doctors, hospitals, pharmacies, and emergency services in your destination country. Learn about appointment systems and medical vocabulary.',
            features: [
                'Finding local doctors',
                'Hospital directories',
                'Pharmacy guide',
                'Emergency numbers',
                'Medical appointment tips'
            ],
            externalLink: 'https://www.healthcareabroad.com/students',
            actionText: 'Find Healthcare'
        },
        'Wellness Check-ins': {
            title: '💚 Wellness Check-ins',
            description: 'Regular wellness monitoring',
            details: 'Regular wellness reminders and self-assessment tools to maintain your physical and mental health while studying abroad. Track your wellbeing journey.',
            features: [
                'Daily wellness reminders',
                'Self-assessment tools',
                'Mood tracking',
                'Healthy habit builder',
                'Wellness tips newsletter'
            ],
            externalLink: 'https://www.studentwellnesscheck.org',
            actionText: 'Start Check-in'
        },
        
        // Community Support
        'Student Forum Access': {
            title: '💬 Student Forum Access',
            description: 'Connect with fellow students',
            details: 'Join global student forums to ask questions, share experiences, get advice, and build friendships with international students from around the world.',
            features: [
                'Country-wise communities',
                'University-specific groups',
                'Real-time discussions',
                'Expert Q&A sessions',
                'Event announcements'
            ],
            externalLink: 'https://www.studentforums.net',
            actionText: 'Join Forum'
        },
        'Cultural Buddy Program': {
            title: '👥 Cultural Buddy Program',
            description: 'Get paired with a local buddy',
            details: 'Get matched with a local or international buddy who will help you adapt to new culture, practice language, navigate daily life, and build meaningful connections.',
            features: [
                'One-on-one buddy matching',
                'Cultural exchange activities',
                'Language practice partners',
                'Local tips and guides',
                'Monthly meetups'
            ],
            externalLink: 'https://www.culturalbuddy.com',
            actionText: 'Find a Buddy'
        },
        'Alumni Network': {
            title: '🎓 Alumni Network',
            description: 'Connect with successful graduates',
            details: 'Join our global alumni network. Find mentors, discover career opportunities, attend networking events, and stay connected with your study abroad community.',
            features: [
                'Global alumni directory',
                'Mentorship opportunities',
                'Job board access',
                'Networking events',
                'Success stories'
            ],
            externalLink: 'https://www.alumninetwork.com',
            actionText: 'Join Network'
        },
        'Emergency Contacts Database': {
            title: '🚨 Emergency Contacts Database',
            description: 'Essential emergency information',
            details: 'Access essential emergency numbers, embassy contacts, police stations, hospitals, and safety resources for international students in different countries.',
            features: [
                'Emergency numbers by country',
                'Embassy contact list',
                'Safety tips and guides',
                '24/7 helplines',
                'Travel advisory updates'
            ],
            externalLink: 'https://www.emergencycontacts.com/students',
            actionText: 'View Contacts'
        }
    };
    
    // প্রতিটি লিঙ্কে ক্লিক ইভেন্ট যোগ করুন
    allResourceLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // লিংকের টেক্সট নিন (যা দেখানো হচ্ছে)
            let linkText = this.innerText.trim();
            // আইকন বাদ দিতে
            linkText = linkText.replace(/<i class="[^"]*"><\/i>/, '').trim();
            // "Tool", "Guide" ইত্যাদি থাকলে সেটা রাখবে
            
            // ডাটা খুঁজুন
            let content = null;
            for (let key in resourceContent) {
                if (linkText.includes(key) || key.includes(linkText)) {
                    content = resourceContent[key];
                    break;
                }
            }
            
            // যদি না পাওয়া যায়, ডিফল্ট কন্টেন্ট দেখান
            if (!content) {
                content = {
                    title: linkText,
                    description: 'Resource guide for study abroad students.',
                    details: 'This resource will help you with your study abroad journey. More detailed information is coming soon.',
                    features: ['Interactive tools', 'Expert advice', 'Student testimonials', 'Step-by-step guides'],
                    externalLink: '#',
                    actionText: 'Learn More'
                };
            }
            
            // মডালে কন্টেন্ট দেখান
            modalTitle.innerHTML = content.title;
            modalContent.innerHTML = `
                <h3 style="margin-bottom: 10px;">📖 ${content.description}</h3>
                <p>${content.details}</p>
                
                <h4 style="margin-bottom: 20px;margin-top:20px; font-size: 20px";>✨ Key Features:</h4>
                <ul style="margin-bottom: 40px;">
                    ${content.features.map(f => `<li style="margin-bottom: 18px;font-size: 18px;">✓ ${f}</li>`).join('')}
                </ul>
                
                <div class="resource_action_buttons">
                    <a href="${content.externalLink}" target="_blank" class="resource_btn resource_btn_primary">
                        ${content.actionText} 🔗
                    </a>
                    <button onclick="window.print()" class="resource_btn resource_btn_secondary">
                        📄 Save as PDF
                    </button>
                </div>
                
                <p style="margin-top: 20px; font-size: 12px; color: #999;">
                    ⚡ You will be redirected to an external resource. All tools are free to use.
                </p>
            `;
            
            // মডাল দেখান
            resourceModalBox.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    });
    
    // মডাল বন্ধ করার ফাংশন
    if(resourceCloseButton) {
        resourceCloseButton.onclick = function() {
            resourceModalBox.style.display = 'none';
            document.body.style.overflow = 'auto';
        };
    }
    
    // মডালের বাইরে ক্লিক করলে বন্ধ
    window.onclick = function(event) {
        if (event.target == resourceModalBox) {
            resourceModalBox.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    };

    
     // বাটন নির্বাচন
    const consultBtn = document.querySelector('.btn-secondary');
    const consultModal = document.getElementById('consultModal');
    const consultCloseBtn = document.querySelector('.consult_modal_close');
    const consultForm = document.getElementById('consultForm');
    const consultStatus = document.getElementById('consult_status');
    
    // মডাল খোলা
    if(consultBtn) {
        consultBtn.addEventListener('click', function(e) {
            e.preventDefault();
            consultModal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            
            // আজকের তারিখ থেকে শুরু (অতীত তারিখ সিলেক্ট করা যাবে না)
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('consult_date').min = today;
        });
    }
    
    // মডাল বন্ধ
    function closeConsultModal() {
        consultModal.style.display = 'none';
        document.body.style.overflow = 'auto';
        consultStatus.style.display = 'none';
        if(consultForm) consultForm.reset();
    }
    
    if(consultCloseBtn) {
        consultCloseBtn.onclick = closeConsultModal;
    }
    
    window.onclick = function(event) {
        if(event.target === consultModal) {
            closeConsultModal();
        }
    }
    
    // ফর্ম সাবমিট - FormSubmit এ পাঠানো
    if(consultForm) {
        consultForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // ফর্ম ডাটা সংগ্রহ
            const name = document.getElementById('consult_name').value;
            const email = document.getElementById('consult_email').value;
            const phone = document.getElementById('consult_phone').value;
            const country = document.getElementById('consult_country').value;
            const date = document.getElementById('consult_date').value;
            const time = document.getElementById('consult_time').value;
            const message = document.getElementById('consult_message').value;
            
            // FormData তৈরি
            const formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('country', country);
            formData.append('date', date);
            formData.append('time', time);
            formData.append('message', message);
            formData.append('_subject', 'New Consultation Request from ' + name);
            
            // স্ট্যাটাস দেখানো
            consultStatus.style.display = 'block';
            consultStatus.className = 'consult_status';
            consultStatus.innerHTML = '⏳ Sending your request...';
            consultStatus.style.backgroundColor = '#e3f2fd';
            consultStatus.style.color = '#0d47a1';
            
            try {
                // FormSubmit এ পাঠানো (আপনার ইমেইল দিন)
                const response = await fetch('https://formsubmit.co/ajax/khadizamaria523@gmail.com', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                
                const result = await response.json();
                
                if(result.success === true) {
                    consultStatus.className = 'consult_status success';
                    consultStatus.innerHTML = '✅ Thank you! We will contact you within 24 hours to confirm your consultation.';
                    consultForm.reset();
                    
                    setTimeout(closeConsultModal, 4000);
                } else {
                    throw new Error('Submission failed');
                }
                
            } catch(error) {
                consultStatus.className = 'consult_status error';
                consultStatus.innerHTML = '❌ Sorry! Failed to send. Please try again or email us directly.';
            }
        });
    }


});


