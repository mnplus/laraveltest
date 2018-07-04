<div class="form-group">
        {{Form::label($name, null, ['class' => 'control-panel'])}}
        {{Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>