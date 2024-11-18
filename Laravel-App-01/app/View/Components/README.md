--------Class Based Components---------

  -  class-based Blade components allow you to define reusable components with more control over their logic and data.

  --Mechanism--
   -> Defining the component instance: <x-OurCompo title="compo1" message="here is compo1"> in the parent view.
   -> Props value get assigned to public $title & public $message class properties, thats used to hold the instance's props values;
   -> The the constructor get called with the $title and $message properties (mentionned before) as arguments.
   -> The component get instantiated creating a component instance with properties $this->title and $this->message.
   -> The Blade component instance inner mechanism then recognize the public properties ($this->title & $this->message) and made then available within the view {{$title}}.
