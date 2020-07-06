<form action="{{route('dashboard/'.$routename.'.delete',['id' => $row->id])}}" method="POST">
    @csrf
    {{ method_field('delete')}}
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
        <i class="material-icons">close</i>
    </button>
</form>