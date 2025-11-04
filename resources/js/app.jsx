import './bootstrap';
import Alpine from 'alpinejs';
import React from 'react';
import { createRoot } from 'react-dom/client';
import FavoriteButton from './components/FavoriteButton.jsx';
import WishlistButton from './components/WishlistButton.jsx';
import Toast from './components/Toast.jsx';

// Initialize Alpine
window.Alpine = Alpine;
Alpine.start();

// Initialize React components
document.addEventListener('DOMContentLoaded', () => {
    // Mount FavoriteButton components
    const favoriteButtons = document.querySelectorAll('[data-favorite-button]');
    favoriteButtons.forEach(container => {
        const productId = container.getAttribute('data-product-id');
        const root = createRoot(container);
        root.render(<FavoriteButton productId={productId} />);
    });
    
    // Mount WishlistButton component
    const wishlistContainer = document.querySelector('[data-wishlist-button]');
    if (wishlistContainer) {
        const root = createRoot(wishlistContainer);
        root.render(<WishlistButton />);
    }
    
    // Mount Toast component
    const toastContainer = document.createElement('div');
    toastContainer.id = 'toast-root';
    document.body.appendChild(toastContainer);
    const toastRoot = createRoot(toastContainer);
    toastRoot.render(<Toast />);
});
