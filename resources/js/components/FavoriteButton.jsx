import React, { useState, useEffect } from 'react';
import { showToast } from './Toast.jsx';

const FavoriteButton = ({ productId }) => {
    const [isLiked, setIsLiked] = useState(false);

    // Load initial state from localStorage on component mount
    useEffect(() => {
        try {
            const favorites = JSON.parse(localStorage.getItem('favorites') || '{}');
            const productData = favorites[productId] || { liked: false };
            setIsLiked(productData.liked);
        } catch (error) {
            console.error('Error loading favorites from localStorage:', error);
        }
    }, [productId]);

    // Function to notify other components about favorites update
    const notifyFavoritesUpdate = () => {
        // Dispatch custom event for same-page updates
        window.dispatchEvent(new CustomEvent('favoritesUpdated'));
    };

    /**
     * Handles the like/unlike toggle
     * @param {Event} e - Click event
     */
    const handleToggleLike = (e) => {
        e.stopPropagation(); // Prevent card click event from triggering
        e.preventDefault(); // Prevent any default behavior
        
        const newLikedState = !isLiked;
        
        // Update state
        setIsLiked(newLikedState);

        // Persist to localStorage
        try {
            const favorites = JSON.parse(localStorage.getItem('favorites') || '{}');
            favorites[productId] = {
                liked: newLikedState
            };
            localStorage.setItem('favorites', JSON.stringify(favorites));
            
            // Show toast notification
            if (newLikedState) {
                showToast('Product added to favorites! ❤️', 'favorite', 2500);
            } else {
                showToast('Product removed from favorites', 'favorite', 2500);
            }
            
            // Notify other components about the update
            notifyFavoritesUpdate();
        } catch (error) {
            console.error('Error saving favorites to localStorage:', error);
        }
    };

    return (
        <button 
            className="favorite-button" 
            onClick={handleToggleLike}
            aria-label={isLiked ? 'Remove from favorites' : 'Add to favorites'}
            type="button"
            title={isLiked ? 'Remove from favorites' : 'Add to favorites'}
        >
            <svg 
                className={`favorite-button__icon ${isLiked ? 'liked' : ''}`}
                viewBox="0 0 24 24" 
                fill={isLiked ? 'currentColor' : 'none'}
                stroke="currentColor" 
                strokeWidth="2"
                strokeLinecap="round" 
                strokeLinejoin="round"
                aria-hidden="true"
            >
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
            </svg>
        </button>
    );
};

export default FavoriteButton;
