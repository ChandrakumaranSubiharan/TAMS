<style>
    .img-thumb-path{
        width:100px;
        height:80px;
        object-fit:scale-down;
        object-position:center center;
    }
</style>
<?php
$from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date("Y-m-d")." -1 week")); 
$to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d",strtotime(date("Y-m-d"))); 
function duration($dur = 0){
    if($dur == 0){
        return "00:00";
    }
    $hours = floor($dur / (60 * 60));
    $min = floor($dur / (60)) - ($hours*60);
    $dur = sprintf("%'.02d",$hours).":".sprintf("%'.02d",$min);
    return $dur;
}
?>
<div class="card card-outline card-purple rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">Date-wise Transaction Report</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body">
		<div class="callout border-primary">
			<fieldset>
				<legend>Filter</legend>
					<form action="" id="filter">
						<div class="row align-items-end">
							<div class="form-group col-md-3">
								<label for="from" class="control-label">Date From</label>
                                <input type="date" name="from" id="from" value="<?= $from ?>" class="form-control form-control-sm rounded-0">
							</div>
							<div class="form-group col-md-3">
								<label for="to" class="control-label">Date To</label>
                                <input type="date" name="to" id="to" value="<?= $to ?>" class="form-control form-control-sm rounded-0">
							</div>
							<div class="form-group col-md-4">
                                <button class="btn btn-primary btn-flat btn-sm"><i class="fa fa-filter"></i> Filter</button>
			                    <button class="btn btn-sm btn-flat btn-success" type="button" id="print"><i class="fa fa-print"></i> Print</button>
							</div>
						</div>
					</form>
			</fieldset>
		</div>
		<div id="outprint">
			<style>
				#sys_logo{
					object-fit:cover;
					object-position:center center;
					width: 6.5em;
					height: 6.5em;
				}
			</style>
        <div class="container-fluid">
			<div class="row">
				<div class="col-2 d-flex justify-content-center align-items-center">
					<img src="#" class="img-circle" id="sys_logo" alt="System Logo">
				</div>
				<div class="col-8">
					<h4 class="text-center"><b></b></h4>
					<h3 class="text-center"><b>Date-wise Transaction Report</b></h3>
					<h5 class="text-center"><b>as of</b></h5>
					<h5 class="text-center"><b><?= date("F d, Y", strtotime($from)). " - ".date("F d, Y", strtotime($to)) ?></b></h5>
				</div>
				<div class="col-2"></div>
			</div>
			<table class="table table-bordered table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="25%">
					<col width="15%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-purple text-light">
						<th>#</th>
						<th>Date/Time</th>
						<th>Transaction Code</th>
						<th>Client</th>
						<th>Total Amount</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<?php include('includes/scripts.php'); ?>


<script>
	$(document).ready(function(){
        $('.select2').select2({
            width:'100%'
        })
        $('#filter').submit(function(e){
            e.preventDefault();
            location.href= './?page=reportDemo&'+$(this).serialize();
        })
       $('#print').click(function(){
		   start_loader()
		   var _p = $('#outprint').clone()
		   var _h = $('head').clone()
		   var _el = $('<div>')
		   _h.find("title").text("Date-wise Transaction Report - Print View")
		   _p.find('tr.text-light').removeClass('text-light bg-gradient-purple bg-lightblue')
		   _el.append(_h)
		   _el.append(_p)
		   var nw = window.open("","_blank","width=1000,height=900,left=300,top=50")
		   	nw.document.write(_el.html())
			nw.document.close()
			setTimeout(() => {
				nw.print()
				setTimeout(() => {
					nw.close()
					end_loader()
				}, 300);
			}, 750);
	   })
	})
</script>