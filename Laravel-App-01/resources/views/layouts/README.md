--------Layouts in Laravel ---------
  - Layouts in laravel are views that is implemented to behave as Templates that contains the entire view skeleton (or model).
  - Layouts are used to provide a unified view skeleton for app view, avoiding repeating writing the same view skeleton for multiple views.

  --implementing Layouts--
    @extends('Layouts.layoutFileName')  
    @section('layoutName*')
      //blade code
    @endsection()

    * - by @yield('layoutName') placed inside of code block or in the view body (selecting the whole view content) to define that Layout.
