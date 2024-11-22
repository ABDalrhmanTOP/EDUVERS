// src/index.js
import React from 'react';
import ReactDOM from 'react-dom/client'; // React 18
import App from './App';
import './App.css';

// Render the application
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
