# RANDOM MEDIA API
this API is for storing images, videos and gif on the web space.

> [!WARNING]
> ### End of support
> This project will no longer be updated or maintained.

# INFO
I coded this app for my friend and I decided to add it to my repository, maybe it will be useful for someone even if it is not very modular

# CONFIG
- dev_mode: enable php error handlerer
- https: enable only https access
- token: token for validate request access
- storage_path: default subfolder storage

# INSTALLATION
- run install script
- set web root public/
- grant file write permission
- grant file read permission
- add all media to sub dirs (requires use names without space)

# ERROR CODES
- 1: https required error
- 2: config value token is empty or null
- 3: api token is null use /?token=1234
- 4: api token is invalid
- 5: add media parameter to url
- 6: media type not found
- 7: category get parameter not found
- 8: file get parameter not found
- 9: category get parameter contains insecure character '/'
- 10: file get parameter contains insecure character '/'
- 11: media or category not found

## Dependencies
This project requires PHP8 or < .
* Whoops
   * Version: **2.14**
   * [Github](https://github.com/filp/whoops)

## License
This software is licensed under the [MIT license](https://github.com/lukasbecvar/media-api/blob/main/LICENSE).
