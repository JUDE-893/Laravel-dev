-----Migration-----
  def : a database version controle that alow to define and modify (update) tables schemas in a more organized way using php code rather than creating them separatly (from the app) using SQL queries.
  In migration classes you can defien the table classes schemas in the up() method, And also how these tables should be rolled back (get back to the previous DB state) when running the command :
  "php artisan migrate:rollback"
