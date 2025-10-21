/**
 * Lottie Animation Loader for CBKNY Theme
 * Handles loading and displaying Lottie animations
 */

(function() {
    'use strict';

    // Lottie animation configuration
    const LOTTIE_CONFIG = {
        animations: {
            'saas-hand': {
                file: '/assets/animations/Saas.json',
                name: 'SaaS Hand Animation',
                description: 'Professional hand animation for SaaS presentations'
            }
        },
        defaultOptions: {
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '',
            rendererSettings: {
                preserveAspectRatio: 'xMidYMid slice'
            }
        }
    };

    // Initialize Lottie animations when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        initializeLottieAnimations();
    });

    function initializeLottieAnimations() {
        // Find all elements with lottie data attributes
        const lottieElements = document.querySelectorAll('[data-lottie]');
        
        lottieElements.forEach(element => {
            const animationName = element.getAttribute('data-lottie');
            loadLottieAnimation(element, animationName);
        });
    }

    function loadLottieAnimation(element, animationName) {
        const animationConfig = LOTTIE_CONFIG.animations[animationName];
        
        if (!animationConfig) {
            console.warn(`Lottie animation '${animationName}' not found`);
            return;
        }

        // Check if Lottie library is loaded
        if (typeof lottie === 'undefined') {
            loadLottieLibrary().then(() => {
                createAnimation(element, animationConfig);
            });
        } else {
            createAnimation(element, animationConfig);
        }
    }

    function loadLottieLibrary() {
        return new Promise((resolve, reject) => {
            if (typeof lottie !== 'undefined') {
                resolve();
                return;
            }

            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js';
            script.onload = resolve;
            script.onerror = reject;
            document.head.appendChild(script);
        });
    }

    function createAnimation(element, config) {
        const options = {
            ...LOTTIE_CONFIG.defaultOptions,
            container: element,
            path: config.file
        };

        try {
            const animation = lottie.loadAnimation(options);
            
            // Add event listeners
            animation.addEventListener('DOMLoaded', () => {
                console.log(`Lottie animation '${config.name}' loaded successfully`);
            });

            animation.addEventListener('error', (error) => {
                console.error(`Error loading Lottie animation '${config.name}':`, error);
            });

            // Store animation reference on element
            element.lottieAnimation = animation;

            return animation;
        } catch (error) {
            console.error(`Failed to create Lottie animation '${config.name}':`, error);
        }
    }

    // Utility functions for controlling animations
    window.CBKNYLottie = {
        // Play animation
        play: function(animationName) {
            const element = document.querySelector(`[data-lottie="${animationName}"]`);
            if (element && element.lottieAnimation) {
                element.lottieAnimation.play();
            }
        },

        // Pause animation
        pause: function(animationName) {
            const element = document.querySelector(`[data-lottie="${animationName}"]`);
            if (element && element.lottieAnimation) {
                element.lottieAnimation.pause();
            }
        },

        // Stop animation
        stop: function(animationName) {
            const element = document.querySelector(`[data-lottie="${animationName}"]`);
            if (element && element.lottieAnimation) {
                element.lottieAnimation.stop();
            }
        },

        // Set animation speed
        setSpeed: function(animationName, speed) {
            const element = document.querySelector(`[data-lottie="${animationName}"]`);
            if (element && element.lottieAnimation) {
                element.lottieAnimation.setSpeed(speed);
            }
        },

        // Get animation duration
        getDuration: function(animationName) {
            const element = document.querySelector(`[data-lottie="${animationName}"]`);
            if (element && element.lottieAnimation) {
                return element.lottieAnimation.getDuration();
            }
            return 0;
        },

        // Load custom animation
        loadCustom: function(element, animationPath, options = {}) {
            const config = {
                ...LOTTIE_CONFIG.defaultOptions,
                container: element,
                path: animationPath,
                ...options
            };

            return lottie.loadAnimation(config);
        }
    };

})();
