Server-Side Request Forgery (SSRF) vulnerabilities occur when an attacker can manipulate a server to make unintended HTTP or other requests. Certain features and functionalities in web applications are particularly prone to SSRF due to their nature. Here are the most common ones:


---

1. File Upload and Image Processing

How it's vulnerable: Applications that process user-uploaded files or images often download external URLs for file validation or image manipulation.

Example:

A user uploads a file, and the application fetches metadata from a remote URL (http://example.com/file.png).

Attacker inputs http://internal-system.local/secret-config.




---

2. URL Previews or Metadata Fetching

How it's vulnerable: Features like link previews (e.g., in chat applications) that fetch metadata (e.g., title, description) from a given URL.

Example:

User inputs a URL, and the application fetches it to display content.

Attacker inputs http://localhost/admin or file:///etc/passwd.




---

3. Webhooks

How it's vulnerable: Webhooks often trigger HTTP requests to external URLs based on user input.

Example:

An API allows users to specify a callback URL for notifications.

Attacker specifies http://169.254.169.254/latest/meta-data.




---

4. API Proxying or Gateway Features

How it's vulnerable: Applications acting as proxies for user-supplied URLs may allow SSRF if they do not validate the destination.

Example:

User supplies a URL to fetch data.

Attacker inputs http://internal-system.local/admin.




---

5. SSO and Open Redirects

How it's vulnerable: SSO and redirect functionalities may allow attackers to control the destination of HTTP requests.

Example:

Application fetches user info from a URL specified in an OAuth token.

Attacker redirects it to a malicious or internal URL.




---

6. PDF Generators and Document Processing

How it's vulnerable: Tools that convert URLs into PDFs or process document content by fetching external resources.

Example:

A user inputs a webpage URL to generate a PDF.

Attacker inputs http://internal-service/admin.




---

7. Cloud Metadata Endpoints

How it's vulnerable: Applications deployed in cloud environments may access sensitive metadata endpoints if SSRF is exploited.

Example:

AWS: http://169.254.169.254/latest/meta-data/

GCP: http://metadata.google.internal/




---

8. Email Systems with URL Validation

How it's vulnerable: Email systems validating URLs in links for phishing detection may fetch untrusted URLs.

Example:

Attacker sends an email with a link to http://localhost/admin.




---

9. Dynamic Report Generation

How it's vulnerable: Applications that generate reports or dashboards by fetching external data may inadvertently allow SSRF.

Example:

A user provides a data source URL for the report.

Attacker provides a malicious internal URL.




---

10. SSRF in SSRF Mitigation

How it's vulnerable: Ironically, security features designed to prevent SSRF (like URL filtering) can sometimes be exploited due to bypass techniques.

Example:

Blacklisting instead of whitelisting URLs.

Using redirects to bypass filters (e.g., http://allowed-site.com/redirect?url=http://internal-service.local).




---

Key SSRF Exploitation Targets

Internal Networks: http://192.168.x.x/, http://10.x.x.x/

Cloud Metadata Endpoints: AWS, GCP, Azure

Localhost Services: http://127.0.0.1/, http://localhost/

File Schemes: file:///etc/passwd, file:///C:/Windows/System32/

Custom Protocols: gopher://, ftp://, smb://



---

Mitigation Strategies

1. Strict Input Validation: Allow only whitelisted URLs or domains.


2. DNS Resolution Control: Restrict internal network and sensitive endpoints.


3. Use Libraries or Proxies: Leverage secure libraries or API gateways to fetch external resources.


4. Network Segmentation: Isolate internal services from public-facing ones.


5. Limit HTTP Methods: Only allow necessary methods (e.g., GET).


6. Monitor Requests: Log and alert unusual or suspicious requests.



By identifying and securing these vulnerable functionalities, you can greatly reduce the risk of SSRF in your application.

