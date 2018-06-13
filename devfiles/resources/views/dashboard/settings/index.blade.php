@extends('layouts.layout1')
@section('PageTitle', 'Settings')
@section('content')
<div class="col-lg-3 col-md-6">
    <div class="panel info-box panel-white">
        <div class="panel-body">
            <a href="settings/address">
                <button class="btn btn-info">Address Book</button>
            </a>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel info-box panel-white">
        <div class="panel-body">
            <a href="settings/credit">
                <button class="btn btn-info">Top Up</button>
            </a>
        </div>
    </div>
</div>
<br>
<div class="col-md-6">

        <div id='tawk_55a2d58184d307454cffd810'></div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var $_Tawk_API={embedded:'tawk_55a2d58184d307454cffd810'},$_Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/55a2d58184d307454cffd810/19q6ogi34';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);})();
</script>
<!--End of Tawk.to Script-->

</div>


@stop
