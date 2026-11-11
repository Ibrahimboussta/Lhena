import './bootstrap';

import Alpine from 'alpinejs';
import { jsPDF } from 'jspdf';

window.Alpine = Alpine;
window.jsPDF = jsPDF;

document.querySelectorAll('.property-image-loader img').forEach(image => {
    const container = image.closest('.property-image-loader');
    const markLoaded = () => container.classList.add('is-loaded');
    const markFailed = () => container.classList.add('is-failed');

    if (image.complete) {
        image.naturalWidth > 0 ? markLoaded() : markFailed();
    } else {
        image.addEventListener('load', markLoaded, { once: true });
        image.addEventListener('error', markFailed, { once: true });
    }
});

Alpine.start();
