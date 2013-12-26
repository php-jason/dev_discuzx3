<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header_client');?>
<?php include $this->gettpl('pm_nav');?>

<div class="ucinfo">
<form method="post" action="index.php?m=pm_client&a=blackls">
	<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
	<table cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td>
					<textarea class="listarea" id="pm_blackls" rows="6" cols="10" name="blackls"><?php echo $blackls;?></textarea><br />
					<div class="ucnote">添加到該列表中的用戶給您發送短消息時將不予接收<br />添加多個忽略人員名單時用逗號 "," 隔開，如「張三,李四,王五」<br />如需禁止所有用戶發來的短消息，請設置為 "&#123;ALL&#125;"</div>
				</td>
			</tr>
		</tbody>
	</table>
	
	<div class="pages_btns">
		<span class="postbtn">
			<button name="pmsubmit" class="pmsubmit" type="submit">保存</button>
		</span>
	</div>
</form>
</div>

<?php include $this->gettpl('footer_client');?>