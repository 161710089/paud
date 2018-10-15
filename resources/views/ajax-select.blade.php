<option>--- Select State ---</option>
@if(!empty($tb_m_pengajar))
  @foreach($tb_m_pengajar as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif