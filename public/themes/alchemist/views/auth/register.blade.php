{{ Form::open(array('url' => '/register/account')) }}
  <input type="text" name="std_id" value="{{ $std_id }}">
  <input type="text" name="name" value="{{ $name }}">
  <input type="text" name="surname" value="{{ $surname }}">
  <input type="text" name="email" value="{{ $mail }}">
  <input type="text" name="faculty" value="{{ $faculty }}">
  <input type="text" name="tel" value=" {{ old('tel') }} ">
  <input type="text" name="facebook" value=" {{ old('facebook') }} ">
  <input type="submit" name="submit" value="submit">
{{ Form::close() }}
