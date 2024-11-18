--------Components in Laravel---------
  - Component is a powerful way to build a reusable, maintainable view entity that serves to to be included inside of a parent view (could be a component as well).
  - a blade Component are also called an autonomous and interdependent entity as is encapsulates its own logic and data and behavior

  --Exemple of case usage--
  <!-- Passing the user data to the component -->
  <x-navBar :data="$user">
    <!-- Passing content to the para_child slot -->
    <x-slot name="para_child">
      <p>A paragraph child component</p>
    </x-slot>
  </x-navBar>

  <!-- ----Accessing the component' inserted data --- -->
  <!-- access datéa via props -->
  {{--$data['name']--}}
  <!-- access a child via name -->
  {{--$para_child--}}
  <!-- access row text child -->
  {{--$slot--}}

  --@props directive--
    - Used to define the properties that an anonymous component can accept or "props" as the name suggest, this is useful to avoid these properties to be treated as component attribute (e.g class, type,style..) rather than props.
    - Also it is useful to define default values for these properties.
    -- example:
    //inside of the component' vue
    @props(['type' => 'info', 'message' => 'Default message']);
