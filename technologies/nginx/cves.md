Famous CVEs in Nginx


CVE-2014-0133 (Nginx):

Description: A buffer overflow vulnerability in Nginx’s handling of specially crafted HTTP requests could lead to remote code execution.
Impact: Attackers could exploit this to execute arbitrary code on the server.
Severity: Critical
Solution: Fixed in Nginx 1.6.2 and later versions.


CVE-2019-11043 (Nginx):

Description: A vulnerability in Nginx's handling of HTTP/2 requests, when combined with PHP-FPM, could allow remote attackers to execute arbitrary code by sending a crafted request.
Impact: This could lead to remote code execution and full system compromise.
Severity: Critical
Solution: Fixed in Nginx 1.16.1 and later.


CVE-2018-16843 (Nginx):

Description: Nginx's implementation of HTTP/2 could lead to a denial-of-service (DoS) condition when handling a large number of requests.
Impact: An attacker could send many requests and cause the server to crash.
Severity: Moderate
Solution: Fixed in Nginx 1.15.7.


CVE-2013-2028 (Nginx):

Description: Nginx had a vulnerability that allowed an attacker to perform a buffer overflow in certain conditions while processing HTTP requests.
Impact: This could result in remote code execution or server crash.
Severity: Critical
Solution: Fixed in Nginx 1.4.1 and later.


CVE-2017-7529 (Nginx):

Description: A flaw in Nginx's handling of HTTP/2 could lead to a denial of service (DoS) when an attacker sent specially crafted requests.
Impact: The server could become unresponsive and need to be restarted.
Severity: High
Solution: Fixed in Nginx 1.12.0 and later.
