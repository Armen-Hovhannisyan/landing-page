<div style="margin:0 50px;">
    @if($pages)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>N</th>
                <th>Name</th>
                <th>Alias</th>
                <th>Text</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $k=>$page)
                <tr>
                    <th>{{$page->id}}</th>
                    <th>{!! Html::link(route('pages.show',['page' => $page->id]), $page->name, ['alt' => $page->name]) !!}</th>
                    <th>{{$page->alias}}</th>
                    <th>{{$page->text}}</th>
                    <th>{{$page->created_at}}</th>
                    <th>
                        {!! Form::open(['url' => route('pages.destroy',['page' => $page->id]), 'class' => 'form-horizontal', 'method' => 'DELETE']) !!}

                        {!! Form::hidden('action', 'delete') !!}
                        {!! Form::button('delete', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <th>{!! Html::link(route('pages.create'), 'New Page') !!}</th>

</div>
