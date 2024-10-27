# Jeco Bootstrap Accordion Block

**Jeco Bootstrap Accordion Block** is a WordPress plugin that adds a customizable Bootstrap accordion block to the Gutenberg editor. It leverages Bootstrap’s collapsible functionality, allowing for clean and responsive accordion components on your WordPress site without globally impacting your styles.

## Features

- **Customizable Accordion Block:** Easily create and manage Bootstrap accordions using the Gutenberg editor.
- **Conditional Loading:** Styles and scripts are loaded only when the accordion block is in use, optimizing site performance.
- **Integrates with Bootstrap:** Utilizes Bootstrap's collapse functionality for a responsive design.
- **Easy to Style:** Extend and customize with additional CSS as needed.

## Installation

1. **Download the Plugin:**
   - Clone or download the repository to your local machine.
   - Upload the `jeco-bootstrap-accordion` folder to the `/wp-content/plugins/` directory of your WordPress installation.

2. **Install Dependencies:**
   - Navigate to the plugin directory in your terminal and run the following command to install dependencies:
     ```bash
     npm install
     ```

3. **Build the Assets:**
   - Compile the SCSS and JavaScript files using Gulp:
     ```bash
     gulp
     ```

4. **Activate the Plugin:**
   - Go to the WordPress admin dashboard, navigate to **Plugins**, and activate the **Jeco Bootstrap Accordion Block** plugin.

## Usage

1. **Add the Accordion Block:**
   - In the Gutenberg editor, click the **Add Block** button and search for **Jeco Bootstrap Accordion**.

2. **Configure the Accordion:**
   - Add multiple items to the accordion. Each item can contain a title and content.
   - Customize the appearance using additional CSS if desired.

3. **Preview and Publish:**
   - Preview the accordion in the editor and publish your post or page to see it live.

## Development

### Folder Structure

```plaintext
jeco-bootstrap-accordion/
├── blocks/
│   ├── jeco-bootstrap-accordion/
│   │   ├── index.js          // Block registration and attributes
│   │   ├── style.scss        // Styles specific to the accordion block
├── js/
│   ├── bootstrap.bundle.min.js // Bootstrap JavaScript
│   ├── popper.min.js         // Popper.js for Bootstrap
├── register-styles.php        // Enqueue styles and scripts
├── package.json               // NPM dependencies
├── gulpfile.js               // Gulp tasks for compiling assets

## Gulp Tasks
Default Task: Compiles SCSS, copies Bootstrap and Popper.js files to the /js directory, and watches for changes.
```bash
     gulp
     ```

## Acknowledgements
This plugin utilizes Bootstrap for its accordion functionality.