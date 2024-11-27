-----Form Request-----
def : is a way to handle the validation of data and the authorisation for upcomming requests before the request reaches the controller method.
# Form Request Class : is a custom class that used to encapsulate the logic of validating requests' submitted data via a form or API and also authorisation to the source of submition (client,server API) to reach the the controller method. From Request took place to validate input data and handle autorisation before Even the controller method is EXECUTED, and only executed if all the data is valid according the the Form Request Class' rules() method, IF not the Form Request redirect the page with the error data, directlly without entering the body the the controller method.

(Q)- The form Request class is instansiated the via dependency injection in the method's signature, However if the method and the whole controller is not executed yet, how does the Form Request does?

(A)- This was possible thanks to  hte concepte of "REFLECTION"(?).
(?) reflection is an internal approach integrated in laravel to detecte and read method signature for method triggerred in route calling. Reflection is used to react what type of param a methods expects and also used to determinewhat depencies the methods needs to, to then service container(?unclosed:DINJ?) instanciate classes that are passed via dependency injection (in this case the parame is in type 'className').

--mechanism--
 -> a Request reaches the route, which then matches the request with the corresponding controller and method.
 -> a Reflection is Triggerred to inspect the controller method's signature in order to get information about params types.
 -> Laravel internally after knowing that the method has an dependency injection, it did automaticaly instanciate that class which is in this case the Form Request class.
 -> the form Request Object' methods get called automatically (authorised & rules) to validate inpute data.
 -> if the inpute data was valid, it did get injected to the controller method, which finnally get called as well to handle the resuled data (store,updates...).
 -> Else if the inputed data was invalid it did redirect the user with the error message without executing the controller method logic.
