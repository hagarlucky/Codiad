## Authentication methods

Uncomment the `define("AUTH_PATH", ...)` from the `config.php` and set that path to one of the scripts in here.

### HTTP auth, restricted to one project, non admin privileges

Inspired by [basteln3rk/codiad_http_auth.php](https://gist.github.com/basteln3rk/4cab14ebd990e46efaef), the user creation was rewritten to use the `User->Create` method to cleanly create the new user, then added the creation of a `auto_$username` project and the restriction to that project for the new user. This also removes the admin privileges to the user.
