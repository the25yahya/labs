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