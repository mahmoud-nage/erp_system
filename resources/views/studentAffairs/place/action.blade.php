<a class="btn btn-info" href="{{route('place.edit', $id)}}" style="width:50px">
    <i class="fas fa-user-edit"></i>
</a>

<form action="{{route('place.destroy', $id)}}" method="POST">
    @csrf
    @method('DELETE')
   
        <button onclick="alert()" class="btn btn-danger" style="width:50px">
            <i class="fas fa-trash-alt" ></i>
        </button>
</form>