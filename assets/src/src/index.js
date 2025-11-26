import React from 'react';
import { createRoot } from 'react-dom/client'; // <- Correct import
import RegistrationFormFields from './RegistrationFormFields';

const container = document.getElementById('lp-registration-form');
if (container) {
  const root = createRoot(container);
  const nonce = container.dataset.nonce;
  root.render(
    <React.StrictMode>
      <RegistrationFormFields nonceFromWP={nonce} />
    </React.StrictMode>
  );
}
