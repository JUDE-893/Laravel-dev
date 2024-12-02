----Modeles----
def : Models represents the data container in a Laravel app (or in geenral).
- In a laravel App; Models are directly responsible for managing dataBases tables, where each model files reprensents a tables. Allowing to interact with the real (physical) database tables (CRUD).
- in model files we can :
  + encapsulate validation and data treatment logic.
  + set basic operation configuration (filled column , table name)
  + define relationships
  + [TO Be Continued..]


-----Query Builder (& Eloquent)-----
 def : built-in methods available in the ORM (object relationnal mapping) that are provided by the Eloquent/Model class to allow generating and executing queries to interact with the DB programatically without writing SQL code.
 # e.g : ModuleName::find(n) - the find static method is a query builder that used to retrieve a single record from a DB table and returns an ORM. (?)
 (?) - ORM | Object relationnal mapping : an object that used to hold the data of a sigle or multiple record retrieved from the DB, with built-in method properties that allow to manage the data attributes. An ORM is an instance of the model class that get created after a query builder is called.

  --Mechanism--
  -> generating the SQL query; via the Eloquent Models (behind the scene the Eloquent Model uses the Query Builder funcs and methods to generate the sql queries) or The Query Builder
  -> executing the resulted Query; by sedding it to the DB server vie The Query Builder.
  -> Fetching the result; as an assosiative array or php object.
  -> Instanciating the model Class; then Hideratei it with the response data to create an Eloquent Model Instance  (ORM) .
  -> Post-Processing : Eloquent way load related tables data as well eather via Lazy Loading or Eager Loading.
    + Lazy Loading : load the data only when accessed (e.g $post->user()), By going over all the process again.
    + EAger Loading  : load related tables data as well in one go in order to reduce the number of query requests.
  -> return the Eloquant Model Instance.

-----No Explicite Import of Module class-----
  </> In Php in general You Don't require to explicitly import classes with the same "nameSpace".

-----Data fetshing Methods-----
#->get() : a Model class static method that returns a collection of model instances, useful often in
  + relationnal fetching (fetching a recored with related record in onthor tables).
  + for returning all records that mets a specific selection condition (selecting all records with a specific column value).
  - get() method functionnality are also integred in similar methods such find(), all ..
  
