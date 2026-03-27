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


  // Search functionality
          const searchInput = document.querySelector(".search-box-country input");
          const searchBtn = document.querySelector(".search-btn");
          const tags = document.querySelectorAll(".tag");
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
            const term = searchTerm.toLowerCase().trim();

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
function closeModal() {
    const modal = document.querySelector('.country-modal');
    if (modal) {
        modal.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => {
            modal.remove();
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

window.closeModal = closeModal;
window.downloadGuide = downloadGuide;

// Close modal on ESC key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal();
    }
});

// Close modal on background click
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('country-modal')) {
        closeModal();
    }
});
    

});
