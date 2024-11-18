@extends('Layouts.skeleton')

@section('skeleton')
    <x-card-component :data="$user" class="walo"/><br><br>

    <!-- Button trigger modal -->
  @foreach(array_keys($trees) as $tree)
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#{{$tree}}">
    {{$tree}} trees
  </button>
  @endforeach

  <!-- Modal -->
  <x-master />
  <!-- warning Tag  -->
  <x-tag-component/>
  <script type="text/javascript">
    var data = @json($trees),
    modal = document.querySelector('.modal');
    document.querySelectorAll('button[data-toggle="modal"]').forEach( (b) => {
      b.addEventListener('click', (e)=>{
        var ID = (e.target.attributes[3].value).split("#")[1];
        modal.id = ID;
        console.log(data[ID]);
        document.querySelector('.modal-body').textContent= data[ID];

      })

    })
  </script>
@endsection
