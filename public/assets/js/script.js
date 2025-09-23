/**
 * FABIO SERRA - JAVASCRIPT COMPLET
 * Navigation, Formulaires, Animations, Interactions
 * Compatible Mobile & Desktop
 */

'use strict';

// ========================================
// VARIABLES GLOBALES
// ========================================

const APP = {
    // Éléments DOM
    burgerMenu: null,
    navMenu: null,
    navOverlay: null,
    
    // État de l'application
    isMenuOpen: false,
    isScrolling: false,
    
    // Configuration
    config: {
        animationDuration: 300,
        debounceDelay: 100,
        maxCheckboxSelection: 3
    }
};

// ========================================
// INITIALISATION
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    APP.init();
});

APP.init = function() {
    // Initialiser les modules
    Navigation.init();
    Forms.init();
    Animations.init();
    ScrollEffects.init();
    Accessibility.init();
    
    console.log('🚀 Fabio Serra - Application initialisée');
};

// ========================================
// MODULE NAVIGATION
// ========================================

const Navigation = {
    init: function() {
        this.cacheDOM();
        this.bindEvents();
        this.setupSmoothScroll();
    },
    
    cacheDOM: function() {
        APP.burgerMenu = document.getElementById('burger-menu');
        APP.navMenu = document.getElementById('nav-menu');
        APP.navOverlay = document.getElementById('nav-overlay');
        this.navLinks = document.querySelectorAll('.nav-link');
        this.header = document.querySelector('header');
    },
    
    bindEvents: function() {
        // Menu burger
        if (APP.burgerMenu) {
            APP.burgerMenu.addEventListener('click', this.toggleMenu.bind(this));
        }
        
        // Overlay pour fermer le menu
        if (APP.navOverlay) {
            APP.navOverlay.addEventListener('click', this.closeMenu.bind(this));
        }
        
        // Liens de navigation
        this.navLinks.forEach(link => {
            link.addEventListener('click', this.handleNavClick.bind(this));
        });
        
        // Fermer le menu avec Escape
        document.addEventListener('keydown', this.handleKeydown.bind(this));
        
        // Scroll pour header sticky
        window.addEventListener('scroll', Utils.debounce(this.handleScroll.bind(this), APP.config.debounceDelay));
        
        // Resize pour responsive
        window.addEventListener('resize', Utils.debounce(this.handleResize.bind(this), APP.config.debounceDelay));
    },
    
    toggleMenu: function() {
        if (APP.isMenuOpen) {
            this.closeMenu();
        } else {
            this.openMenu();
        }
    },
    
    openMenu: function() {
        APP.isMenuOpen = true;
        APP.burgerMenu.classList.add('active');
        APP.navMenu.classList.add('active');
        APP.navOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Focus sur le premier lien
        const firstLink = APP.navMenu.querySelector('.nav-link');
        if (firstLink) {
            setTimeout(() => firstLink.focus(), 100);
        }
    },
    
    closeMenu: function() {
        APP.isMenuOpen = false;
        APP.burgerMenu.classList.remove('active');
        APP.navMenu.classList.remove('active');
        APP.navOverlay.classList.remove('active');
        document.body.style.overflow = '';
    },
    
    handleNavClick: function(e) {
        const href = e.target.getAttribute('href');
        
        // Si c'est une ancre locale
        if (href && href.startsWith('#')) {
            e.preventDefault();
            const targetId = href.substring(1);
            const target = document.getElementById(targetId);
            
            if (target) {
                this.closeMenu();
                this.scrollToElement(target);
            }
        } else if (href && href.startsWith('/')) {
            // Liens internes - fermer le menu
            this.closeMenu();
        }
    },
    
    handleKeydown: function(e) {
        if (e.key === 'Escape' && APP.isMenuOpen) {
            this.closeMenu();
        }
    },
    
    handleScroll: function() {
        if (APP.isScrolling) return;
        
        const scrollY = window.scrollY;
        
        // Header shadow on scroll
        if (this.header) {
            if (scrollY > 50) {
                this.header.style.boxShadow = '0 2px 20px rgba(0, 61, 130, 0.3)';
            } else {
                this.header.style.boxShadow = '0 2px 10px rgba(0, 61, 130, 0.2)';
            }
        }
    },
    
    handleResize: function() {
        // Fermer le menu mobile si on passe en desktop
        if (window.innerWidth > 768 && APP.isMenuOpen) {
            this.closeMenu();
        }
    },
    
    setupSmoothScroll: function() {
        // Déjà géré par CSS scroll-behavior: smooth
        // Mais on peut ajouter une fallback
        if (!CSS.supports('scroll-behavior', 'smooth')) {
            this.polyfillSmoothScroll();
        }
    },
    
    scrollToElement: function(element) {
        const headerHeight = this.header ? this.header.offsetHeight : 80;
        const targetPosition = element.offsetTop - headerHeight - 20;
        
        APP.isScrolling = true;
        
        if (window.scrollTo && 'behavior' in document.documentElement.style) {
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        } else {
            // Fallback pour anciens navigateurs
            this.smoothScrollTo(targetPosition);
        }
        
        setTimeout(() => {
            APP.isScrolling = false;
        }, 1000);
    },
    
    smoothScrollTo: function(target) {
        const start = window.pageYOffset;
        const distance = target - start;
        const duration = 800;
        let startTime = null;
        
        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = Utils.easeInOutQuad(timeElapsed, start, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }
        
        requestAnimationFrame(animation);
    }
};

// ========================================
// MODULE FORMULAIRES
// ========================================

const Forms = {
    init: function() {
        this.cacheDOM();
        this.bindEvents();
        this.setupValidation();
    },
    
    cacheDOM: function() {
        this.contactForm = document.querySelector('#contact form');
        this.consultationForm = document.querySelector('#consultation-citoyenne form');
        this.loginForm = document.querySelector('.login-container form');
        this.checkboxes = document.querySelectorAll('input[type="checkbox"][name="sujets[]"]');
    },
    
    bindEvents: function() {
        // Formulaire de contact
        if (this.contactForm) {
            this.contactForm.addEventListener('submit', this.handleContactSubmit.bind(this));
        }
        
        // Formulaire de consultation
        if (this.consultationForm) {
            this.consultationForm.addEventListener('submit', this.handleConsultationSubmit.bind(this));
        }
        
        // Formulaire de login
        if (this.loginForm) {
            this.loginForm.addEventListener('submit', this.handleLoginSubmit.bind(this));
        }
        
        // Limitation des checkboxes
        this.checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', this.handleCheckboxChange.bind(this));
        });
        
        // Validation en temps réel
        const inputs = document.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', this.validateField.bind(this));
            input.addEventListener('input', this.clearErrors.bind(this));
        });
    },
    
    setupValidation: function() {
        // Ajouter des attributs de validation personnalisés
        const emailInputs = document.querySelectorAll('input[type="email"]');
        emailInputs.forEach(input => {
            input.setAttribute('pattern', '[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,}$');
        });
    },
    
    handleContactSubmit: function(e) {
        if (!this.validateContactForm()) {
            e.preventDefault();
            return false;
        }
        
        this.showLoadingState(e.target);
    },
    
    handleConsultationSubmit: function(e) {
        if (!this.validateConsultationForm()) {
            e.preventDefault();
            return false;
        }
        
        this.showLoadingState(e.target);
    },
    
    handleLoginSubmit: function(e) {
        if (!this.validateLoginForm()) {
            e.preventDefault();
            return false;
        }
        
        this.showLoadingState(e.target);
    },
    
    handleCheckboxChange: function(e) {
        const checkedBoxes = document.querySelectorAll('input[type="checkbox"][name="sujets[]"]:checked');
        
        if (checkedBoxes.length >= APP.config.maxCheckboxSelection) {
            this.checkboxes.forEach(checkbox => {
                if (!checkbox.checked) {
                    checkbox.disabled = true;
                }
            });
            
            this.showMessage('Maximum 3 sujets sélectionnables', 'warning');
        } else {
            this.checkboxes.forEach(checkbox => {
                checkbox.disabled = false;
            });
            this.hideMessage();
        }
    },
    
    validateContactForm: function() {
        const form = this.contactForm;
        if (!form) return true;
        
        const nom = form.querySelector('[name="nom"]');
        const prenom = form.querySelector('[name="prenom"]');
        const sujet = form.querySelector('[name="sujet"]');
        const message = form.querySelector('[name="message"]');
        
        let isValid = true;
        
        if (!this.validateRequired(nom, 'Le nom est requis')) isValid = false;
        if (!this.validateRequired(prenom, 'Le prénom est requis')) isValid = false;
        if (!this.validateRequired(sujet, 'Le sujet est requis')) isValid = false;
        if (!this.validateRequired(message, 'Le message est requis')) isValid = false;
        
        return isValid;
    },
    
    validateConsultationForm: function() {
        const form = this.consultationForm;
        if (!form) return true;
        
        const quartier = form.querySelector('[name="quartier"]');
        const satisfaction = form.querySelector('[name="satisfaction"]:checked');
        const etat = form.querySelector('[name="etat"]:checked');
        const age = form.querySelector('[name="age"]:checked');
        const sujets = form.querySelectorAll('[name="sujets[]"]:checked');
        
        let isValid = true;
        
        if (!this.validateRequired(quartier, 'Le quartier est requis')) isValid = false;
        if (!satisfaction) {
            this.showFieldError(form.querySelector('[name="satisfaction"]'), 'Veuillez sélectionner votre niveau de satisfaction');
            isValid = false;
        }
        if (!etat) {
            this.showFieldError(form.querySelector('[name="etat"]'), 'Veuillez évaluer l\'état des infrastructures');
            isValid = false;
        }
        if (!age) {
            this.showFieldError(form.querySelector('[name="age"]'), 'Veuillez sélectionner votre tranche d\'âge');
            isValid = false;
        }
        if (sujets.length === 0) {
            this.showMessage('Veuillez sélectionner au moins un sujet prioritaire', 'error');
            isValid = false;
        }
        
        return isValid;
    },
    
    validateLoginForm: function() {
        const form = this.loginForm;
        if (!form) return true;
        
        const username = form.querySelector('[name="username"]');
        const password = form.querySelector('[name="password"]');
        
        let isValid = true;
        
        if (!this.validateRequired(username, 'Le nom d\'utilisateur est requis')) isValid = false;
        if (!this.validateRequired(password, 'Le mot de passe est requis')) isValid = false;
        
        return isValid;
    },
    
    validateField: function(e) {
        const field = e.target;
        this.clearFieldError(field);
        
        if (field.hasAttribute('required') && !field.value.trim()) {
            this.showFieldError(field, 'Ce champ est requis');
            return false;
        }
        
        if (field.type === 'email' && field.value.trim()) {
            if (!this.validateEmail(field.value)) {
                this.showFieldError(field, 'Veuillez entrer une adresse email valide');
                return false;
            }
        }
        
        return true;
    },
    
    validateRequired: function(field, message) {
        if (!field || !field.value.trim()) {
            this.showFieldError(field, message);
            return false;
        }
        this.clearFieldError(field);
        return true;
    },
    
    validateEmail: function(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    },
    
    showFieldError: function(field, message) {
        if (!field) return;
        
        this.clearFieldError(field);
        
        field.classList.add('error');
        field.style.borderColor = 'var(--error)';
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.textContent = message;
        errorDiv.style.color = 'var(--error)';
        errorDiv.style.fontSize = '0.875rem';
        errorDiv.style.marginTop = '0.25rem';
        
        field.parentNode.appendChild(errorDiv);
        field.focus();
    },
    
    clearFieldError: function(field) {
        if (!field) return;
        
        field.classList.remove('error');
        field.style.borderColor = '';
        
        const errorDiv = field.parentNode.querySelector('.field-error');
        if (errorDiv) {
            errorDiv.remove();
        }
    },
    
    clearErrors: function(e) {
        this.clearFieldError(e.target);
        this.hideMessage();
    },
    
    showLoadingState: function(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Envoi en cours...';
            submitBtn.style.opacity = '0.7';
        }
    },
    
    showMessage: function(text, type = 'info') {
        this.hideMessage();
        
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.textContent = text;
        messageDiv.style.cssText = `
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 5px;
            text-align: center;
            font-weight: 600;
            background: ${type === 'error' ? 'var(--error)' : type === 'warning' ? 'var(--warning)' : 'var(--primary-blue)'};
            color: white;
            animation: fadeIn 0.3s ease;
        `;
        
        const form = document.querySelector('form:not([style*="display: none"])');
        if (form) {
            form.appendChild(messageDiv);
            
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.remove();
                }
            }, 5000);
        }
    },
    
    hideMessage: function() {
        const messages = document.querySelectorAll('.form-message');
        messages.forEach(msg => msg.remove());
    }
};

// ========================================
// MODULE ANIMATIONS
// ========================================

const Animations = {
    init: function() {
        this.setupIntersectionObserver();
        this.animateOnLoad();
    },
    
    setupIntersectionObserver: function() {
        if (!window.IntersectionObserver) return;
        
        const options = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        this.observer = new IntersectionObserver(this.handleIntersection.bind(this), options);
        
        // Observer les éléments à animer
        const elementsToAnimate = document.querySelectorAll('section, form, .card');
        elementsToAnimate.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            this.observer.observe(el);
        });
    },
    
    handleIntersection: function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                this.observer.unobserve(entry.target);
            }
        });
    },
    
    animateOnLoad: function() {
        // Animation du hero
        const hero = document.querySelector('#accueil');
        if (hero) {
            hero.style.opacity = '0';
            setTimeout(() => {
                hero.style.transition = 'opacity 1s ease';
                hero.style.opacity = '1';
            }, 100);
        }
        
        // Animation du header
        const header = document.querySelector('header');
        if (header) {
            header.style.transform = 'translateY(-100%)';
            setTimeout(() => {
                header.style.transition = 'transform 0.5s ease';
                header.style.transform = 'translateY(0)';
            }, 200);
        }
    }
};

// ========================================
// MODULE EFFETS DE SCROLL
// ========================================

const ScrollEffects = {
    init: function() {
        this.setupScrollProgress();
        this.setupParallax();
    },
    
    setupScrollProgress: function() {
        // Créer une barre de progression de scroll
        const progressBar = document.createElement('div');
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--primary-red);
            z-index: 9999;
            transition: width 0.1s ease;
        `;
        document.body.appendChild(progressBar);
        
        window.addEventListener('scroll', Utils.throttle(() => {
            const scrolled = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            progressBar.style.width = Math.min(scrolled, 100) + '%';
        }, 10));
    },
    
    setupParallax: function() {
        const hero = document.querySelector('#accueil');
        if (!hero) return;
        
        window.addEventListener('scroll', Utils.throttle(() => {
            const scrolled = window.scrollY;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        }, 10));
    }
};

// ========================================
// MODULE ACCESSIBILITÉ
// ========================================

const Accessibility = {
    init: function() {
        this.setupKeyboardNavigation();
        this.setupARIA();
        this.setupReducedMotion();
    },
    
    setupKeyboardNavigation: function() {
        // Navigation au clavier dans les formulaires
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && e.target.type === 'radio') {
                e.target.checked = true;
                e.target.dispatchEvent(new Event('change'));
            }
        });
        
        // Gestion du focus trap dans le menu mobile
        if (APP.navMenu) {
            APP.navMenu.addEventListener('keydown', (e) => {
                if (!APP.isMenuOpen) return;
                
                const focusableElements = APP.navMenu.querySelectorAll('a, button');
                const firstElement = focusableElements[0];
                const lastElement = focusableElements[focusableElements.length - 1];
                
                if (e.key === 'Tab') {
                    if (e.shiftKey && document.activeElement === firstElement) {
                        e.preventDefault();
                        lastElement.focus();
                    } else if (!e.shiftKey && document.activeElement === lastElement) {
                        e.preventDefault();
                        firstElement.focus();
                    }
                }
            });
        }
    },
    
    setupARIA: function() {
        // Ajouter des attributs ARIA manquants
        const burgerMenu = APP.burgerMenu;
        if (burgerMenu) {
            burgerMenu.setAttribute('aria-expanded', 'false');
            burgerMenu.setAttribute('aria-controls', 'nav-menu');
            
            // Mettre à jour l'état ARIA
            const updateARIA = () => {
                burgerMenu.setAttribute('aria-expanded', APP.isMenuOpen.toString());
            };
            
            burgerMenu.addEventListener('click', updateARIA);
        }
        
        // Labels pour les champs de formulaire
        const inputs = document.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            if (!input.getAttribute('aria-label') && !input.getAttribute('aria-labelledby')) {
                const label = document.querySelector(`label[for="${input.id}"]`);
                if (label) {
                    input.setAttribute('aria-labelledby', label.id || `label-${input.id}`);
                    if (!label.id) label.id = `label-${input.id}`;
                }
            }
        });
    },
    
    setupReducedMotion: function() {
        // Respecter la préférence utilisateur pour les animations réduites
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            document.documentElement.style.setProperty('--transition-fast', '0ms');
            document.documentElement.style.setProperty('--transition-normal', '0ms');
            document.documentElement.style.setProperty('--transition-slow', '0ms');
        }
    }
};

// ========================================
// UTILITAIRES
// ========================================

const Utils = {
    debounce: function(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },
    
    throttle: function(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },
    
    easeInOutQuad: function(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    },
    
    isMobile: function() {
        return window.innerWidth <= 768;
    },
    
    isTouch: function() {
        return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    }
};

// ========================================
// GESTION DES ERREURS
// ========================================

window.addEventListener('error', function(e) {
    console.error('Erreur JavaScript:', e.error);
    // En production, vous pourriez envoyer l'erreur à un service de monitoring
});

window.addEventListener('unhandledrejection', function(e) {
    console.error('Promise rejetée:', e.reason);
    e.preventDefault();
});

// ========================================
// PERFORMANCE
// ========================================

// Préchargement des images importantes
if ('requestIdleCallback' in window) {
    requestIdleCallback(() => {
        const importantImages = [
            '/assets/images/hero.webp',
            '/assets/images/logo-header.webp'
        ];
        
        importantImages.forEach(src => {
            const img = new Image();
            img.src = src;
        });
    });
}

// Service Worker pour la mise en cache (optionnel)
if ('serviceWorker' in navigator && location.protocol === 'https:') {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => console.log('SW registered'))
            .catch(error => console.log('SW registration failed'));
    });
}

// ========================================
// ANALYTICS (Si nécessaire)
// ========================================

const Analytics = {
    track: function(event, data = {}) {
        // Intégration Google Analytics, Matomo, etc.
        if (typeof gtag !== 'undefined') {
            gtag('event', event, data);
        }
        
        console.log('Analytics event:', event, data);
    }
};

// Tracking des interactions importantes
document.addEventListener('click', function(e) {
    if (e.target.matches('.nav-link')) {
        Analytics.track('navigation_click', { link: e.target.textContent });
    }
    
    if (e.target.matches('button[type="submit"]')) {
        Analytics.track('form_submit', { form: e.target.closest('form').id || 'unknown' });
    }
});

console.log('🎯 Fabio Serra - JavaScript chargé et prêt !');