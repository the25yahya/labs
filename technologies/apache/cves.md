Famous CVEs in Apache


CVE-2017-15715 (Apache HTTP Server):

Description: A path traversal vulnerability in Apache HTTP Server's mod_rewrite module allowed attackers to bypass certain restrictions and access files outside of the intended directory.
Impact: An attacker could potentially gain unauthorized access to files and directories, leading to information disclosure.
Severity: High
Solution: The issue was fixed by Apache HTTP Server 2.4.29.


CVE-2019-0211 (Apache HTTP Server):

Description: A flaw in Apache HTTP Server's mod_proxy and mod_proxy_uwsgi modules could lead to a privilege escalation when processing specific proxy requests.
Impact: Attackers could exploit this to execute arbitrary code as the www-data user or other privileged users, potentially escalating to root-level access.
Severity: Critical
Solution: Fixed in Apache HTTP Server 2.4.39.


CVE-2017-3167 (Apache HTTP Server):

Description: A vulnerability in Apache HTTP Server's handling of mod_ssl could allow attackers to crash the server by sending specially crafted requests.
Impact: Denial of service (DoS) could occur, leading to service disruptions.
Severity: Moderate
Solution: Fixed in Apache HTTP Server 2.4.25.


CVE-2014-0226 (Apache HTTP Server):

Description: A bug in the Apache HTTP Server’s handling of SSL could allow an attacker to force the server into an insecure state, potentially leading to a downgrade attack or information leakage.
Impact: Man-in-the-middle (MITM) attacks could be possible, allowing attackers to intercept sensitive data.
Severity: High
Solution: Fixed in Apache HTTP Server 2.4.10.


CVE-2019-0217 (Apache HTTP Server):

Description: A vulnerability in mod_http2 could allow an attacker to trigger a denial of service (DoS) by causing a crash in the server.
Impact: DoS attacks could make the server unavailable.
Severity: High
Solution: Fixed in Apache HTTP Server 2.4.39.