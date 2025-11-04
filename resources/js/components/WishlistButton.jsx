import React, { useState, useEffect } from 'react';
import { showToast } from './Toast.jsx';

const WishlistButton = () => {
    const [totalCount, setTotalCount] = useState(0);

    // Function to update the total count
    const updateTotalCount = () => {
        try {
            const favorites = JSON.parse(localStorage.getItem('favorites') || '{}');
            const count = Object.values(favorites).filter(item => item.liked).length;
            setTotalCount(count);
        } catch (error) {
            console.error('Error updating wishlist count:', error);
        }
    };

    // Load initial count on component mount
    useEffect(() => {
        updateTotalCount();
        
        // Listen for storage changes (when favorites are updated)
        const handleStorageChange = (e) => {
            if (e.key === 'favorites') {
                updateTotalCount();
            }
        };
        
        window.addEventListener('storage', handleStorageChange);
        
        // Custom event listener for same-page updates
        const handleFavoritesUpdate = () => {
            updateTotalCount();
        };
        
        window.addEventListener('favoritesUpdated', handleFavoritesUpdate);
        
        // Cleanup event listeners
        return () => {
            window.removeEventListener('storage', handleStorageChange);
            window.removeEventListener('favoritesUpdated', handleFavoritesUpdate);
        };
    }, []);

    const handleWishlistClick = () => {
        if (totalCount === 0) {
            showToast('Your wishlist is empty! Start adding some favorites ❤️', 'favorite', 3000);
        } else {
            showToast(`You have ${totalCount} item${totalCount !== 1 ? 's' : ''} in your wishlist! 🎉`, 'favorite', 3000);
        }
    };

    return (
        <button 
            className="header__wishlist" 
            onClick={handleWishlistClick}
            aria-label={`Wishlist with ${totalCount} items`}
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
            </svg>
            <span className="header__wishlist-text">Favorites</span>
            {totalCount > 0 && (
                <span className="header__wishlist-count">{totalCount}</span>
            )}
        </button>
    );
};

export default WishlistButton;
