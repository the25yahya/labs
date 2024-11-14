# php htmlspecialchars() : 
- The htmlspecialchars() function in PHP is used to convert special characters into HTML entities. This is particularly useful when displaying user-generated content on a webpage, as it helps prevent security issues like Cross-Site Scripting (XSS) attacks.
- Parameters:
$string: The input string to be converted.
$flags (optional): A bitmask of one or more of the following flags:
ENT_COMPAT: Converts double quotes but leaves single quotes alone.
ENT_QUOTES: Converts both double and single quotes.
ENT_NOQUOTES: Does not convert any quotes.
ENT_HTML401, ENT_XML1, etc.: Specifies the encoding type (HTML or XML).
$encoding (optional): The character encoding to use. The default is the value of the default_charset configuration option (usually UTF-8).
$double_encode (optional): If set to false, it will not encode existing HTML entities (such as &amp;) again.