# Development Notes:
This file should be used to store any notes gathered during development.

## To Do
  * Fix security holes in write-post form - see notes below
  * Add some kind of user system
  * Limit votes per user
  * Secure the Admin area
  
## Security Holes
  * It is possible to do script injection in the form fields - see [here][1] for a solution (uses `htmlspecialchars()`)
  * Image URLs could be bad - could reference Javascript - check for `"javascript"`, `"java script"` or `"java\nscript"`. If seen disallow the link. Alternatively, request the link and check that it is actually an image. Alternatively host images on-site or use the [Imgur API](https://api.imgur.com/)
  
[1]: http://stackoverflow.com/questions/1241570/what-is-the-correct-safest-way-to-escape-input-in-a-forum
