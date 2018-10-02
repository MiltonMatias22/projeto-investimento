        <label class="{{ $class ?? null }}">
            <span>{{ $label ?? $input ?? "Error" }}</span>
            {!! Form::text($input, $value ?? null, $attributes ) !!}
        </label>