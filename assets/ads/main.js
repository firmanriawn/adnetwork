// Color picker initialization
function createPickr(element, defaultColor, onChange) {
    return Pickr.create({
        el: element,
        theme: 'classic',
        default: defaultColor,
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: true,
                rgba: true,
                hsla: true,
                input: true,
                clear: true,
                save: true
            }
        }
    }).on('save', (color) => {
        if (color) {
            onChange(color.toHEXA().toString());
        }
    });
}

// Initialize color pickers
const bgColorPickr = createPickr('#bgColorPicker', '#ffffff', (color) => {
    document.querySelector('.ad-content').style.backgroundColor = color;
});

const textColorPickr = createPickr('#textColorPicker', '#333333', (color) => {
    document.querySelector('.ad-content').style.color = color;
});

const ctaColorPickr = createPickr('#ctaColorPicker', '#2196f3', (color) => {
    const ctaButton = document.querySelector('.cta-button');
    if (ctaButton.classList.contains('outline')) {
        ctaButton.style.borderColor = color;
        ctaButton.style.color = color;
    } else if (ctaButton.classList.contains('text')) {
        ctaButton.style.color = color;
    } else if (ctaButton.classList.contains('gradient')) {
        ctaButton.style.background = `linear-gradient(45deg, ${color}, ${adjustColor(color, -20)})`;
    } else {
        ctaButton.style.backgroundColor = color;
    }
});

const ctaTextColorPickr = createPickr('#ctaTextColorPicker', '#ffffff', (color) => {
    const ctaButton = document.querySelector('.cta-button');
    if (!ctaButton.classList.contains('outline') && !ctaButton.classList.contains('text')) {
        ctaButton.style.color = color;
    }
});

// Layout controls
const layoutStyle = document.getElementById('layoutStyle');
const containerWidth = document.getElementById('containerWidth');
const imageHeight = document.getElementById('imageHeight');
const roundedCorners = document.getElementById('roundedCorners');
const showShadow = document.getElementById('showShadow');

layoutStyle.addEventListener('change', (e) => {
    const adContainer = document.querySelector('.ad-container');
    adContainer.className = 'ad-container ' + e.target.value;
});

containerWidth.addEventListener('input', (e) => {
    document.querySelector('.ad-container').style.maxWidth = `${e.target.value}px`;
    document.querySelector('.range-value').textContent = `${e.target.value}px`;
});

imageHeight.addEventListener('input', (e) => {
    document.querySelector('.ad-image').style.height = `${e.target.value}px`;
    document.querySelector('.range-value').textContent = `${e.target.value}px`;
});

roundedCorners.addEventListener('change', (e) => {
    document.querySelector('.ad-container').style.borderRadius = e.target.checked ? '8px' : '0';
});

showShadow.addEventListener('change', (e) => {
    document.querySelector('.ad-container').style.boxShadow = e.target.checked ? '0 2px 4px rgba(0, 0, 0, 0.1)' : 'none';
});

// Image controls
const imageUpload = document.getElementById('imageUpload');
const imageUrl = document.getElementById('imageUrl');
const imageFit = document.getElementById('imageFit');
const imageOpacity = document.getElementById('imageOpacity');
const previewImage = document.getElementById('previewImage');

imageUpload.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

imageUrl.addEventListener('input', (e) => {
    if (e.target.value) {
        previewImage.src = e.target.value;
    }
});

imageFit.addEventListener('change', (e) => {
    previewImage.style.objectFit = e.target.value;
});

imageOpacity.addEventListener('input', (e) => {
    previewImage.style.opacity = e.target.value / 100;
    document.querySelector('.range-value').textContent = `${e.target.value}%`;
});

// Text controls
const headlineText = document.getElementById('headlineText');
const descriptionText = document.getElementById('descriptionText');
const ctaText = document.getElementById('ctaText');
const targetUrl = document.getElementById('targetUrl');

const headlineFont = document.getElementById('headlineFont');
const headlineSize = document.getElementById('headlineSize');
const headlineBold = document.getElementById('headlineBold');
const descriptionFont = document.getElementById('descriptionFont');
const descriptionSize = document.getElementById('descriptionSize');
const lineHeight = document.getElementById('lineHeight');

const previewHeadline = document.getElementById('previewHeadline');
const previewDescription = document.getElementById('previewDescription');
const previewCta = document.getElementById('previewCta');

headlineText.addEventListener('input', (e) => {
    previewHeadline.textContent = e.target.value || 'Your Headline Here';
});

descriptionText.addEventListener('input', (e) => {
    previewDescription.textContent = e.target.value || 'Your description text here';
});

ctaText.addEventListener('input', (e) => {
    previewCta.textContent = e.target.value || 'Learn More';
});

targetUrl.addEventListener('input', (e) => {
    previewCta.href = e.target.value || '#';
});

headlineFont.addEventListener('change', (e) => {
    previewHeadline.style.fontFamily = e.target.value;
});

headlineSize.addEventListener('input', (e) => {
    previewHeadline.style.fontSize = `${e.target.value}px`;
    document.querySelector('.range-value').textContent = `${e.target.value}px`;
});

headlineBold.addEventListener('change', (e) => {
    previewHeadline.style.fontWeight = e.target.checked ? 'bold' : 'normal';
});

descriptionFont.addEventListener('change', (e) => {
    previewDescription.style.fontFamily = e.target.value;
});

descriptionSize.addEventListener('input', (e) => {
    previewDescription.style.fontSize = `${e.target.value}px`;
    document.querySelector('.range-value').textContent = `${e.target.value}px`;
});

lineHeight.addEventListener('input', (e) => {
    previewDescription.style.lineHeight = e.target.value;
    document.querySelector('.range-value').textContent = e.target.value;
});

// Spacing controls
const contentPadding = document.getElementById('contentPadding');
const elementSpacing = document.getElementById('elementSpacing');

contentPadding.addEventListener('input', (e) => {
    document.querySelector('.ad-content').style.padding = `${e.target.value}px`;
    document.querySelector('.range-value').textContent = `${e.target.value}px`;
});

elementSpacing.addEventListener('input', (e) => {
    const value = `${e.target.value}px`;
    previewHeadline.style.marginBottom = value;
    previewDescription.style.marginBottom = value;
    document.querySelector('.range-value').textContent = value;
});

// CTA Style controls
const ctaStyle = document.getElementById('ctaStyle');
const ctaPadding = document.getElementById('ctaPadding');
const ctaBorderRadius = document.getElementById('ctaBorderRadius');

ctaStyle.addEventListener('change', (e) => {
    const ctaButton = document.querySelector('.cta-button');
    ctaButton.className = 'cta-button ' + e.target.value;

    // Reapply colors based on style
    const color = ctaColorPickr.getColor().toHEXA().toString();
    const textColor = ctaTextColorPickr.getColor().toHEXA().toString();

    if (e.target.value === 'outline') {
        ctaButton.style.borderColor = color;
        ctaButton.style.color = color;
        ctaButton.style.backgroundColor = 'transparent';
    } else if (e.target.value === 'text') {
        ctaButton.style.color = color;
        ctaButton.style.backgroundColor = 'transparent';
    } else if (e.target.value === 'gradient') {
        ctaButton.style.background = `linear-gradient(45deg, ${color}, ${adjustColor(color, -20)})`;
        ctaButton.style.color = textColor;
    } else {
        ctaButton.style.backgroundColor = color;
        ctaButton.style.color = textColor;
    }
});

ctaPadding.addEventListener('input', (e) => {
    const value = `${e.target.value}px`;
    previewCta.style.padding = `${e.target.value / 2}px ${e.target.value}px`;
    document.querySelector('.range-value').textContent = value;
});

ctaBorderRadius.addEventListener('input', (e) => {
    previewCta.style.borderRadius = `${e.target.value}px`;
    document.querySelector('.range-value').textContent = `${e.target.value}px`;
});

// Preview size controls
const previewMobile = document.getElementById('previewMobile');
const previewTablet = document.getElementById('previewTablet');
const previewDesktop = document.getElementById('previewDesktop');

previewMobile.addEventListener('click', () => {
    document.querySelector('.ad-container').style.maxWidth = '320px';
    updatePreviewButtons(previewMobile);
});

previewTablet.addEventListener('click', () => {
    document.querySelector('.ad-container').style.maxWidth = '768px';
    updatePreviewButtons(previewTablet);
});

previewDesktop.addEventListener('click', () => {
    document.querySelector('.ad-container').style.maxWidth = '1024px';
    updatePreviewButtons(previewDesktop);
});

function updatePreviewButtons(activeButton) {
    [previewMobile, previewTablet, previewDesktop].forEach(button => {
        button.classList.remove('active');
    });
    activeButton.classList.add('active');
}

// Utility function to adjust color brightness
function adjustColor(color, amount) {
    return '#' + color.replace(/^#/, '').replace(/../g, color => ('0' + Math.min(255, Math.max(0, parseInt(color, 16) + amount)).toString(16)).substr(-2));
}

// Handle image load errors
previewImage.addEventListener('error', () => {
    previewImage.src = 'https://via.placeholder.com/300x200';
});

// Initialize preview size buttons
updatePreviewButtons(previewDesktop);

// Ad controls functionality
const adCloseButton = document.querySelector('.ad-close-button');
adCloseButton.addEventListener('click', () => {
    const adContainer = document.querySelector('.ad-container');
    adContainer.style.display = 'none';

    // Show it again after 2 seconds for demo purposes
    setTimeout(() => {
        adContainer.style.display = '';
    }, 2000);
});