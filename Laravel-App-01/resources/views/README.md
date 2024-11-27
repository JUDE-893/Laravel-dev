### Blade Directives

-------Errors Messages---------
# @error : is a special directive in blade template system that is responsive for accessing the $errors object(?) in order or conditionnaly display the valiadation errors in the view.
           - within it scoop the $message variable is defined, it used to hold the value to the errors' key specified in the @error('key') directif.

# $error : is a special object that hold & contains the errors messages inside of the view, this object is instantiated from the MessageBag class and then injected to the view after a form validation is failed.
--Mechanism--
  -> form validation failed (using the response "validate" method).
  -> an errors object get instanciated from the MessageBag class.
  -> the errors object get stored in a flash session (temporarly)(?).
  (?) storing the errors object inside of the flash session instead of directly injecting it the the back() view, ensures that the errors object will persist after the re-render (since local variable [native variable nature OBVC] can't persist across requests).
  -> the object get pulled from the flash session and get injected in the view.

-------Form Re-Poplating--------
- old() : a blade function that used to retrieve flashed session data returned on a redirection pack to the same page.
- password plain text cannot get flashed as the session does not carry senssive data by default, in order to keep it unexposed to potential attacks like cross-site-scripting(?) (xss) and session fixation(?).
(?) xss : -> the user visits a trusted website hat has html attributes, forms ,url.. vulnirabilities, AND where a Hacker has injected a malicious js script.
          -> as the script get automatically executed, it accesses the cookies session (stored in the browsr) and send it to the Attacker, from which then he could easely retrieve the session Id and use it to impressionate the user (impost).
(?) session fixation : -> the used clicks a malicious link (directly of not) that leads to a certain website where he is logged (or not, we know already that the user visiting that site frequently), AND in that link the attacker associate a session ID.
                       -> at the point the user visites the site, the session ID set by tha attacker get stored inside of the browser in the session cookie for tha t particular site.
                       -> as the site did not recognise the client with the Session ID that the attacker has set, it ask the client to log in to recognise him.
                       -> after the client get registered (or logged) successfully, the client generate a new session ID.
                       -> the new genrated session ID would not then replace the attacker's session ID, as it still active (not expired yet).
                       -> the attacker can then use his session ID, to access the user account and perform authentificated actions.
