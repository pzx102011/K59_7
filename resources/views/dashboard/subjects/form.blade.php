<div class="col-sm-12 mt-12">
    <div class="row">
        <div class="col-sm-12 mt-3">
            <label>Nazwa przedmiotu</label>
            <input type="text"
                   class="form-control @error('subject') is-invalid @enderror"
                   id="subject"
                   name="subject"
                   @if(isset($subject)) value="{{$subject->name}}" @endif
            >
            @if ($errors->has('subject'))
                <span class="text-danger">{{ $errors->first('subject') }}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 mt-3">

            <label>Nauczyciel</label>
            <select id="tutor"
                    class="form-select @error('tutor') is-invalid @enderror"
                    aria-label="tutor"
                    name="tutor"
                    data-placeholder=""
                    style="width: 100%">
                @forelse ($tutors as $tutor)
                    <option
                        value="{{ $tutor->id }}"
                        @if (isset($subject) && $subject->tutor->id === $tutor->id) selected @endif
                    >
                        {{ $tutor->name}}
                    </option>
                @empty

                @endforelse

            </select>
            @if ($errors->has('tutor'))
                <span class="text-danger">{{ $errors->first('tutor') }}</span>
            @endif
        </div>
    </div>
</div>
