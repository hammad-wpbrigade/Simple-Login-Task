import React, { useState } from 'react';
import './RegistrationFormFields.css';

const RegistrationFormFields = ({ nonceFromWP }) => {
  const [lpChoice, setLpChoice] = useState('');
  const [firstName, setFirstName] = useState('');
  const [lastName, setLastName] = useState('');

  return (
    <div className="additional-registration-div">
      <input type="hidden" name="registration_nonce" value={nonceFromWP} />
      <p>
        <label>Enter Extra Detail</label>
        <br />
        <label>
          <input
            type="radio"
            name="lp_choice"
            value="yes"
            checked={lpChoice === "yes"}
            onChange={() => setLpChoice("yes")}
          />
          Yes
        </label>
        <label>
          <input
            type="radio"
            name="lp_choice"
            value="no"
            checked={lpChoice === "no"}
            onChange={() => setLpChoice("no")}
          />
          No
        </label>
      </p>

      {lpChoice==="yes" && (
        <div id="lp-extra-fields" className="input-div">
          <p>
            <input
              type="text"
              name="FirstName"
              placeholder="First Name"
              value={firstName}
              onChange={(e) => setFirstName(e.target.value)}
            />
          </p>
          <p>
            <input
              type="text"
              name="LastName"
              placeholder="Last Name"
              value={lastName}
              onChange={(e) => setLastName(e.target.value)}
            />
          </p>
        </div>
      )}
    </div>
  );
};

export default RegistrationFormFields;