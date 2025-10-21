# CBKNY Lottie Animation System

This directory contains Lottie animations for the CBKNY WordPress theme.

## File Structure

```
assets/animations/
├── README.md                    # This documentation file
├── Saas.json                   # SaaS hand animation (37KB)
└── [future animations...]      # Additional Lottie files
```

## Current Animations

### SaaS Hand Animation (`Saas.json`)
- **Name**: SaaS Hand Animation
- **Description**: Professional hand animation for SaaS presentations
- **Size**: 37KB
- **Dimensions**: 985x698px
- **Duration**: 6 seconds (180 frames at 30fps)
- **Usage**: Perfect for hero sections, call-to-action areas, and presentations

## How to Use

### 1. Via Shortcode
Add animations anywhere in your content using the shortcode:

```php
[cbkny_lottie animation="saas-hand" width="300" height="200"]
```

**Shortcode Parameters:**
- `animation`: Animation name (default: "saas-hand")
- `width`: Container width (default: "auto")
- `height`: Container height (default: "auto") 
- `class`: CSS classes to add
- `loop`: Loop animation (default: "true")
- `autoplay`: Auto-play animation (default: "true")
- `speed`: Animation speed multiplier (default: "1")

**Examples:**
```php
<!-- Basic usage -->
[cbkny_lottie]

<!-- Custom size -->
[cbkny_lottie width="400" height="300"]

<!-- No loop, slower speed -->
[cbkny_lottie loop="false" speed="0.5"]

<!-- Custom CSS class -->
[cbkny_lottie class="hero-animation"]
```

### 2. Via HTML Data Attributes
Add animations directly in HTML:

```html
<div data-lottie="saas-hand" style="width: 300px; height: 200px;"></div>
```

### 3. Via JavaScript API
Control animations programmatically:

```javascript
// Play animation
CBKNYLottie.play('saas-hand');

// Pause animation
CBKNYLottie.pause('saas-hand');

// Stop animation
CBKNYLottie.stop('saas-hand');

// Change speed
CBKNYLottie.setSpeed('saas-hand', 1.5);

// Get duration
const duration = CBKNYLottie.getDuration('saas-hand');

// Load custom animation
const customAnimation = CBKNYLottie.loadCustom(
    document.getElementById('my-container'),
    '/path/to/custom-animation.json',
    { loop: false, autoplay: false }
);
```

## Adding New Animations

### 1. Add the JSON File
Place your Lottie JSON file in this directory.

### 2. Update Configuration
Edit `/assets/js/lottie-loader.js` and add your animation to the `LOTTIE_CONFIG.animations` object:

```javascript
animations: {
    'saas-hand': {
        file: '/assets/animations/Saas.json',
        name: 'SaaS Hand Animation',
        description: 'Professional hand animation for SaaS presentations'
    },
    'your-new-animation': {
        file: '/assets/animations/your-animation.json',
        name: 'Your Animation Name',
        description: 'Description of your animation'
    }
}
```

### 3. Use the Animation
Now you can use your animation with the shortcode:

```php
[cbkny_lottie animation="your-new-animation"]
```

## Best Practices

### File Optimization
- Keep animation files under 100KB when possible
- Use Lottie's built-in optimization tools
- Consider using simpler animations for mobile devices

### Performance
- Animations load automatically when the Lottie library is available
- The system uses CDN-hosted Lottie library (5.12.2)
- Animations are responsive and mobile-friendly

### Accessibility
- Provide alternative content for users who prefer reduced motion
- Use `prefers-reduced-motion` CSS media query when needed
- Ensure animations don't interfere with screen readers

## Browser Support

- **Chrome**: Full support
- **Firefox**: Full support  
- **Safari**: Full support
- **Edge**: Full support
- **IE11**: Limited support (SVG renderer only)

## Troubleshooting

### Animation Not Loading
1. Check browser console for JavaScript errors
2. Verify the animation file path is correct
3. Ensure the Lottie library loaded successfully

### Performance Issues
1. Reduce animation complexity
2. Lower the frame rate
3. Optimize the JSON file size

### Mobile Issues
1. Check responsive CSS rules
2. Test on actual mobile devices
3. Consider using simpler animations for mobile

## File Management

The Lottie system integrates with the CBKNY file management system:

- **Admin Dashboard**: View animation usage statistics
- **Download Tracking**: Track how animations are viewed
- **Analytics**: Monitor animation performance and engagement

## Support

For issues with the Lottie animation system:

1. Check the browser console for errors
2. Verify animation file integrity
3. Test with a simple animation first
4. Contact the development team if issues persist

---

**Last Updated**: December 2024  
**Version**: 1.0.0
