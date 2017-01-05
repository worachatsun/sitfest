{{ Form::open(array('url' => '/register/assignrole')) }}
  <input type="text" name="std_id">
  <select class="" name="role">
    <option value="member">Member</option>
    <option value="menter">Menter</option>
  </select>
  <input type="submit" name="submit" value="submit">
{{ Form::close() }}
