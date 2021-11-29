<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('pages.store'), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class'=> 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'type new page name']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('alias', 'Alias', ['class'=> 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class' => 'form-control', 'placeholder' => 'type new page alias']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('text', 'Text', ['class'=> 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'type new page text']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('images', 'Images', ['class'=> 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText' => 'chose image', 'data-buttonName' => 'btn-primary', 'data-placeholder'=>'not image']) !!}


        </div>
    </div>
    <div class="form-group">
        {!! Form::label('images', 'Images', ['class'=> 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</div>
