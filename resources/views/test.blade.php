@foreach ($blog as $item)
    {{$item->title}}
@endforeach
{{ $blog->links() }}
