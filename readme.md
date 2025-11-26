# Simple Login Task

**Contributors:** Hammad Meer  
**Tags:** registration, user meta, extra fields, React  
**Requires at least:** 5.0  
**Tested up to:** 6.5  
**Stable tag:** 3.0  
**License:** GPLv2 or later  

Adds Yes/No radio buttons and extra input fields (First Name, Last Name) to the WordPress registration form using React and saves them in user meta.

## Installation

1. Upload the plugin to `/wp-content/plugins/`.  
2. Activate it in the WordPress admin.  
3. The registration form will automatically render the React-based fields.

## Usage

- Selecting **Yes** shows the extra fields.  
- Selecting **No** hides them.  
- Values are saved as user meta: `lp_choice`, `first_name`, `last_name`.  
- Nonce verification and sanitization are handled automatically for security.  

## Changelog

### 3.0
- Converted registration form fields to a React component.  
- Removed separate CSS and JS files; React handles rendering and styling.  
- Nonce is passed dynamically from WordPress to React.  
- Retained OOP structure with `Registration` class to handle form and user meta.  
- Fully compatible with WordPress coding standards (WPCS).  

### 2.0
- Refactored plugin to use Object-Oriented Programming (OOP) structure.  
- Added `Registration` class to handle registration form and meta saving.  
- Improved code quality and PSR-4 autoloading.  
- Fixed security issues: added nonce verification and proper sanitization of `$_POST` data.  
- Enqueued scripts and styles properly using WordPress hooks.  

### 1.0
- Initial release with PHP-based registration form and separate CSS/JS.
