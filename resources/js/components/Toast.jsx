import React, { useState, useEffect } from 'react';

const Toast = () => {
    const [toasts, setToasts] = useState([]);

    useEffect(() => {
        // Listen for custom toast events
        const handleToastEvent = (event) => {
            const { message, type = 'success', duration = 3000 } = event.detail;
            const id = Date.now() + Math.random();
            
            const newToast = {
                id,
                message,
                type,
                duration
            };
            
            setToasts(prev => [...prev, newToast]);
            
            // Auto-remove toast after duration
            setTimeout(() => {
                removeToast(id);
            }, duration);
        };

        window.addEventListener('showToast', handleToastEvent);
        
        return () => {
            window.removeEventListener('showToast', handleToastEvent);
        };
    }, []);

    const removeToast = (id) => {
        setToasts(prev => prev.filter(toast => toast.id !== id));
    };

    const getIcon = (type) => {
        switch (type) {
            case 'success':
                return (
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <path d="M9 12l2 2 4-4" />
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                );
            case 'favorite':
                return (
                    <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" strokeWidth="2">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                    </svg>
                );
            case 'cart':
                return (
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <circle cx="9" cy="21" r="1" />
                        <circle cx="20" cy="21" r="1" />
                        <path d="m1 1 4 4 2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                    </svg>
                );
            default:
                return (
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4" />
                        <path d="M12 8h.01" />
                    </svg>
                );
        }
    };

    if (toasts.length === 0) return null;

    return (
        <div className="toast-container">
            {toasts.map((toast) => (
                <div
                    key={toast.id}
                    className={`toast toast--${toast.type}`}
                    onClick={() => removeToast(toast.id)}
                >
                    <div className="toast__icon">
                        {getIcon(toast.type)}
                    </div>
                    <div className="toast__content">
                        <p className="toast__message">{toast.message}</p>
                    </div>
                    <button 
                        className="toast__close"
                        onClick={(e) => {
                            e.stopPropagation();
                            removeToast(toast.id);
                        }}
                        aria-label="Close notification"
                    >
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
            ))}
        </div>
    );
};

// Helper function to show toast from anywhere
export const showToast = (message, type = 'success', duration = 3000) => {
    window.dispatchEvent(new CustomEvent('showToast', {
        detail: { message, type, duration }
    }));
};

export default Toast;
