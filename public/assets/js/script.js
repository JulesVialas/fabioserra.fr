/**
 * FABIO SERRA - JAVASCRIPT SIMPLIFIÉ
 * Navigation et Formulaires essentiels
 */

'use strict';

// Variables globales
let isMenuOpen = false;

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    Navigation.init();
    Forms.init();
});

// Navigation
const Navigation = {
    init: function() {
        this.burgerMenu = document.getElementById('burger-menu');
        this.navMenu = document.getElementById('nav-menu');
        this.navOverlay = document.getElementById('nav-overlay');
        
        // Events
        if (this.burgerMenu) {
            this.burgerMenu.addEventListener('click', this.toggleMenu.bind(this));
        }
        
        if (this.navOverlay) {
            this.navOverlay.addEventListener('click', this.closeMenu.bind(this));
        }
        
        // Fermer avec Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isMenuOpen) {
                this.closeMenu();
            }
        });
        
        // Fermer sur resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && isMenuOpen) {
                this.closeMenu();
            }
        });
    },
    
    toggleMenu: function() {
        if (isMenuOpen) {
            this.closeMenu();
        } else {
            this.openMenu();
        }
    },
    
    openMenu: function() {
        isMenuOpen = true;
        this.burgerMenu.classList.add('active');
        this.navMenu.classList.add('active');
        this.navOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    },
    
    closeMenu: function() {
        isMenuOpen = false;
        this.burgerMenu.classList.remove('active');
        this.navMenu.classList.remove('active');
        this.navOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }
};

// Formulaires
const Forms = {
    init: function() {
        this.contactForm = document.querySelector('#contact form');
        this.consultationForm = document.querySelector('#consultation-citoyenne form');
        this.loginForm = document.querySelector('.login-container form');
        this.checkboxes = document.querySelectorAll('input[type="checkbox"][name="sujets[]"]');
        
        // Events
        if (this.contactForm) {
            this.contactForm.addEventListener('submit', this.validateContactForm.bind(this));
        }
        
        if (this.consultationForm) {
            this.consultationForm.addEventListener('submit', this.validateConsultationForm.bind(this));
        }
        
        if (this.loginForm) {
            this.loginForm.addEventListener('submit', this.validateLoginForm.bind(this));
        }
        
        // Limitation des checkboxes (max 3)
        this.checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', this.handleCheckboxChange.bind(this));
        });
    },
    
    validateContactForm: function(e) {
        const form = e.target;
        const nom = form.querySelector('[name="nom"]');
        const prenom = form.querySelector('[name="prenom"]');
        const sujet = form.querySelector('[name="sujet"]');
        const message = form.querySelector('[name="message"]');
        
        let isValid = true;
        
        if (!nom.value.trim()) {
            this.showError(nom, 'Le nom est requis');
            isValid = false;
        }
        
        if (!prenom.value.trim()) {
            this.showError(prenom, 'Le prénom est requis');
            isValid = false;
        }
        
        if (!sujet.value.trim()) {
            this.showError(sujet, 'Le sujet est requis');
            isValid = false;
        }
        
        if (!message.value.trim()) {
            this.showError(message, 'Le message est requis');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    },
    
    validateConsultationForm: function(e) {
        const form = e.target;
        const quartier = form.querySelector('[name="quartier"]');
        const satisfaction = form.querySelector('[name="satisfaction"]:checked');
        const etat = form.querySelector('[name="etat"]:checked');
        const age = form.querySelector('[name="age"]:checked');
        const sujets = form.querySelectorAll('[name="sujets[]"]:checked');
        
        let isValid = true;
        
        if (!quartier.value.trim()) {
            this.showError(quartier, 'Le quartier est requis');
            isValid = false;
        }
        
        if (!satisfaction) {
            alert('Veuillez sélectionner votre niveau de satisfaction');
            isValid = false;
        }
        
        if (!etat) {
            alert('Veuillez évaluer l\'état des infrastructures');
            isValid = false;
        }
        
        if (!age) {
            alert('Veuillez sélectionner votre tranche d\'âge');
            isValid = false;
        }
        
        if (sujets.length === 0) {
            alert('Veuillez sélectionner au moins un sujet prioritaire');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    },
    
    validateLoginForm: function(e) {
        const form = e.target;
        const username = form.querySelector('[name="username"]');
        const password = form.querySelector('[name="password"]');
        
        let isValid = true;
        
        if (!username.value.trim()) {
            this.showError(username, 'Le nom d\'utilisateur est requis');
            isValid = false;
        }
        
        if (!password.value.trim()) {
            this.showError(password, 'Le mot de passe est requis');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    },
    
    handleCheckboxChange: function() {
        const checkedBoxes = document.querySelectorAll('input[type="checkbox"][name="sujets[]"]:checked');
        
        if (checkedBoxes.length >= 3) {
            this.checkboxes.forEach(checkbox => {
                if (!checkbox.checked) {
                    checkbox.disabled = true;
                }
            });
            alert('Maximum 3 sujets sélectionnables');
        } else {
            this.checkboxes.forEach(checkbox => {
                checkbox.disabled = false;
            });
        }
    },
    
    showError: function(field, message) {
        field.style.borderColor = '#dc3545';
        field.focus();
        alert(message);
    }
};
