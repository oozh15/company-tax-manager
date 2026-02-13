
CorpTax-MVC: Enterprise Expense & Tax Management System

Financial Compliance: Ensuring every expense has a valid tax receipt (Image/PDF) for government audits.
Budget Control: Allowing managers to see real-time spending vs. company tax liabilities.
Accountability: Knowing exactly who spent what, when, and who approved it.

Feature	
Authentication	Secure Login/Signup with password_hash and session management.
RBAC	Role-Based Access Control (Admin vs. Employee).
Tax Engine	Automated calculation of VAT/GST based on pre-defined tax rates.
File Vault	Secure Image and PDF uploading with unique hashing to prevent filename conflicts.
MVC Architecture	Clean separation of Database (Model), Logic (Controller), and UI (View).
Audit Logging	Tracking user actions for security transparency.
Search/Filter	Filtering expenses by date, category, or status.

PSR-4 Autoloading Companies don't use include 'file.php'. They use namespaces. We used spl_autoload_register so the system automatically finds files.
The Singleton Pattern We used this in Database.php. It prevents the server from crashing by ensuring only one database connection exists at a time, no matter how many users are clicking.
 Dependency InjectionInstead of hardcoding database details everywhere, we pass the connection into the models. This makes the code testable.
Security Headers & Middleware Professional projects protect data.
Validation: Ensuring no empty or malicious data enters the DB.
Sanitization: Cleaning data to prevent XSS (Cross-Site Scripting).

PDO (Data Layer): Uses prepared statements to block SQL Injection. It acts as the bridge between your logic and MySQL.

OOP (Object Oriented Programming): * Classes: Representing "Users" and "Expenses" as real objects.
Inheritance: Controllers inheriting from a Base Controller to reuse the view() method.
Traits: Using FileHandler to add upload capabilities to any class without messy code.

Routing: PHP parses the URL and decides which "Brain" (Controller) to activate.
