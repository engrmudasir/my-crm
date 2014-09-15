<script>
$(document).ready(function(){
	$( ".progress-stat-bar li" ).each(function() {
		
		var percent	=	$(this).attr("data-percent");
		$(this).find('span').animate({'height':percent},1000);

});
	});
$(document).on('change', '#sales_filter', function(){
											 
		//var item_code = $( this ).val();
		var sales_filter = $(this).val();
		
		if(sales_filter!=""){
		  
		}
		else{return false;}
		
		//alert(item_code);
        dataString = {"sales_filter": sales_filter};
        $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>account/account_dashboard/daily_sales_chart_ajax",
        data: dataString,
		context: this,
        dataType: "json",
        success: function(data) {
			  
            if(data.html !=""){
				
				$(".top-stats-panel").html(data.html);
				
				} 
         
        },
		complete : function(data)
		{
			
	$( ".progress-stat-bar li" ).each(function() {
		
		var percent	=	$(this).attr("data-percent");
		$(this).find('span').animate({'height':percent},1000);

});
	
		}
      
        }); 

        
    });
</script>

<style>
.green_bg {
	background:url(<?=base_url()?>images/green-bg.jpg) no-repeat;
	height:102px;
	width:160px;
}
.orange_bg {
	background:url(<?=base_url()?>images/orange-bg.jpg) no-repeat;
	height:102px;
	width:160px;
}
.red_bg {
	background:url(<?=base_url()?>images/red-bg.jpg) no-repeat;
	height:102px;
	width:160px;
}
.topTitle {
	text-align:center;
	color:#FFF;
	font-size:12px;
	text-transform:uppercase;
}
.middleCounter h2 {
	  font-size: 16px;
	text-align:center;
	color:#FFF;
	font-weight:normal;
}
.bottomTitle {
	margin-left:10px;
	color:#FFF;
	font-size:12px;
}
.top-stats-panel {
    min-height:164px;
}
.bar-stats {
    height:200px;
    margin-top:20px;
    border-bottom:#aec785 2px solid;
    position:relative;
}
.progress-stat-bar {
    padding-left:10px;
}
.progress-stat-bar li {
    height:200px;
    width:20px;
    background:#f1f1f1;
    position:relative;
    margin-right:15px;
    float:left;
	list-style:none outside none;
}
.progress-stat-percent {
    background:#aec785;
    display:block;
    position:absolute;
    bottom:0px;
    left:0px;
    width:100%;
}
.bar-legend {
    position:absolute;
    top:0px;
    right:0px;
}
.bar-legend li {
    font-size:11px;
    margin-bottom:5px;
	list-style:none outside none;
}
.bar-legend-pointer {
    height:10px;
    width:10px;
    display:inline-block;
    position:relative;
    top:1px;
    margin-right:5px;
}
.bar-legend-pointer.green {
    background:#AEC785;
}
.daily-sales-info {
    color:#ccc;
}
.daily-sales-info span {
    display:inline-block;
}
.daily-sales-info span.sales-count {
    font-size:18px;
    color:#aec785;
    font-weight:600;
}
.daily-sales-info {
    padding-top:6px;
}
.daily-sales-info span.sales-label {
    position:relative;
    top:-2px;
}
.orange {
    background:#fa8564 !important;
}
.tar {
    background:#1fb5ac !important;
}
.mini-stat .green {
    background:#aec785 !important;
}
.pink {
    background:#a48ad4 !important;
}
.yellow-b {
    background: #fdd752 !important;
}
.blue-b{
	background:#58C9F3 !important;
}
.black-b{
	background:#000 !important;
}
</style>
<div id="dashboard-summary">
	<div id="dashboard-welcome-back" class="dashboard-item">
		<div class="dashboard-title">Account Details</div>
		<div class="dashboard-content">
			<table class="dashboard-summary-table">
				<tbody>
					<tr>
						<td><div>Welcome back, <strong><?php echo $this->config->item('account_name'); ?> !</strong></div></td>
					</tr>
					<tr>
						<td><div>Account for Financial Year <strong><?php echo date_mysql_to_php_display($this->config->item('account_fy_start')) . " - " . date_mysql_to_php_display($this->config->item('account_fy_end')); ?></strong></div></td>
					</tr>
					<?php if ($this->config->item('account_locked') == 1) { ?>
						<tr>
							<td><div>Account is currently <strong>locked</strong> to prevent any further modifications.</div></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="clear"></div>
	<div id="dashboard-cash-bank" class="dashboard-item">
		<div class="dashboard-title">Bank and Cash accounts</div>
		<div class="dashboard-content">
			<?php
				if ($bank_cash_account)
				{
					echo "<table class=\"dashboard-cashbank-table\">";
					echo "<tbody>";
					foreach ($bank_cash_account as $id => $row)
					{
						echo "<tr>";
						echo "<td>" . anchor('account/report/ledgerst/' . $row['id'], $row['name'], array('title' => $row['name'] . ' Statement')) . "</td>";
						echo "<td>" . convert_amount_dc($row['balance']) . "</td>";
						echo "</tr>";
					}
					echo "</tbody>";
					echo "</table>";
				} else {
					echo "You have not created any bank or cash account";
				}
			?>
		</div>
	</div>
	<div id="dashboard-summary" class="dashboard-item">
		<div class="dashboard-title">Account Summary</div>
		<div class="dashboard-content">
			<?php
				echo "<table class=\"dashboard-summary-table\">";
				echo "<tbody>";
				echo "<tr><td>Assets Total</td><td>" . convert_amount_dc($asset_total) . "</td></tr>";
				echo "<tr><td>Liabilities Total</td><td>" . convert_amount_dc($liability_total) . "</td></tr>";
				echo "<tr><td>Incomes Total</td><td>" . convert_amount_dc($income_total) . "</td></tr>";
				echo "<tr><td>Expenses Total</td><td>" . convert_amount_dc($expense_total) . "</td></tr>";
				echo "</tbody>";
				echo "</table>";
			?>
		</div>
	</div>
</div>

<div id="dashboard-log">
		<div id="dashboard-recent-log" class="dashboard-log-item">
			<div class="dashboard-log-title">Recent Activity</div>
			<div class="dashboard-log-content">
				<table>
        	<tr>
            	<td class="green_bg">
                	<div class="topTitle">PAYABLES</div>
                	<div class="middleCounter"><h2><?=convert_amount_dc($payables_total)?></h2></div>
                	<div class="bottomTitle">This year payable</div>
                </td>
            	<td class="orange_bg">
                	<div class="topTitle">RECEIVABLE</div>
                	<div class="middleCounter"><h2><?=convert_amount_dc($recievables_total)?></h2></div>
                	<div class="bottomTitle">This year payable</div>
                </td>
            	<td class="red_bg">
                	<div class="topTitle">SALE</div>
                	<div class="middleCounter"><h2><?=convert_amount_dc($sales_total)?></h2></div>
                	<div class="bottomTitle">This year payable</div>
                </td>
            </tr>
        </table>
			</div>
		</div>
        </div>

<div id="dashboard-log">
		<div id="dashboard-recent-log" class="dashboard-log-item">
			<div class="dashboard-log-title">Today Cashier Sales</div>
			<div class="dashboard-log-content">
				 <section class="sales_graph">
                <div class="panel-body">
                <div>Today Sales: <input type="radio" name="sales_filter" id="sales_filter" value="today" checked="checked" /> Prev Day: <input type="radio" name="sales_filter" id="sales_filter" value="prev_day" /> Prev Week: <input type="radio" name="sales_filter" id="sales_filter" value="prev_week" /> Prev Month: <input type="radio" name="sales_filter" id="sales_filter" value="prev_month"/></div>
                    <div class="top-stats-panel">
                        <?php $date	=	date("Y-m-d");?>
                       
                        <div class="bar-stats">
                            <ul class="progress-stat-bar clearfix">
                                <li data-percent="<?=@((get_cashier_sales(1,$date)/get_total_sales($date))*100)?>%"><span class="progress-stat-percent pink"></span></li>
                               <!-- <li data-percent="<?=@((get_cashier_sales(2,$date)/get_total_sales($date))*100)?>%"><span class="progress-stat-percent"></span></li>
                                <li data-percent="<?=@((get_cashier_sales(3,$date)/get_total_sales($date))*100)?>%"><span class="progress-stat-percent yellow-b"></span></li>
                                 <li data-percent="<?=@((get_cashier_sales(4,$date)/get_total_sales($date))*100)?>%"><span class="progress-stat-percent orange"></span></li>
                                <li data-percent="<?=@((get_cashier_sales(5,$date)/get_total_sales($date))*100)?>%"><span class="progress-stat-percent tar"></span></li>
                                <li data-percent="<?=@((get_cashier_sales(6,$date)/get_total_sales($date))*100)?>%"><span class="progress-stat-percent blue-b"></span></li>
                                <li data-percent="<?=@((get_cashier_sales(7,$date)/get_total_sales($date))*100)?>%"><span class="progress-stat-percent black-b"></span></li>-->
                                
                            </ul>
                            <ul class="bar-legend">
                                <li><span class="bar-legend-pointer pink"></span> <?=getId('ac_batch','batch_id',1,'name');?>-(<?=get_cashier_sales(1,$date)?>)</li>
                                <!--<li><span class="bar-legend-pointer green"></span> <?=getId('ac_batch','batch_id',2,'name');?>-(<?=get_cashier_sales(2,$date)?>)</li>
                                <li><span class="bar-legend-pointer yellow-b"></span> <?=getId('ac_batch','batch_id',3,'name');?>-(<?=get_cashier_sales(3,$date)?>)</li>
                                 <li><span class="bar-legend-pointer orange"></span> <?=getId('ac_batch','batch_id',4,'name');?>-(<?=get_cashier_sales(4,$date)?>)</li>
                                <li><span class="bar-legend-pointer tar"></span> <?=getId('ac_batch','batch_id',5,'name');?>-(<?=get_cashier_sales(5,$date)?>)</li>
                                <li><span class="bar-legend-pointer blue-b"></span> <?=getId('ac_batch','batch_id',6,'name');?>-(<?=get_cashier_sales(6,$date)?>)</li>
                                <li><span class="bar-legend-pointer black-b"></span> <?=getId('ac_batch','batch_id',7,'name');?>-(<?=get_cashier_sales(7,$date)?>)</li>-->
                                
                            </ul>
                           <!-- <div class="daily-sales-info">
                                <span class="sales-count"><?=get_total_sales($date)?> </span> <span class="sales-label">Total Sales</span>
                            </div>-->
                        </div>
                    </div>
                </div>
            </section>
			</div>
		</div>
        </div>

	<div id="dashboard-log">
		<div id="dashboard-recent-log" class="dashboard-log-item">
			<div class="dashboard-log-title">Recent Activity</div>
			<div class="dashboard-log-content">
				<?php
				if ($logs)
				{
					echo "<ul id=\"recent-activity-list\">";
					foreach ($logs->result() as $row)
					{
						echo "<li>" . $row->message_title . "</li>";
					}
					echo "</ul>";
				} else {
					echo "No Recent Activity";
				}
				?>
			</div>
			<?php
				if ($logs)
				{
					echo "<div class=\"dashboard-log-footer\">";
					echo "<span>";
					echo anchor("account/log", "more...", array('class' => 'anchor-link-a'));
					echo "</span>";
				}
			?>
			</div>
		</div>
	</div>

<div class="clear"></div>
