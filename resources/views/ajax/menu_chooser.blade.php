<label for="{{$menuId}}">{{$selectMenu}} :</label>
{{ Form::select($targetName, $targetArr, Input::old($targetName), array('class' => 'selectpicker', 'id' => $menuId)) }}
<span><span class="mandatory"> *</span></span>

<script type="text/javascript">
    $('.selectpicker').selectpicker();
</script>