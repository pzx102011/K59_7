<div class="col-sm-12 mt-12">
    <div class="row">
        <div class="col-sm-6 mt-3">
            <label>Ocena</label>
            <input type="number"
                   class="form-control @error('grade') is-invalid @enderror"
                   id="grade"
                   name="grade"
                   min="1"
                   max="6"
                   @if(isset($grade)) value="{{ $grade->grade  }}" @endif
            >
            @if ($errors->has('grade'))
                <span class="text-danger">{{ $errors->first('grade') }}</span>
            @endif
        </div>

        <div class="col-sm-6 mt-3">
            <label>Przedmiot</label>
            <select id="subject"
                    class="form-select @error('subject') is-invalid @enderror"
                    aria-label="subjects"
                    name="subject"
                    data-placeholder=""
                    style="width: 100%">

                @if(isset($grade))
                    <option value="{{ $grade->subject->id }}" selected disabled>{{ $grade->subject->name }}</option>
                @else
                    @forelse ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @empty

                    @endforelse
                @endif

            </select>
            @if ($errors->has('subject'))
                <span class="text-danger">{{ $errors->first('subject') }}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 mt-3">
            <label>Uczeń</label>
            <select id="pupil"
                    class="form-select @error('pupil') is-invalid @enderror"
                    aria-label="pupils"
                    name="pupil"
                    data-placeholder=""
                    style="width: 100%">

                @if(isset($grade))
                    <option value="{{ $grade->pupil->id }}" selected disabled>{{ $grade->pupil->name }}</option>
                @else
                    @forelse ($pupils as $pupil)
                        <option value="{{ $pupil->id }}">{{ $pupil->name }}</option>
                    @empty

                    @endforelse
                @endif
            </select>
            @if ($errors->has('pupil'))
                <span class="text-danger">{{ $errors->first('pupil') }}</span>
            @endif
        </div>

        <div class="col-sm-12 mt-3">

            @if($isTutor)
                <input type="hidden" value="{{$loggedUser->id}}" name="tutor">
            @else
                <label>Nauczyciel</label>
                <select id="tutor"
                        class="form-select @error('tutor') is-invalid @enderror"
                        aria-label="tutor"
                        name="tutor"
                        data-placeholder=""
                        style="width: 100%">
                    @if(isset($grade))
                        <option value="{{ $grade->tutor->id }}" selected disabled>{{ $grade->tutor->name }}</option>
                    @else
                        @forelse ($tutors as $tutor)
                            <option
                                value="{{ $tutor->id }}"
                            >
                                {{ $tutor->name}}
                            </option>
                        @empty

                        @endforelse
                    @endif

                </select>
            @endif
            @if ($errors->has('tutor'))
                <span class="text-danger">{{ $errors->first('tutor') }}</span>
            @endif
        </div>
    </div>
</div>
