<!--image-->
{{ Form::label('images', 'Image: ') }}
{{ Form::file('images[]', array('class' => 'input-group form-control-file', 'multiple' => 'multiple')) }}

<!--Image Type-->
<small id="fileHelp" class="form-text text-muted">Categories</small>
{{ Form::checkbox('release') }} Cover Art <br>
{{ Form::checkbox('wm') }} WM <br>
{{ Form::checkbox('poster') }} Releaseer
<small id="fileHelp" class="form-text text-muted">Upload image.</small>

<!--wav-->
{{ Form::label('wav', 'WAV zip: ') }}
{{ Form::file('wav', array('class' => 'input-group form-control-file')) }}
<small id="fileHelp" class="form-text text-muted">Upload WAV zip.</small>

<!--mp3-->
{{ Form::label('mp3', 'MP3 zip: ') }}
{{ Form::file('mp3', array('class' => 'input-group form-control-file')) }}
<small id="fileHelp" class="form-text text-muted">Upload MP3 zip.</small>
