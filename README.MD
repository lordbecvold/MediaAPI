# api

config
- config decs

install instruction
- run install script
- set web root public/
- grant file write permission
- grant file read permission
- add all media to sub dirs (requires use names without space)

erros
1 - https required error
2 - config value token is empty or null
3 - api token is null use /?token=1234
4 - api token is invalid
5 - add media parameter to url
6 - media type not found

viewer errors
7 - category get parameter not found
8 - file get parameter not found
9 - category get parameter contains insecure character '/'
10 - file get parameter contains insecure character '/'
11 - media or category not found


libs 
- whoois