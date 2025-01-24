# Cricket Registration System

A simple web application for managing cricket registration. This project provides functionalities for players to register for cricket matches, view their details, and for administrators to manage registrations efficiently.

## Features

- **Player Registration**: Users can sign up and register for cricket matches.
- **Admin Dashboard**: Administrators can view and manage registered players.
- **Search and Filter**: Easily search for players by name or filter by match.
- **Responsive Design**: Works seamlessly on desktops and mobile devices.

## Technologies Used

- **Frontend**:
  - HTML5
  - CSS3
  - JavaScript

- **Backend**:
  - Python
  - Flask

- **Database**:
  - SQLite (or specify the database used)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/indusree123/cricket_registration.git
   cd cricket_registration
   ```

2. Set up a virtual environment:
   ```bash
   python -m venv venv
   source venv/bin/activate   # On Windows: venv\Scripts\activate
   ```

3. Install dependencies:
   ```bash
   pip install -r requirements.txt
   ```

4. Set up the database:
   ```bash
   flask db init
   flask db migrate
   flask db upgrade
   ```

5. Run the application:
   ```bash
   flask run
   ```

## Usage

1. **Player Registration**:
   - Navigate to the registration page.
   - Fill in the required details.
   - Submit the form to register.

2. **Admin Management**:
   - Log in as an admin to access the dashboard.
   - View, update, or delete player registrations.



## Contributing

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add your feature description"
   ```
4. Push to your branch:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Open a pull request on GitHub.

## License

This project is licensed under the [MIT License](LICENSE).


