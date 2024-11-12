<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CSRF</title>
  </head>
  <body>
    You Did passed the fire wall!!
  </body>
</html>


{{-------- CSRF: Cross Site Request Forgery --------

 - wed vulnerability that allow hacker to perform action on a website where a victime is authenticated whout the user consent, by tacking avantage of the browser's cookies that allow sites to recognise the user , then perform malicious actions from elsewhere (othor sites).
 - by CSRF the attacker could be able to retieve crucial information(credit card infos), miss user information (delete data ,accounts).

-------Solution-------
 - laravel includs an inpredictable token in the head of the request, that will helps in the server-Side to ensure action performed by the user in comming straight from thier webside and not from elsewhere
 - Process : the user asks for form page (or elsewhere he could perform request from the website)
              -> the App generate a new token (if not exist) or use the valid on stored in the user's session, then the App associate the current token with the cookie token recieved first (included automaticaly in the Head)
              -> the App render the page and includes eather a hidden input with the value of the user token that gonna be submitted with the data of the entered by the user, or including it directly in the request head (ajax request)
              -> the app recieves the Head data and only perform the ordered actions, if the token value matches the token stored the the user' session.

-------blade csrf directif------
  --create input field: @csrf  || {{csrf_field()}}
  --return the _token key : <input type="hidden" name="_token" value="{{csrf_token()}}">


-----------------------------------------------------}}


{{--is the cookie token is stored in the user sessio , so the app would recognise from where (browser) the request is made  and whch token to  render the the user view--}}
