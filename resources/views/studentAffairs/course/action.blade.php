<div style="display:inline-flex">
<a class="" href="{{route('course.edit', $id)}}" style="padding: 0 5px">
    <i class="fas fa-user-edit"></i>
</a>
<form action="{{route('course.destroy', $id)}}" method="POST">
    @csrf
    @method('DELETE')
   
        <button onclick="confirms()" class="" style="background: none;border: none;color: red; display:inline-flex">
            <i class="fas fa-trash-alt" ></i>
        </button>
</form>
</div>