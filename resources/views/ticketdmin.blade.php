@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z">
    <input size="16" type="text" value="" readonly>
    <span class="add-on"><i class="icon-remove"></i></span>
    <span class="add-on"><i class="icon-calendar"></i></span>
</div>
 
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14 10:00",
        minuteStep: 10
    });
</script> 
@include('layout.tabladmin')
