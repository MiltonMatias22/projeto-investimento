        <label class="{{ $class ?? null }}">
            <span>{{ $label ?? $select ?? "Error" }}</span>
            {!! Form::select($select, $data ?? []) !!}
        </label>