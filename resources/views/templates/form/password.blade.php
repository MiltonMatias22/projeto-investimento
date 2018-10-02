        <label class="{{ $class ?? null }}">
            <span>{{ $label ?? $input ?? "Error" }}</span>
            {!! Form::password($input, $attributes) !!}
        </label>